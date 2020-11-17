<div class="accordion" id="accordionSnipped">
	<div class="form-row">
	    <div class="col">
	      <input id="mqttServer" type="text" name="server" class="form-control form-control-sm" value="hrw-fablab.de" readonly>
	    </div>
	    <div class="col">
	      <input id="mqttPort" type="number" name="port" class="form-control form-control-sm" value="9001">
	    </div>
	    <div class="col">
	      <input id="mqttUser" type="text"  name="username" value="<?php echo $_COOKIE["mqttUser"]?>" name="port" class="form-control form-control-sm">
	    </div>
	    <div class="col">
	      <input id="mqttPassword" type="text" name="password"  name="username" value="<?php echo $_COOKIE["mqttPwd"]?>" name="port" class="form-control form-control-sm">
	    </div>
	</div>
	
	<button id="connectmqttBtm" class="btn btn-success"><i class="fas fa-link"></i> Connect</button>
	<button id="disconnectmqttBtm" class="btn btn-danger" style="display: none;"><i class="fas fa-times-circle"></i> Disconnect</button>
	
	<hr class="my-4">
	
	<div class="jumbotron">
	  <div id="mqttConsole"></div>
	</div>

</div>