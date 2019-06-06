<div class="row">
	<h1>Event Preparation </h1>
</div>
<div class="row">
	<h3> Location Preparation </h3>
</div>
<div class="row" id="Builder">
	<p>build location (PreparationBuilder) : Builder Pattern</p>
</div>
<div class="row" id="Prototype">
	<p>clone assets (chairs, sound systems) : Prototype Pattern</p>
</div>
<div class="row">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#section6" aria-expanded="false" aria-controls="section6">
    Show Results
  </button>
<button class="btn btn-primary btn-danger" type="button" data-toggle="collapse" data-target="#uml5" aria-expanded="false" aria-controls="uml5">
    Show UML
  </button>
</div>

<div class="collapse"  id="uml5">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Builder
				</div>
				<div class="card-body">	
					<img src="public/img/Builder_Class_diagram.svg" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Prototype
				</div>
				<div class="card-body">	
					<img src="public/img/Prototype_Class_diagram.svg" alt="">
				</div>
			</div>
		</div>
	</div>
</div>

 
<?php


 //  Model
$preparation = new models\Preparation();

 // View
$preparation_view = new views\PreparationView();

 // Controller
$preparation_controller = new controllers\PreparationController();

$preparation_controller->setModel($preparation);
$preparation_controller->setView($preparation_view);

?>

<div class="collapse"  id="section6">

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Prepare a location (Build and prototype patterns)
				</div>
				<div class="card-body">	
					<?php 
						$prepare = array(
							'projector' 	=> 2,
							'sound_system' 	=> 2,
							'chair' 		=> 30,
							'snack' 		=> 30,
						);

						$preparation_controller->build($prepare);
					; ?>
				</div>
			</div>
		</div>
	</div>



	
</div> <!-- end of section3 -->