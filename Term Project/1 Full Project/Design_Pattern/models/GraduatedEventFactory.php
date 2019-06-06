<?php

namespace models;

use models\AbstractEventFactory;
use models\GraduatedEvent;
use models\GraduatedMeeting;

class GraduatedEventFactory extends AbstractEventFactory {

    function makeEvent($type, $manager, $location, $date_time, $description){
        if($type === 'Event'){
        	$graduated_event = new GraduatedEvent($manager, $location, $date_time, $description);
            return $graduated_event;
        } else if($type === 'Meeting') {
        	$graduated_meeting = new GraduatedMeeting($manager, $location, $date_time, $description);
            return $graduated_meeting;
        }
    }
} // End GeneralFactory

?>