

<div class="row" id="">
	<h1>User (Student , Event Manager, Admin)</h1>
</div>
<div class="row">
	<h3>Student Example</h3>
</div>
<div class="row" id="Factory">
	<p>Create 'Student' User : Factory Pattern</p>
</div>


<div class="row">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#section1" aria-expanded="false" aria-controls="section1">
    Show Results
  </button>
  <button class="btn btn-primary btn-danger" type="button" data-toggle="collapse" data-target="#uml1" aria-expanded="false" aria-controls="uml1">
    Show UML
  </button>
</div>

<div class="collapse"  id="uml1">
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

// // Factory Pattern 
// if ( isset($_GET['user_type']) ) {

//     // User Factory Model
//     $user_factory = new models\UserFactory($_GET['user_type']);
// } else {
// 	// User Factory Model
// 	$user_factory = new models\UserFactory('student');
// }


// User Factory Model
$user_factory = new models\UserFactory('student');

// User View
$user_view = new views\UserView();


// User Controller
$user_controller = new controllers\UserController();
$user_controller->setUserModel($user_factory);
$user_controller->setUserView($user_view);

// User Info
$userInfo = array(
	'type' 			=> 'student',
	'id' 			=> 1,
	'login_name' 	=> 'ahmed19',
	'password' 		=> '1234',
	'first_name' 	=> 'ahmed',
	'last_name' 	=> 'hasan',
	'email' 		=> 'abc@gmail.com'
);

$profileInfo = array(
	'student_id' 	=> '1000',
	'department' 	=> 'Computer Engineering',
	'status' 		=> 'Graduated',
	'address' 		=> 'Kocaeli',
	'phone_number' 	=> '+123456789'
);

	

?>

<div class="collapse"  id="section1">
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
					<?php $user_controller->resetPassword('987654') ; ?>
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
					<?php var_dump($user_factory); ?>
				</div>
			</div>
		</div>
	</div>
</div> <!-- end of section1 -->

