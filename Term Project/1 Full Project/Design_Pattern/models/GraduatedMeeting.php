<?php

namespace models;

use models\EventInterface;

class GraduatedMeeting implements EventInterface, \SplSubject  {
    private $manager;
    private $location;
    private $date_time;
    private $description;

    function __construct($manager, $location, $date_time, $description) {
        $this->manager = $manager;
        $this->location = $location;
        $this->date_time = $date_time;
        $this->description = $description;

        $this->observers = new \SplObjectStorage();
        $this->notify();
    }

    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function trigger(){
        $this->notify();
    }

    public function notify()
    {
        /** @var \SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }


    // getters
    function getEventManager() {
        return $this->manager;
    }
    function getLocation() {
        return $this->location;
    }
    function getDateTime() {
        return $this->date_time;
    }
    function getDescription() {
        return $this->description;
    }

    function getEventInfo() {

    	$summary = array(
    		'title' 		=> 'Graduated(Alumni) Meeting',
    		'Event Manager' => $this->manager,
    		'Location' 		=> $this->location,
    		'date' 			=> $this->date_time,
    		'description'	=> $this->description
    	);

        return $summary;
    }

} //End Graduated Event
?>