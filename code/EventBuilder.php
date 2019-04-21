<?php

/**
 * EventBuilder
 
http://sandbox.onlinephpfunctions.com/code/2c861c5caf5a85a4395898ddbf26786062de037e

*/

interface EventInterface {
    function getEventInfo();
}

class Event implements EventInterface {
    private $manager;
    private $location;
    private $date_time;
    private $description;
    
    function __construct($manager, $location, $date_time, $description) {
        $this->manager = $manager;
        $this->location = $location;
        $this->date_time = $date_time;
        $this->description = $description;
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
        return "Event : Event Manager : " . $this->manager . ", Location : " . $this->location 
        . ", Date/Time : " . $this->date_time . ", Description : " . $this->description . "\r\n\n";
    }
    
} //End  Event

class EventManager{
    private $manager;
    function __construct($manager) {
        $this->manager = $manager;
    }
    function getEventManager() {
        return $this->manager;
    }
}

class Location{
    private $location;
    function __construct($location) {
        $this->location = $location;
    }
    function getLocation() {
        return $this->location;
    }
}

// Event Builder
class EventBuilder{
    function makeEvent($manager, $location, $date_time, $description){
        $m = new EventManager($manager);
        $l = new Location($location);
        return new Event($m->getEventManager(), $l->getLocation(), $date_time, $description);
    }
 }

/**
 * Initialization
 */

 print "BEGIN TESTING (EventBuilder) BUILDER PATTERN \r\n\n";

    $event_builder = new EventBuilder();
    
    // build event 1
    $event1 =  $event_builder->makeEvent('Mert', 'Seka Park', '2019-05-06', 'Spring Event 1');
    print "EVENT(1) => " . $event1->getEventInfo();
    
    // build event 2
    $event2 =  $event_builder->makeEvent('Hasan', ' City Football Court', '2019-08-06', 'Sport Event');
    print "EVENT(2) => " . $event2->getEventInfo();


?>
