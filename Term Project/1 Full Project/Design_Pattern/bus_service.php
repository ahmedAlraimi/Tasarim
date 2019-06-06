<div class="row">
	<h1>Event Bus Service </h1>
</div>
<div class="row" id="Pool">
	<p>Prepare Event Bus Service : Object Pool Pattern</p>
</div>
<div class="row">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#section7" aria-expanded="false" aria-controls="section7">
    Show Results
  </button>
  <button class="btn btn-primary btn-danger" type="button" data-toggle="collapse" data-target="#uml6" aria-expanded="false" aria-controls="uml6">
    Show UML
  </button>
</div>

<div class="collapse"  id="uml6">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">	
					<img src="public/img/ObjectPool_Class_diagram.svg" alt="">
				</div>
			</div>
		</div>
	</div>
</div>

 
<?php


 //  Model
$plates = array('111', '222', '333');
$pool = new models\BusServicePool($plates);

 // View
$bus_view = new views\BusServiceView();

 // Controller
$bus_service_controller = new controllers\BusServiceController();

$bus_service_controller->setModel($pool);
$bus_service_controller->setView($bus_view);


?>

<div class="collapse"  id="section7">

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Call a Bus From Pool (111, 222, 333)
				</div>
				<div class="card-body">	
					<?php
						$bus1 = $bus_service_controller->CallBusService();
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Call a Bus From Pool (111, 222, 333)
				</div>
				<div class="card-body">	
					<?php
						$bus2 = $bus_service_controller->CallBusService();
					?>>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Call a Bus From Pool (111, 222, 333)
				</div>
				<div class="card-body">	
					<?php
						$bus3 = $bus_service_controller->CallBusService();
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Release a Bus From Pool (111, 222, 333)
				</div>
				<div class="card-body">	
					<?php 
						$bus_service_controller->release(3);
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Call a Bus From Pool (111, 222, 333)
				</div>
				<div class="card-body">	
					<?php
						$bu4 = $bus_service_controller->CallBusService();
					?>
				</div>
			</div>
		</div>
	</div>



	
</div> <!-- end of section3 -->