<?php

namespace models;


class ManagementProfile {
	private $position;
	private $address;
	private $phone_number;
	



	public function setPosition($position){
		$this->position = $position;
	}

	public function setAddress($address){
		$this->address = $address;
	}

	public function setPhoneNumber($phone_number){
		$this->phone_number = $phone_number;
	}


    
    public function preview(){
    	$profile = array(
    		'position' 		=> $this->position,
    		'address' 		=> $this->address,
    		'phone_number' 	=> $this->phone_number
    	);
        return $profile;
    }

}

?>