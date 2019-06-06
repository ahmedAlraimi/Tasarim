<!-- start of section2 -->

<div class="row">
	<h3>Event Manager Example</h3>
</div>
<div class="row">
	<p>Create 'Event Manager' User : Factory Pattern</p>
</div>
<div class="row">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#section2" aria-expanded="false" aria-controls="section2">
    Show Results
  </button>
  <button class="btn btn-primary btn-danger" type="button" data-toggle="collapse" data-target="#uml1_1" aria-expanded="false" aria-controls="uml1_1">
    Show UML
  </button>
</div>

<div class="collapse"  id="uml1_1">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">	
					<img src="public/img/Factory_Class_diagram.svg" alt="">
				</div>
			</div>
		</div>
	</div>
</div>

  
<?php


// User Factory Model
$user_factory2 = new models\UserFactory('event_manager');

// User View
// $user_view = new views\UserView();


// User Controller
// $user_controller = new controllers\UserController();
$user_controller->setUserModel($user_factory2);
$user_controller->setUserView($user_view);


// Event Manager Info
$userInfo = array(
	'type' 			=> 'event_manager',
	'id' 			=> 2,
	'login_name' 	=> 'Omar',
	'password' 		=> '9845',
	'first_name' 	=> 'Omar',
	'last_name' 	=> 'Altin',
	'email' 		=> 'zxc@gmail.com'
);

// Event Manager
$profileInfo = array(
	'status' 		=> 'HR Assistant',
	'address' 		=> 'Kocaeli',
	'phone_number' 	=> '+123456789'
);

	

?>

<div class="collapse"  id="section2">
	<!-- User Info -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					User Info To Be Registered
				</div>
				<div class="card-body">	
					<?php var_dump($userInfo) ; ?>
				</div>
			</div>
		</div>
	</div>

	<!-- User Registeration  -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					User Registeration
				</div>
				<div class="card-body">	
					<?php $user_controller->register($userInfo) ; ?>
				</div>
			</div>
		</div>
	</div>

	<!-- User Login  -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					User Login
				</div>
				<div class="card-body">	
					<?php $user_controller->login(true) ; ?>
				</div>
			</div>
		</div>
	</div>

	<!-- User Reset Password  -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					User Reset Password
				</div>
				<div class="card-body">	
					<?php $user_controller->resetPassword('654456') ; ?>
				</div>
			</div>
		</div>
	</div>

	<!-- User Profile  -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					User Profile
				</div>
				<div class="card-body">	
					<?php $user_controller->updateProfile($profileInfo) ; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">	
					<?php var_dump($user_factory2); ?>
				</div>
			</div>
		</div>
	</div>
</div> <!-- end of section2 -->