<?php

// Event Manager Class
class EventManager {
    protected $name;

    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    public function getName() {
        return $this->name;
    }
}


// Event Class
class Event {
    protected $event_manager;

    public function setEventManager(EventManager $manager) {
        $this->event_manager = $manager;
        return $this;
    }

    public function getEventManager() {
        return $this->event_manager;
    }
}

$manager1 = new EventManager();
$manager1->setName("Ahmed");

$event1 = new Event();
$event1->setEventManager($manager1);

$event2 = clone $event1;

$manager2 = new EventManager();
$manager2->setName("Hasan");
$event2->setEventManager($manager2);

print "\nTrail 1 : \n";

print $event1->getEventManager()->getName(); // Outputs "Ahmed"
/* As $event2 is a clone, setting a new value for $event2->event_manager did not change $event1. 
 Let’s look at this from a different angle.
*/

$manager1 = new EventManager();
$manager1->setName("Ahmed");

$event1 = new Event();
$event1->setEventManager($manager1);

$event2 = clone $event1;

$event2->getEventManager()->setName("Hasan");
print "\n\nTrail 2 : \n";
print $event1->getEventManager()->getName(); // Outputs "Hasan"

?>