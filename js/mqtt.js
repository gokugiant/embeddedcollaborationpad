var mqtt;
var reconnectTimeout = 2000;

var mqttOnFailure = function(msg) {
	console.log("Connection Attempt to Host "+host+"Failed");
	setTimeout(MQTTconnect, reconnectTimeout);
}

var mqttOnMessageArrived = function(msg){
	out_msg="Message received "+msg.payloadString+"<br>";
	out_msg=out_msg+"Message received Topic "+msg.destinationName;
	console.log(out_msg);

}

var onConnect = function() {
	$('#connectmqttBtm').hide("slow").prop("disabled", true);
	$('#disconnectmqttBtm').show();
	
	// Once a connection has been made, make a subscription and send a message.
	console.log("Connected ");
	mqtt.subscribe("sensor1");
	message = new Paho.MQTT.Message("Hello World");
	message.destinationName = "sensor1";
	mqtt.send(message);
}

var mqttconnect = function() {
	var host = $("#mqttServer").val(); 
	var port = parseInt($("#mqttPort").val());
	
	console.log("connecting to "+ host +" "+ port);
	mqtt = new Paho.MQTT.Client(host,port,"clientjs");
	
	console.log("connecting to "+ host);
	
	var options = {
		timeout: 3,
		onSuccess: onConnect,
		onFailure: mqttOnFailure,
		userName: $("#mqttUser").val(), 
		password: $("#mqttPassword").val()
	};
	
	mqtt.onMessageArrived = mqttOnMessageArrived
	
	mqtt.connect(options); //connect
}

$(function() {
	// Init connect button
	$('#connectmqttBtm').click(function(){
		$(this).prop("disabled", true);
		mqttconnect();
	});
});