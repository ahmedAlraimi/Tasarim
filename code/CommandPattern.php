<?php

interface EventCommand
{
    /**
     * this is the most important method in the Command pattern,
     */
    public function execute();
}

// Event Class
class EventLocation {
    private $address;
    private $seat_no;

    public function __construct()
    {
        $this->address = 'Engineering_Hall_10';
        $this->seat_no = 30;
    }

    public function reserve() {
        $statement = "\n Event Location at " . $this->address . " - " . $this->seat_no . " Seats (RESERVED)";
        print $statement;
    }
    
    public function confirm() {
        $statement = "\n Event Location at " . $this->address . " - " . $this->seat_no . " Seats (CONFIRMED)";
        print $statement;
    }
}

class ReserveLocation implements EventCommand {
    private $event_location;

    public function __construct(EventLocation $event_location) {
        $this->event_location = $event_location;
    }
    
    public function execute()
    {
        $this->event_location->reserve();
    }
}

class ConfirmLocation implements EventCommand {
    private $event_location;

    public function __construct(EventLocation $event_location) {
        $this->event_location = $event_location;
    }
    
    public function execute()
    {
        $this->event_location->confirm();
    }
}

class Invoker
{
    
    private $command;

    public function setCommand(EventCommand $cmd)
    {
        $this->command = $cmd;
    }

    /**
     * executes the command; the invoker is the same whatever is the command
     */
    public function run()
    {
        $this->command->execute();
    }
}

//Implementation
print "\nBEGIN TESTING COMMAND PATTERN ";

$location = new EventLocation();

$reserveCommand = new reserveLocation($location);
$confirmCommand = new confirmLocation($location);

$invoker = new Invoker();

$invoker->setCommand($reserveCommand);
print "\n\n Reserve Command is set ";
$invoker->run();

$invoker->setCommand($confirmCommand);
print "\n\n Confirm Command is set ";
$invoker->run();



?>

