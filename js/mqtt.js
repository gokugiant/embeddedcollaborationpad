var host;
var mqtt;
var reconnectTimeout = 2000;
var connected_flag = 0;


var mqttOnFailure = function(msg) {
	console.log("Connection Attempt to Host "+host+"Failed");
	setTimeout(connectMQTT, reconnectTimeout);
}

var mqttOnMessageArrived = function(msg){
	out_msg="Message received "+msg.payloadString+"<br>";
	out_msg=out_msg+"Message received Topic "+msg.destinationName;
	console.log(out_msg);
}

// call when the connection is lost
var mqttOnConnectionLost = function(){
	$('#disconnectmqttBtm').hide("slow").prop("disabled", true);
	$('#connectmqttBtm').show().prop("disabled", false);
	// Show the server connect tab
	$('#collapseServerCon').collapse('show');
	
	console.log("connection lost");
	connected_flag=0;
	$("#mqttFieldset").prop("disabled", false);
}

var connectMQTT = function() {
	$('#connectmqttBtm').hide("slow").prop("disabled", true);
	$('#disconnectmqttBtm').show().prop("disabled", false);
	// Hide the server connect tab
	$('#collapseServerCon').collapse('hide');
	
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
	
	mqtt.onMessageArrived = mqttOnMessageArrived;
	mqtt.onConnectionLost = mqttOnConnectionLost;
	
	mqtt.connect(options); //connect
}

var subscribeToTopoic = function(topic){
	//document.getElementById("status_messages").innerHTML ="";
	if (connected_flag==0){
		out_msg="<b>Not Connected so can't subscribe</b>"
		console.log(out_msg);
		//document.getElementById("status_messages").innerHTML = out_msg;
		return false;
	}
	var stopic= document.forms["subs"]["Stopic"].value;
	console.log("here");
	var sqos=parseInt(document.forms["subs"]["sqos"].value);
	if (sqos>2)
		sqos=0;
	console.log("Subscribing to topic ="+stopic +" QOS " +sqos);
	//document.getElementById("status_messages").innerHTML = "Subscribing to topic ="+stopic;
	var soptions={
		qos:0,
	};
	mqtt.subscribe(topic,soptions);
	return false;
}

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
	
});