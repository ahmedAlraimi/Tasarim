<?php

namespace models;
use models\User;
use models\UserInterface;

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

?>