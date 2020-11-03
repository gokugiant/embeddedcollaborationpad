<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

include("templates/header.inc.php");
?>
  <main role="main" class="inner cover">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
	  <li class="nav-item" role="presentation">
	    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Code snippets</a>
	  </li>
	  <li class="nav-item" role="presentation">
	    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">MQTT</a>
	  </li>
	  <li class="nav-item" role="presentation">
	    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
	  </li>
	</ul>
	<div class="tab-content" id="myTabContent">
		
	  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
		  <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>
		  
	  </div>
	  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">.MQTT.</div>
	  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Lins</div>
	</div>

	<hr/>
 
    <div class="container">
	    <div class="container">
		  <div class="row">
		    <div class="col-4">
		      	<div class="">
			      <button id="open-or-join-room" class="btn btn-success">
			      	<i class="fas fa-video"></i> Join meeting
			      </button>
			      <button id="leave-room" class="btn btn-danger" style="display: none;">
			      	<i class="fas fa-times-circle"></i> Leave meeting
			      </button>
			    </div>
				<div id="video-container" class="media-box"></div>
		    </div>
		    <div class="col-8">
			  <button class="btn btn-warning clip-btn-jquery float-right" data-toggle="tooltip" title="Copy w/ jQuery">
			    <i class="far fa-times-copy"></i> Copy</span>
			</button> 
			  <p>Code share</p> 
		      <div id="firepad-container"></div>
		    </div>
		  </div>
		</div>     
	</div>
  </main>

<?php 
include("templates/footer.inc.php")
?>