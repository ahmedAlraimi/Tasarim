<?php

namespace models;
use models\User;
use models\UserInterface;

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

?>