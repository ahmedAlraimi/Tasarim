<?php
namespace models;
use models\UserInterface;
use models\Student;
use models\EventManager;
use models\Admin;

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

?>