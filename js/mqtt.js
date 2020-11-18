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
	
	console.log("connection lost");
	connected_flag=0;
	$("#mqttFieldset").prop("disabled", false);
}

var connectMQTT = function() {
	$('#connectmqttBtm').hide("slow").prop("disabled", true);
	$('#disconnectmqttBtm').show().prop("disabled", false);
	
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

$(function() {
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