
<div class="row">
	<h3>Park Example</h3>
</div>
<div class="row" id="Command">
	<p>Reserve Activity Park 'or others' : Command Pattern</p>
</div>
<div class="row">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#section4" aria-expanded="false" aria-controls="section4">
    Show Results
  </button>
  <button class="btn btn-primary btn-danger" type="button" data-toggle="collapse" data-target="#uml3" aria-expanded="false" aria-controls="uml3">
    Show UML
  </button>
</div>

<div class="collapse"  id="uml3">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">	
					<img src="public/img/Command_Class_diagram.svg" alt="">
				</div>
			</div>
		</div>
	</div>
</div>


<?php


// Location Model
$locationPark = new models\Location();

// Location View
$location_view = new views\LocationView();

// Location Controller
$location_controller2 = new controllers\LocationController();

$location_controller2->setModel($locationPark);
$location_controller2->setView($location_view);

	

?>

<div class="collapse"  id="section4">

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Activity Park Reservation  
				</div>
				<div class="card-body">	
					<?php $location_controller2->getLocation('park', 'reserve');?>
				</div>
			</div>
		</div>
	</div>


	
</div> <!-- end of section4 -->