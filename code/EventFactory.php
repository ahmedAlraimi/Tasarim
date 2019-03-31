<?php

/**
 * Event class
http://sandbox.onlinephpfunctions.com/code/cf55fcab36be69dd83f408961de770fb5120aa47
 */
abstract class AbstractEvent {
    abstract function getEventManager();
    abstract function getLocation();
    abstract function getDateTime();
    abstract function getDescription();
} //End AbstractEvent

class Event extends AbstractEvent {
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
    
    // setters
    function setEventManager($manager) {
        $this->manager = $manager;
    }
    function setLocation($location) {
        $this->location = $location;
    }
    function setDateTime($date_time) {
        $this->date_time = $date_time;
    }
    function setDescription($description) {
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
        return "Event Manager : " . $this->manager . ", Location : " . $this->location 
        . ", Date/Time : " . $this->date_time . ", Description : " . $this->description . "\r\n\n";
    }
    
} //End Event

/**
 * EventFactory class
 */
abstract class AbstractEventFactory {
    abstract function makeEvent($manager, $location, $date_time, $description);
} // End AbstractEventFactory

class EventFactory extends AbstractEventFactory {
    private $context = "Event";
    function makeEvent($manager, $location, $date_time, $description){
        return new Event($manager, $location, $date_time, $description);
    }
} // End EventFactory


/**
 * Initialization
 */

 print "BEGIN TESTING (EventFactory) FACTORY PATTERN \r\n\n";
 
 $eventFactoryInstance = new EventFactory;

 $event1 = $eventFactoryInstance->makeEvent('Ahmed', 'City Hall', '2019-04-06', 'Spring Event 1');
 print "EVENT(1) => " . $event1->getEventInfo();
 
 $event2 = $eventFactoryInstance->makeEvent('Mert', 'Seka Park', '2019-05-06', 'Spring Event 2');
 print "EVENT(2) => " . $event2->getEventInfo();
 
 $event3 = $eventFactoryInstance->makeEvent('Hasan', ' City Football Court', '2019-08-06', 'Sport Event');
 print "EVENT(3) => " . $event3->getEventInfo();
 
?>
