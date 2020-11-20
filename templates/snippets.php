<div class="accordion" id="accordionSnipped">
	<div class="card">
		<div class="card-header" id="headingOne">
			<h2 class="mb-0">
				<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Arduino basics</button>
			</h2>
	    </div>
	    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSnipped">
			<div class="card-body">
				<div class="row">
					<div class="snipselect col-3">
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-tmp36" role="tab" aria-controls="v-pills-home" aria-selected="true">Calc degree TMP 36</a>
							<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-serial" role="tab" aria-controls="v-pills-profile" aria-selected="false">Serial debugging</a>
						</div>
					</div>
					<div class="col-9">
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="v-pills-tmp36" role="tabpanel" aria-labelledby="v-pills-home-tab">
	//read the temp sensor and store it in tempVal<br>
	int tempVal = analogRead(tempPin);<br>
	float volts = tempVal/1023.0;             // normalize by the maximum temperature raw reading range<br>
	float temp = (volts - 0.5) * 100 ;         //calculate temperature celsius from voltage as per the equation found on the sensor spec sheet.<br>				
							</div>
							<div class="tab-pane fade" id="v-pills-serial" role="tabpanel" aria-labelledby="v-pills-profile-tab">
	void setup(){<br>
	  // start the serial port at 9600 baud<br>
	  Serial.begin(9600);<br>
	}<br>
	void loop(){<br>
		Serial.print("My String");	// Print your data via serial<br>
	}						
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header" id="headingTwo">
			<h2 class="mb-0">
			<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			  ESP32
			</button>
			</h2>
		</div>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSnipped">
			<div class="card-body">
				<div class="row">
					<div class="snipselect col-3">
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-webserver" role="tab" aria-controls="v-pills-home" aria-selected="true">Basic Webserver</a>
						</div>
					</div>
					<div class="col-9">
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="v-pills-webserver" role="tabpanel" aria-labelledby="v-pills-home-tab">
#include <WiFi.h><br>
<br>
// Replace with your network credentials<br>
const char* ssid     = "ESP32-Access-Point";<br>
const char* password = "123456789";<br>
<br>
// Set web server port number to 80<br>
WiFiServer server(80);<br>
<br>
void setup() {<br>
  WiFi.softAP(ssid, password);<br>
<br>
  IPAddress IP = WiFi.softAPIP();<br>
  Serial.print("AP IP address: ");<br>
  Serial.println(IP);<br>
  <br>
  server.begin();<br>
}			
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header" id="headingThree">
			<h2 class="mb-0">
				<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				  Java Script Paho
				</button>
			</h2>
		</div>
		<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSnipped">
			<div class="card-body">
				<div class="row">
					<div class="snipselect col-3">
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-CDNJS" role="tab" aria-controls="v-pills-home" aria-selected="true">CDNJS Import</a>
							<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-connect" role="tab" aria-controls="v-pills-connect" aria-selected="false">Basic connect</a>
						</div>
					</div>
					<div class="col-9">
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="v-pills-CDNJS" role="tabpanel" aria-labelledby="v-pills-home-tab">
							&lt;!-- MQTT --&gt;<br>
							&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;			
							</div>
							<div class="tab-pane fade" id="v-pills-connect" role="tabpanel" aria-labelledby="v-pills-profile-tab">
var mqttConnect = function() {<br>
	host = $(&quot;#mqttServer&quot;).val(); <br>
	var port = parseInt($(&quot;#mqttPort&quot;).val());<br>
		<br>
	console.log(&quot;connecting to &quot;+ host +&quot; &quot;+ port);<br>
	mqtt = new Paho.MQTT.Client(host,port,&quot;clientjs&quot;);<br>
	<br>
	console.log(&quot;connecting to &quot;+ host);<br>
	<br>
	var options = {<br>
		useSSL: true,<br>
		timeout: 3,<br>
		onSuccess: onConnectMQTT,<br>
		onFailure: mqttOnFailure,<br>
		userName: $(&quot;#mqttUser&quot;).val(), <br>
		password: $(&quot;#mqttPassword&quot;).val()<br>
	};<br>
	<br>
	// Set the callback functions<br>
	mqtt.onMessageArrived = mqttOnMessageArrived;<br>
	mqtt.onConnectionLost = mqttOnConnectionLost;<br>
	mqtt.connect(options); //connect<br>
}<br>
	}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>