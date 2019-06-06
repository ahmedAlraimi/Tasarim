<?php

namespace models;


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

?>