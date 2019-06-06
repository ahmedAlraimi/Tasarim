<?php

namespace models;
abstract class AbstractEventFactory {
    abstract function makeEvent($type, $manager, $location, $date_time, $description);
} // End AbstractEventFactory


?>