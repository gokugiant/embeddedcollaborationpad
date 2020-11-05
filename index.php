<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

include("templates/header.inc.php");
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-2 d-lg-block bg-light collapse">
			<div class="sidebar-sticky pt-3">
				<button id="open-or-join-room" class="btn btn-success">
					<i class="fas fa-video"></i> Join meeting
				</button>
				<button id="leave-room" class="btn btn-danger" style="display: none;">
					<i class="fas fa-times-circle"></i> Leave meeting
				</button>
				<div id="video-container" class="media-box"></div>
		    </div>
	    </div>
	    
	    <div class="col-lg-4">
			<button class="btn btn-warning clip-btn-jquery float-right" data-toggle="tooltip" title="" data-original-title="Copy to clipboard">
				<i class="far fa-times-copy"></i> Copy</span>
			</button> 
			<p>Code sharing</p> 
			<div id="firepad-container"></div>
	    </div>
	    <main role="main" class="col-md-6 col-lg-6 px-md-n8">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<a class="nav-link active" id="snippet-tab" data-toggle="tab" href="#snipped" role="tab" aria-controls="snipped" aria-selected="true">Code snippets</a>
				</li>
				<li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="bottom" title="Later this Semester">
					<a class="nav-link disabled" id="mqtt-tab" data-toggle="tab" href="#mqtt" role="tab" aria-controls="mqtt" aria-selected="false">MQTT</a>
				</li>
				<li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="bottom" title="Addition tutorials">
					<a class="nav-link" id="tutorial-tab" data-toggle="tab" href="#tutorial" role="tab" aria-controls="tutorial" aria-selected="false">Tutorials</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="snipped" role="tabpanel" aria-labelledby="snipped-tab">
					<div class="accordion" id="accordionSnipped">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Arduino basics
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSnipped">
      <div class="card-body">
        <div class="row">
  <div class="snipselect col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
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
          Collapsible Group Item #2
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSnipped">
      <div class="card-body">

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSnipped">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
				</div>
				<div class="tab-pane fade" id="mqtt" role="tabpanel" aria-labelledby="mqtt-tab">MQTT</div>
				<div class="tab-pane fade" id="tutorial" role="tabpanel" aria-labelledby="tutorial-tab">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/0wAY3DYihyg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<iframe width="560" height="315" src="https://www.youtube.com/embed/UE1mtlsxfKM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</main>
	</div>    
</div>

<?php 
include("templates/footer.inc.php")
?>