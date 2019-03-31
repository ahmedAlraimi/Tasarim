<?php

/**
 * Singleton classes
 http://sandbox.onlinephpfunctions.com/code/1619f21c0890bb90dbf3635462c1123354fb2067
 */
class EventHallSingleton {
    
    private $hall_no  = 'A15';
    private $seat_no  = 10;
    
    private static $hall = NULL;
    private static $is_occupied = FALSE;
    private static $event_id = NULL;

    private function __construct() {
    }

    static function reserve_hall($event_id) {
      if (FALSE == self::$is_occupied) {
        if (NULL == self::$hall) {
           self::$hall = new EventHallSingleton();
           self::$event_id = $event_id;
        }
        self::$is_occupied = TRUE;
        self::$event_id = $event_id;
        return self::$hall;
      } else {
        return NULL;
      }
    }
    
    function free_hall(EventHallSingleton $hall_empty) {
        self::$is_occupied = FALSE;
    }

    function getHallNo() {return $this->hall_no;}
    
    function getSeatNo() {return $this->seat_no;}
    
    function getEventID() {return self::$event_id;}

    function getDesc() {
      return $this->getHallNo() . " hall contains " . $this->getSeatNo() 
      . " seats and occupied by event # " . $this->getEventID() ."\r\n";
    }
} //End of EventHallSingleton

class HallReserver {
    private $reserved_hall;
    private $available = FALSE;

    function __construct() {
    }

    function getDesc() {
      if (TRUE == $this->available) {
        return $this->reserved_hall->getDesc();
      } else {
        return "The hall is not available at the moment\r\n";
      }
    }

    function reserve_hall($event_id) {
      $this->reserved_hall = EventHallSingleton::reserve_hall($event_id);
      if ($this->reserved_hall == NULL) {
        $this->available = FALSE;
      } else {
        $this->available = TRUE;
      }
    }

    function free_hall() {
      $this->reserved_hall->free_hall($this->reserved_hall);
    }
} // End of HallReserver

/**
 * Initialization
 */

 print "BEGIN TESTING (EventHallSingleton) SINGLETON PATTERN\r\n\n";
 
 $Reserver1 = new HallReserver();
 $Reserver2 = new HallReserver();
 
 $Reserver1->reserve_hall(123);
 print "Reserver1 trying to reserve the hall\r\n";
 print "Reservation information: " . $Reserver1->getDesc() ."\r\n";
 
 $Reserver2->reserve_hall(5656);
 print "Reserver2 trying to reserve the hall\r\n";
 print "Reservation information: " . $Reserver2->getDesc() ."\r\n";
 
 $Reserver1->free_hall();
 print "Reserver1 checked out \r\n\n";
 
 $Reserver2->reserve_hall(777);
 print "Reserver2 trying to reserve the hall\r\n";
 print "Reservation information: " . $Reserver2->getDesc() ."\r\n";
 
 print "END TESTING (EventHallSingleton) SINGLETON PATTERN\r\n";

?>