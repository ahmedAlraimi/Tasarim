<?php

namespace models;
use models\User;
use models\UserInterface;

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

?>