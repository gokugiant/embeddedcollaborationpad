var host;
var mqtt;
var reconnectTimeout = 2000;
var connected_flag = 0;

var setUiEnableState = function(state){
	switch(state) {
	 	case 'connected':
			$('#connectmqttBtm').hide("slow").prop("disabled", true);
			$('#disconnectmqttBtm').show().prop("disabled", false);
			// Hide the server connect tab
			$('#collapseServerCon').collapse('hide');
			$('#mqttControlFieldset').prop("disabled", false);
		    break;
		case 'disconnected':
			$('#disconnectmqttBtm').hide("slow").prop("disabled", true);
			$('#connectmqttBtm').show().prop("disabled", false);
			// Show the server connect tab
			$('#collapseServerCon').collapse('show');
			$('#mqttControlFieldset').prop("disabled", true);
			break;
	  default:
	    // code block
	}
}

var mqttOnFailure = function(msg) {
	console.log("Connection Attempt to Host "+host+"Failed");
	setTimeout(connectMQTT, reconnectTimeout);
}

// Send/publish messages to the server
var mqttOnMessageArrived = function(msg){
	out_msg="Message received "+msg.payloadString+"<br>";
	out_msg=out_msg+"Message received Topic "+msg.destinationName;
	console.log(out_msg);
	console.log("#mqttSubTopics input[placeholder='" + msg.destinationName + "']");
	$("#mqttSubTopics input[placeholder='" + msg.destinationName + "']").parents('.form-row').find('.topicValue').val(msg.payloadString);
}

// call when the connection is lost
var mqttOnConnectionLost = function(){
	setUiEnableState('disconnected');

	console.log("connection lost");
	connected_flag=0;
	$("#mqttFieldset").prop("disabled", false);
}

var connectMQTT = function() {
	setUiEnableState('connected');
	
	// Once a connection has been made, make a subscription and send a message.
	console.log("Connected ");
	connected_flag=1;
	mqtt.subscribe("sensor1");
	message = new Paho.MQTT.Message("Hello World");
	message.destinationName = "sensor1";
	mqtt.send(message);
}

// Disconect from the MQTT Server
var mqttDisconnect = function(){
	// Show the server connect tab
	$('#collapseServerCon').collapse('show');
	
	console.log("Try to disconnect from the server");
	if (connected_flag==1){
		mqtt.disconnect();
		onnected_flag=0;
		$("#mqttFieldset").prop("disabled", false);
	}else{
		console.log("onnected_flag is not 1. Seems to be you are already disconnected");
	}
}

var mqttConnect = function() {
	host = $("#mqttServer").val(); 
	var port = parseInt($("#mqttPort").val());
		
	console.log("connecting to "+ host +" "+ port);
	mqtt = new Paho.MQTT.Client(host,port,"clientjs");
	
	console.log("connecting to "+ host);
	
	var options = {
		timeout: 3,
		onSuccess: connectMQTT,
		onFailure: mqttOnFailure,
		userName: $("#mqttUser").val(), 
		password: $("#mqttPassword").val()
	};
	
	// Set the callback functions
	mqtt.onMessageArrived = mqttOnMessageArrived;
	mqtt.onConnectionLost = mqttOnConnectionLost;
	mqtt.connect(options); //connect
}

// Subscripe to a topic return
// return true if subscribed / false when something went wrong
var subscribeToTopoic = function(topic){
	//document.getElementById("status_messages").innerHTML ="";
	if (connected_flag==0){
		out_msg="Not Connected so can't subscribe"
		console.log(out_msg);
		return false;
	}
	
	if( $("#mqttSubTopics input[placeholder='" + topic + "']").length ){ // Check if the topic already exist
		console.log('topic already subscribed');
		return false;
	}
		
	console.log("Subscribing to topic =" + topic);
	
	var options={
		qos:0,
	};
	mqtt.subscribe(topic,options);
	return true;
}

// Publish a message to a topic to the mqtt server
var send_message = function(topic, msg, pqos){
	// Get the username to generate a test topic path
	var testTopic = "ES/WS20/" + $("#mqttUser").val() + "/test-topic";
	console.log("Generated test topic: " + testTopic);
	//document.getElementById("status_messages").innerHTML ="";
	if (connected_flag==0){
	out_msg="<b>Not Connected so can't send</b>"
	console.log(out_msg);
	//document.getElementById("status_messages").innerHTML = out_msg;
	return false;
	}
	if (pqos>2)
		pqos=0;
	console.log(msg);
	//document.getElementById("status_messages").innerHTML="Sending message  "+msg;
	
	//var retain_message = document.forms["smessage"]["retain"].value;
	/*
	if (document.forms["smessage"]["retain"].checked)
		retain_flag=true;
	else
		retain_flag=false;
	*/
	retain_flag=true;
	
	message = new Paho.MQTT.Message(msg);
	if (topic=="")
		message.destinationName = testTopic;
	else
		message.destinationName = topic;
		
	message.qos=pqos;
	message.retained=retain_flag;
	mqtt.send(message);
	return false;
}

var addTopicFormLine = function(topic){
	$('#mqttSubTopics').append(
	'<div class="form-row"><div class="col col-md-6">'+
		'<input class="topicName form-control" type="text" placeholder="' + topic + '" readonly></div>'+
	'<div class="col col-md-4">'+
		'<input class="topicValue form-control" type="text" placeholder="not updated yet" readonly></div>'+
	'<div class="col-sm-2"><button class="sendMqttMessageBtn btn btn-success mqttControl"><i class="fas fa-paper-plane"></i></button>'+
	'<button class="btn btn-danger mqttDelSubBtm" data-toggle="tooltip" data-placement="bottom" title="Remove subscription" data-toggle="tooltip" title="" data-original-title="Subscribe to a topic"><i class="fas fa-trash"></i></button></div></div>');
}

// Init mqtt stuff when DOM is ready
$(function() {
	// Alter the caret in the dropdown to visualize that it can be hidden
	$('#accordionMqttManagement').on('hide.bs.collapse', function () {
	  $('#mqttServerHideIcon').removeClass("fa-caret-up").addClass("fa-caret-down");
	})	
	$('#accordionMqttManagement').on('show.bs.collapse', function () {
	  $('#mqttServerHideIcon').removeClass("fa-caret-down").addClass("fa-caret-up");
	})	
	
	// Init connect button
	$('#connectmqttBtm').click(function(){
		$(this).prop("disabled", true);
		$("#mqttFieldset").prop("disabled", true);
		
		mqttConnect();
	});
	
	// Init disconect button
	$('#disconnectmqttBtm').click(function(){
		$(this).prop("disabled", true);
		mqttDisconnect();
	});
	
	// Init subscribe topic button
	$('#mqttSubBtm').click(function(){
		var topic = $("#newTopicSub").val();
		console.log("Try to subscribe to topic " + topic);
		
		createCookie("topics", createCookie, );
		
		if(subscribeToTopoic(topic)){
			addTopicFormLine(topic);
		}
		
	});
	
	$('.sendMqttMessageBtn').click(function(){
		console.log();
	});
	
});