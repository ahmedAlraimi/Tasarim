<div class="row">
	<h1>Ticket </h1>
</div>
<div class="row">
	<h3> Ticket Sale Example </h3>
</div>
<div class="row" id="Iterator">
	<p>Find Available ticket : Iterator Pattern</p>
</div>
<div class="row" id="Memento">
	<p>Ticket State (availble , sold) : Memento Pattern</p>
</div>
<div class="row" id="Decorator">
	<p>Ticket Extras : Decorator Pattern</p>
</div>
<div class="row">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#section8" aria-expanded="false" aria-controls="section8">
    Show Results
  </button>
<button class="btn btn-primary btn-danger" type="button" data-toggle="collapse" data-target="#uml7" aria-expanded="false" aria-controls="uml7">
    Show UML
  </button>
</div>

<div class="collapse"  id="uml7">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Iterator
				</div>
				<div class="card-body">	
					<img src="public/img/Iterator_Class_diagram.svg" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Memento
				</div>
				<div class="card-body">	
					<img src="public/img/Memento_Class_diagram.svg" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Decorator
				</div>
				<div class="card-body">	
					<img src="public/img/Decorator_Class_diagram.svg" alt="">
				</div>
			</div>
		</div>
	</div>
</div>

 
<?php


 //  Model
$tickets = new models\TicketList();

for ($i = 0 ; $i < 30 ; $i++){
    $seat = 'Seat'.strval($i+1);
	$t = new models\Ticket($seat, 10);
	$tickets->addTicket($t);
}
$ticketsIterator = new models\TicketListIterator($tickets);

 // View
$ticket_view = new views\TicketView();

 // Controller
$ticket_controller = new controllers\TicketController();

$ticket_controller->setModel($ticketsIterator);
$ticket_controller->setView($ticket_view);


?>

<div class="collapse"  id="section8">

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Available Tickt Sale : Iterator Pattern
				</div>
				<div class="card-body">	
					<?php
						$ticket_controller->buyTicket();
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Close Ticket - Sold : Memento Pattern
				</div>
				<div class="card-body">	
					<?php
						$ticket_controller->SoldState($ticket_controller->getSoldTicket());
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Add extras on ticket bill : Decorator Pattern
				</div>
				<div class="card-body">	
					<?php
						$extra = array(
							'ticket' 	=> $ticket_controller->getSoldTicket(),
							'extra'		=> array('Transportation', 'OpenBuffet') 
						);
						$ticket_controller->extra($extra);
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Another Available Tickt Sale : Iterator Pattern
				</div>
				<div class="card-body">	
					<?php
						$ticket_controller->buyTicket();
					?>
				</div>
			</div>
		</div>
	</div>


	
</div> <!-- end of section3 -->