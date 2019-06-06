<?php
namespace controllers;

use models\StudentProfile;
use models\ManagementProfile;

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

?>