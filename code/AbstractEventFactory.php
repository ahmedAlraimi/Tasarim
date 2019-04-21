<?php

/**
 * AbstractEventFactory
 
http://sandbox.onlinephpfunctions.com/code/5d49827a343054cdce99bee89f2c9a52ec9b2528
*/

 
interface Event {
    function getEventInfo();
}

class GraduatedEvent implements Event {
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
        return "Graduated(Alumni) Event : Event Manager : " . $this->manager . ", Location : " . $this->location 
        . ", Date/Time : " . $this->date_time . ", Description : " . $this->description . "\r\n\n";
    }
    
} //End Graduated Event

class GraduatedMeeting implements Event {
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
        return "Graduated(Alumni) Meeting : Event Manager : " . $this->manager . ", Location : " . $this->location 
        . ", Date/Time : " . $this->date_time . ", Description : " . $this->description . "\r\n\n";
    }
    
} //End Graduated Meeting

class NormalEvent implements Event {
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
        return "Normal Event : Event Manager : " . $this->manager . ", Location : " . $this->location 
        . ", Date/Time : " . $this->date_time . ", Description : " . $this->description . "\r\n\n";
    }
    
} //End Normal Event

class NormalMeeting implements Event {
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
        return "Normal Meeting : Event Manager : " . $this->manager . ", Location : " . $this->location 
        . ", Date/Time : " . $this->date_time . ", Description : " . $this->description . "\r\n\n";
    }
    
} //End Normal Meeting


abstract class AbstractEventFactory {
    abstract function makeEvent($type, $manager, $location, $date_time, $description);
} // End AbstractEventFactory

class NormalFactory extends AbstractEventFactory {
    
    function makeEvent($type, $manager, $location, $date_time, $description){
        if($type === 'Event'){
            return new NormalEvent($manager, $location, $date_time, $description);
        } else if($type === 'Meeting') {
            return new NormalMeeting($manager, $location, $date_time, $description);
        }
    }
} // End NormalFactory

class GraduatedFactory extends AbstractEventFactory {
    
    function makeEvent($type, $manager, $location, $date_time, $description){
        if($type === 'Event'){
            return new GraduatedEvent($manager, $location, $date_time, $description);
        } else if($type === 'Meeting') {
            return new GraduatedMeeting($manager, $location, $date_time, $description);
        }
    }
} // End GraduatedFactory

class FactoryProducer {
    public static function getFactory($graduated) {
        if($graduated){
            return new GraduatedFactory();
        } else {
            return new NormalFactory();
        }
        
    }
} // End FactoryProducer

/**
 * Initialization
 */

 print "BEGIN TESTING (EventAbstractFactory) ABSTRACT FACTORY PATTERN \r\n\n";
 
 //get Graduated Factory
 $graduatedFactory = FactoryProducer::getFactory(true);
 
 // get an object of GRADUATED MEETING
 $graduated =  $graduatedFactory->makeEvent('Meeting', 'Ahmed', 'University Hall', '2019-04-06', 'Spring Meeting 1');
 print "MEETING(1) => " . $graduated->getEventInfo();

 // get an object of GRADUATED EVENT
 $graduated =  $graduatedFactory->makeEvent('Event', 'Mert', 'Seka Park', '2019-05-06', 'Spring Event 1');
 print "EVENT(1) => " . $graduated->getEventInfo();


 //get Normal Factory
 $normalFactory = FactoryProducer::getFactory(false);
 
 // get an object of NORMAL MEETING
 $normal =  $normalFactory->makeEvent('Meeting', 'Ali', 'University Hall', '2019-04-07', 'Degree Students Meeting');
 print "MEETING(2) => " . $normal->getEventInfo();

 // get an object of NORMAL EVENT
 $normal =  $normalFactory->makeEvent('Event', 'Hasan', ' City Football Court', '2019-08-06', 'Sport Event');
 print "EVENT(2) => " . $normal->getEventInfo();


?>
