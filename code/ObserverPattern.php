<?php
/**
* Event Manager Change Observer Program
*/

class Event implements \SplSubject
{
    /**
     * @var string
     */
    private $event_manager;

    /**
     * @var \SplObjectStorage
     */
    private $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function changeEventManager(string $event_manager)
    {
        $this->event_manager = $event_manager;
        $this->notify();
    }

    public function notify()
    {
        /** @var \SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

class EventObserver implements \SplObserver
{
    /**
     * @var Event[]
     */
    private $changedEvents = [];

    /**
     * It is called by the Subject, usually by SplSubject::notify()
     *
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        $this->changedEvents[] = clone $subject;
    }

    /**
     * @return Event[]
     */
    public function getChangedEvents(): array
    {
        return $this->changedEvents;
    }
}

//Implementation
print "\nBEGIN TESTING OBSERVER PATTERN ";

$observer = new EventObserver();

        $event_1 = new Event();
        $event_1->attach($observer);
        
        $event_2 = new Event();
        $event_2->attach($observer);
        
        $event_3 = new Event();
        $event_3->attach($observer);

        
        
        $event_1->changeEventManager('manager1');
        print "\n\n event_1 has changed";
        print "\n\n Current Changed Events : " . count( $observer->getChangedEvents() );
        
        $event_3->changeEventManager('manager3');
        print "\n\n event_3 has changed";
        print "\n\n Current Changed Events : " . count( $observer->getChangedEvents() );
    
?>

