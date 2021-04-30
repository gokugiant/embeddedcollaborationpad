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
		<div class="col-lg-2 d-lg-block bg-light">
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
	    
	    <div id="textCollumn" class="col-lg-4">
		    <nav class="nav navbar-light" style="background-color: #e3f2fd;">
				<button id="newSketchButton" class="btn btn-warning clip-btn-jquery float-right" data-toggle="tooltip" title="" data-original-title="Black Arduino sketch">
					<i class="fas fa-file-code"></i> New</span>
				</button>
				<div class="mx-auto mr-auto">Code sharing</div> 
				<button id="clearButton" class="btn btn-warning clip-btn-jquery float-right" data-toggle="tooltip" title="" data-original-title="Clear clipboard">
					<i class="fas fa-eraser"></i> Clear</span>
				</button>
				<button id="copyToClipboardButton" class="btn btn-warning clip-btn-jquery float-right" data-toggle="tooltip" title="" data-original-title="Copy to clipboard">
					<i class="far fa-copy"></i> Copy</span>
				</button>
				<button id="downloadButton" class="btn btn-warning clip-btn-jquery float-right" data-toggle="tooltip" title="" data-original-title="Copy to clipboard">
					<i class="fas fa-file-download"></i> Download</span>
				</button> 
			</nav>
			<div id="firepad-container"></div>
	    </div>
	    <main role="main" class="col-lg-6 bg-light">
			<?php include("templates/educationCollum.php")?>
		</main>
	</div>    
</div>

<?php 
include("templates/footer.inc.php")
?>