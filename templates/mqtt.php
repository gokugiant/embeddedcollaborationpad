<div class="accordion" id="accordionSnipped">
	<div class="row">
	    <div class="col-sm-8">
			<fieldset id="mqttFieldset" class="form-group row">
				<label for="mqttServer" class="col-sm-2 col-form-label">Server</label>
				<div class="col-sm-10">
					<input id="mqttServer" type="text" name="server" class="form-control form-control-sm" value="hrw-fablab.de">
				</div>
				<label for="mqttPort" class="col-sm-2 col-form-label">Port</label>
				<div class="col-sm-10">
					<input id="mqttPort" type="number" name="port" class="form-control form-control-sm" value="9001">
				</div>
				<label for="mqttUser" class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
					<input id="mqttUser" type="text"  name="username" value="<?php echo $_COOKIE["mqttUser"]?>" name="port" class="form-control form-control-sm">
				</div>
				<label for="mqttPassword" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input id="mqttPassword" type="text" name="password"  name="username" value="<?php echo $_COOKIE["mqttPwd"]?>" name="port" class="form-control form-control-sm">
				</div>
			</fieldset>
	    </div>
	    <div class="col-sm-4">
			<button id="connectmqttBtm" class="btn btn-success mqttControl"><i class="fas fa-link"></i> Connect</button>
			<button id="disconnectmqttBtm" class="btn btn-danger mqttControl" style="display: none;"><i class="fas fa-times-circle"></i> Disconnect</button>
	    </div>
	</div>
	
	<hr>
	
	<div class="jumbotron">
	  <div id="mqttConsole"></div>
	</div>

</div>