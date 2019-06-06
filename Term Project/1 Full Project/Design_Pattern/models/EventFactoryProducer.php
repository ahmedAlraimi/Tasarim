<?php

namespace models;

use models\GraduatedEventFactory;
use models\GeneralEventFactory;

class EventFactoryProducer {

	
    public static function getFactory($graduated) {
        if($graduated){
            return new GraduatedEventFactory();
        } else {
            return new GeneralEventFactory();
        }

    }
} // End EventFactoryProducer

?>