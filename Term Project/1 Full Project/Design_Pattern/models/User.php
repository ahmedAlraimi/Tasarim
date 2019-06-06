<?php

namespace models;

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

?>