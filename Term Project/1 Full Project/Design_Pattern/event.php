<div class="row">
	<h1>Event </h1>
</div>
<div class="row">
	<h3> Graduated Students ( Event, Meeting ), General ( Event, Meeting ) Examples</h3>
</div>
<div class="row" id="Abstract_Factory">
	<p>Generate Events : Abstract Factory Pattern</p>
</div>
<div class="row" id="Observer">
	<p>Observe creating events and notify students : Observer Pattern</p>
</div>
<div class="row">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#section5" aria-expanded="false" aria-controls="section5">
    Show Results
  </button>
  <button class="btn btn-primary btn-danger" type="button" data-toggle="collapse" data-target="#uml4" aria-expanded="false" aria-controls="uml4">
    Show UML
  </button>
</div>

<div class="collapse"  id="uml4">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Abstract Factory
				</div>
				<div class="card-body">	
					<img src="public/img/Abstract_Factory_Class_diagram.svg" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Observer
				</div>
				<div class="card-body">	
					<img src="public/img/Observer_Class_diagram.svg" alt="">
				</div>
			</div>
		</div>
	</div>
</div>

 
<?php

////////// event

 //  Factory Model
$factory = new models\EventFactoryProducer();

 // View
$event_view = new views\EventView();

 // Controller
$event_controller = new controllers\EventController();

$event_controller->setModel($factory);
$event_controller->setView($event_view);

$observers = array($user_factory->getUser(), $user_factory2->getUser());


?>

<div class="collapse"  id="section5">

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Graduated Event - with observer notify()
				</div>
				<div class="card-body">	
					<?php 
						$event_info = array(
							'type' 			=>	'Event',
							'manager'		=>	$user_factory2,
							'location'		=>	$location_controller2->getLocation('park', 'reserve'),
							'date_time' 	=>	'2019-04-06 09:00',
							'description' 	=>	'Spring Event 1'
						);

						$event_controller->makeEvent(true, $event_info, $observers);
					; ?>
				</div>
			</div>
		</div>
	</div>

 	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Graduated Meeting  - with observer notify()
				</div>
				<div class="card-body">	
					<?php 						

						$event_info = array(
							'type' 			=>	'Meeting',
							'manager'		=>	$user_factory2,
							'location'		=>	$location_controller->useLocation(),
							'date_time' 	=>	'2019-04-06 09:00',
							'description' 	=>	'Spring Meeting 1'
						);

						$event_controller->makeEvent(true, $event_info, $observers);
					; ?>
				</div>
			</div>
		</div>
	</div> 

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Graduated Meeting Event - with observer notify()
				</div>
				<div class="card-body">	
					<?php 
						$event_info = array(
							'type' 			=>	'Event',
							'manager'		=>	$user_factory2,
							'location'		=>	$location_controller2->getLocation('park', 'reserve'),
							'date_time' 	=>	'2019-04-10 09:00',
							'description' 	=>	'Sport Event'
						);

						$event_controller->makeEvent(false, $event_info, $observers);
					; ?>
				</div>
			</div>
		</div>
	</div>



 	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Graduated Meeting Event - with observer notify()
				</div>
				<div class="card-body">	
					<?php 
						$event_info = array(
							'type' 			=>	'Meeting',
							'manager'		=>	$user_factory2,
							'location'		=>	$location_controller->useLocation(),
							'date_time' 	=>	'2019-04-05 09:00',
							'description' 	=>	'Degree Students Meeting'
						);

						$event_controller->makeEvent(false, $event_info, $observers);
					; ?>
				</div>
			</div>
		</div>
	</div> 





	
</div> <!-- end of section3 -->