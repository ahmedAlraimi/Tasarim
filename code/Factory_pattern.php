<?php

class UserFactory
{
    private $user;
    private $user_type;

    public function __construct($type){
        if (strtolower(trim($type)) == 'student') {
            $this->user = new Student();
        } elseif (strtolower(trim($type)) == 'event_manager') {
            $this->user = new EventManager();
        } elseif (strtolower(trim($type)) == 'admin') {
            $this->user = new Admin();
        }
        $this->user_type = $type;

    }

    public function getUser(){
        return $this->user;
    }

    public function getUserType(){
        return $this->user_type;
    }

}

interface UserInterface
{
    public function getProfile();
}

class User {

	private $id;
	private $login_name;
	private $password;
	private $first_name;
	private $last_name;
	private $email;
	private $type;
	private $login_status;

	/*
	* Setters
	*/
	public function setId($id){
		$this->id = $id; 
	}

	public function setLoginName($login_name){
		$this->login_name = $login_name; 
	}

	public function setPassword($password){
		$this->password = $password; 
	}

	public function setFirstName($first_name){
		$this->first_name = $first_name; 
	}

	public function setLastName($last_name){
		$this->last_name = $last_name; 
	}

	public function setEmail($email){
		$this->email = $email; 
	}

	public function setType($type){
		$this->type = $type; 
	}
	
	public function setLoginStatus($login_status){
		$this->login_status = $login_status; 
	}

	/*
	* Getters
	*/

	public function getId(){
		return $this->id;
	}

	public function getLoginName(){
		return $this->login_name;
	}

	public function getPassword(){
		return $this->password;
	}

	public function getFirstName(){
		return $this->first_name;
	}

	public function getLastName(){
		return $this->last_name;
	}


	public function getEmail(){
		return $this->email;
	}

	public function getType(){
		return $this->type; 
	}

	public function getLoginStatus(){
		return $this->login_status;
	}
}

class Student extends User implements UserInterface, \SplObserver{

	private $student_profile;
	private $attending;
    private $preview_events = [];


	public function __construct(){
        $this->attending = array();
    }

