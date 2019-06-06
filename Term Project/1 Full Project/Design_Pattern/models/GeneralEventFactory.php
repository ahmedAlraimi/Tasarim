<?php

namespace models;

use models\AbstractEventFactory;
use models\GeneralEvent;
use models\GeneralMeeting;

class GeneralEventFactory extends AbstractEventFactory {

    function makeEvent($type, $manager, $location, $date_time, $description){
        if($type === 'Event'){
            return new GeneralEvent($manager, $location, $date_time, $description);
        } else if($type === 'Meeting') {
            return new GeneralMeeting($manager, $location, $date_time, $description);
        }
    }
} // End GeneralFactory

?>