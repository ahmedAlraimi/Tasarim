<div class="row">
	<h1>Event Location</h1>
</div>
<div class="row">
	<h3>Meeting Hall Example</h3>
</div>
<div class="row" id="Singleton">
	<p>Reserve Meeting Hall : Singleton Pattern</p>
</div>
<div class="row">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#section3" aria-expanded="false" aria-controls="section3">
    Show Results
  </button>
  <button class="btn btn-primary btn-danger" type="button" data-toggle="collapse" data-target="#uml2" aria-expanded="false" aria-controls="uml2">
    Show UML
  </button>
</div>

<div class="collapse"  id="uml2">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">	
					<img src="public/img/Singleton_Class_diagram.svg" alt="">
				</div>
			</div>
		</div>
	</div>
</div>

 
<?php


// Location Model
$location = new models\Location();

// Location View
$location_view = new views\LocationView();

// Location Controller
$location_controller = new controllers\LocationController();
$location_controller->setModel($location);
$location_controller->setView($location_view);

?>

<div class="collapse"  id="section3">

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Meeting Hall Reservation (1) - while free
				</div>
				<div class="card-body">	
					<?php $location_controller->getLocation('hall', 'reserve') ; ?>
				</div>
			</div>
		</div>
	</div>

	<?php
		// Location Model
		$location2 = new models\Location();
		$location_controller->setModel($location2);
	?>

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Meeting Hall Reservation (2) - while occupied
				</div>
				<div class="card-body">	
					<?php $location_controller->getLocation('hall', 'reserve') ; ?>
				</div>
			</div>
		</div>
	</div>

	<?php
		// Location Model
		$location_controller->setModel($location);
	?>

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Meeting Hall Check Out (1) - 
				</div>
				<div class="card-body">	
					<?php $location_controller->getLocation('hall', 'check_out') ; ?>
				</div>
			</div>
		</div>
	</div>

	<?php
		// Location Model
		$location_controller->setModel($location2);

	?>

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Meeting Hall Reservation (2) - after check out
				</div>
				<div class="card-body">	
					
					<?php $hall = $location_controller->getLocation('hall', 'reserve');
						  $hall; ?>
				</div>
			</div>
		</div>
	</div>



	
</div> <!-- end of section3 -->