    /**
     * It is called by the Subject, usually by SplSubject::notify()
     *
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        $this->preview_events[] = clone $subject;
    }

    public function getCreatedEvents(): array
    {
        return $this->preview_events;
    }


    // public function setProfile($item){
    //     foreach($item as $key => $value)
    //     {
    //         $this->student_profile[$key] = $value;
    //     }     
    // }

    public function setProfile($profile){

            $this->student_profile = $profile;    
    }

    public function setAttending($attending){

            $this->attending[] = $attending;    
    }
    
    public function getProfile(){
        return $this->student_profile;
    }

    public function getAttending(){
        return $this->attending;
    }

}

class EventManager extends User implements UserInterface, \SplObserver{
	private $event_manager_profile;
	private $related_events;
    private $preview_events = [];


	public function __construct(){
        $this->related_events = array();
    }

    /**
     * It is called by the Subject, usually by SplSubject::notify()
     *
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        $this->preview_events[] = clone $subject;
    }

    public function getCreatedEvents(): array
    {
        return $this->preview_events;
    }

	public function setProfile($profile){

            $this->event_manager_profile = $profile;    
    }

    public function getProfile(){
        return $this->event_manager_profile;
    }

    public function setRelatedEvents($related_events){

            $this->related_events[] = $related_events;    
    }

    public function getRelatedEvents(){
        return $this->related_events;
    }

}

class Admin extends User implements UserInterface, \SplObserver{
	private $admin_profile;
    private $preview_events = [];

    /**
     * It is called by the Subject, usually by SplSubject::notify()
     *
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        $this->preview_events[] = clone $subject;
    }

    public function getCreatedEvents(): array
    {
        return $this->preview_events;
    }

	public function setProfile($profile){

            $this->event_manager_profile = $profile;    
    }

    public function getProfile(){
        return $this->event_manager_profile;
    }

}

class StudentProfile {
	private $student_id; 
	private $department;
	private $status;
	private $address;
	private $phone_number;



	public function setStudentId($student_id){
		$this->student_id = $student_id;
	}

	public function setDepartment($department){
		$this->department = $department;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function setAddress($address){
		$this->address = $address;
	}

	public function setPhoneNumber($phone_number){
		$this->phone_number = $phone_number;
	}


    
    public function preview(){
    	$profile = array(
    		'student_id' 	=> $this->student_id,
    		'department' 	=> $this->department,
    		'status' 		=> $this->status,
    		'address' 		=> $this->address,
    		'phone_number' 	=> $this->phone_number
    	);
        return $profile;
    }

}

class UserView
	{

	    public function printUserRegisteration($input) {

	        echo $input;
	    }

	    public function printUserLogin($input) {

	        echo $input;
	    }

	    public function printUserResetPassword($input){
	    	echo $input;
	    }

	    public function printUserProfile($input){
	    	var_dump($input) ;
	    }
	    
	}
	
class UserController
{
    private $User;
    private $UserView;
    
	public function __construct(){
	}

    public function setUserModel($User){
       $this->User = $User; 
    }

    public function setUserView($UserView){
       $this->UserView = $UserView; 
    }


	public function login($case){
        $user = $this->User->getUser();

		if ($case) {
			$user->setLoginStatus(true);
		} else{
			$user->setLoginStatus(false);
		}
        $response = 'User Login (' . $user->getLoginStatus() . ') Successfully';
        $this->UserView->printUserLogin($response);
    }

    public function register($info){
        $user = $this->User->getUser();
        $type = $this->User->getUserType();

    	if (isset($info['id'])) {
    		$user->setId($info['id']);
    	}
    	if (isset($info['login_name'])) {
    		$user->setLoginName($info['login_name']);
    	}
    	if (isset($info['password'])) {
    		$user->setPassword($info['password']);
    	}
    	if (isset($info['first_name'])) {
    		$user->setFirstName($info['first_name']);
    	}
    	if (isset($info['last_name'])) {
    		$user->setLastName($info['last_name']);
    	}
    	if (isset($info['email'])) {
    		$user->setEmail($info['email']);
    	}
    	if (isset($info['type'])) {
    		$user->setType($info['type']);
    	}

        if ($type == 'student') {
            $user->setProfile(new StudentProfile());
        } else {
            $user->setProfile(new ManagementProfile());
        }

        $response = ' [ ' . strtoupper($type) . ' ] User Registered Successfully';
        $this->UserView->printUserRegisteration($response);

    	
    }

    public function resetPassword($password){
        $user = $this->User->getUser();

        $old_password =  $user->getPassword();
    	$user->setPassword($password);

        $response = 'Password [' . $old_password . '] Update To [' . $password . '] Successfully';
        $this->UserView->printUserResetPassword($response);
    }


    public function updateProfile($info){

        $user = $this->User->getUser();
        $type = $this->User->getUserType();

    	if ($type == 'student') {
            if (isset($info['student_id'])) {
                $user->getProfile()->setStudentId($info['student_id']);
            }
            if (isset($info['department'])) {
                $user->getProfile()->setDepartment($info['department']);
            }
            if (isset($info['status'])) {
                $user->getProfile()->setStatus($info['status']);
            }
        } 
        else {
            if (isset($info['position'])) {
                $user->getProfile()->setPosition($info['position']);
            }
        }

    	if (isset($info['address'])) {
    		$user->getProfile()->setAddress($info['address']);
    	}
    	if (isset($info['phone_number'])) {
    		$user->getProfile()->setPhoneNumber($info['phone_number']);
    	}

        $this->UserView->printUserProfile($user->getProfile());

    }

}



//////////////////////////////////// DEMO
// User Factory Model
$user_factory = new UserFactory('student');

// User View
$user_view = new UserView();


// User Controller
$user_controller = new UserController();
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

print "User Info To Be Registered";
var_dump($userInfo);

print "User Registeration";
$user_controller->register($userInfo) ;

print "User Login";
$user_controller->login(true) ;

print "User Reset Password";
$user_controller->resetPassword('987654') ; 

print "User Profile";
$user_controller->updateProfile($profileInfo) ;

 var_dump($user_factory);



?>





