<div class="accordion" id="accordionSnipped">
	<div id="accordionMqttManagement">
		<div class="card">
			<div class="card-header" id="headingOne">
				<h5 class="mb-0">
				<button class="btn btn-link" data-toggle="collapse" data-target="#collapseServerCon" aria-expanded="true" aria-controls="collapseServerCon">
				  Server connection area <i id="mqttServerHideIcon" class="fas fa-caret-up"></i>
				</button>
				</h5>
			</div>
			
			<div id="collapseServerCon" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionMqttManagement">
				<div class="card-body">
					
					<div class="row">
					    <div class="col-sm-9">
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
					    <div class="col-sm-3">
							<button id="connectmqttBtm" class="btn btn-success mqttControl"><i class="fas fa-link"></i> Connect</button>
							<button id="disconnectmqttBtm" class="btn btn-danger mqttControl" style="display: none;"><i class="fas fa-times-circle"></i> Disconnect</button>
					    </div>
					</div>
				</div>
    		</div>
  		</div>
	</div>
	
	<hr>
	
	<fieldset id="mqttControlFieldset" class="" disabled>
		<div class="row">
		    <div class="col-sm-9">
				<fieldset class="form-group row">
					<label for="mqttServer" class="col-sm-2 col-form-label">Subscribe</label>
					<!-- Add new topic to subscribe -->
					<div class="col-sm-10">
						<input id="newTopicSub" type="text" name="newTopicSub" class="form-control form-control" value="ES/WS20/<?php echo $_COOKIE["mqttUser"]?>/newTopic">
					</div>
				</fieldset>
		    </div>
		    <div class="col-sm-3">
				<button id="mqttSubBtm" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Subscribe topic" data-toggle="tooltip" title="" data-original-title="Subscribe to a topic"><i class="fas fa-plus"></i></button>
		    </div>	
		</div>
	</fieldset>
	
	<hr>
		
	<div id="mqttSubTopics"><!-- Subnscribed topics goes here --></div>
</div>