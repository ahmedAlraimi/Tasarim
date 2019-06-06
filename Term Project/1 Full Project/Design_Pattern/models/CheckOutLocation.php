<?php
namespace models;

use models\ReserveLocationCommand;

class CheckOutLocation implements ReserveLocationCommand {
    private $event_location;

    public function __construct($event_location) {
        $this->event_location = $event_location;
    }

    public function execute()
    {
        $this->event_location->checkOut();
    }
}
?>