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
					<?php include("templates/snippets.php")?>
					</div>
				</div>
				<div class="tab-pane fade" id="mqtt" role="tabpanel" aria-labelledby="mqtt-tab">MQTT</div>
				<div class="tab-pane fade" id="tutorial" role="tabpanel" aria-labelledby="tutorial-tab">
					<iframe src="https://www.youtube.com/embed/0wAY3DYihyg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<iframe src="https://www.youtube.com/embed/UE1mtlsxfKM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
