<?php


class Memento
{
    /**
     * @var State
     */
    private $state;

    /**
     * @param State $stateToSave
     */
    public function __construct(State $stateToSave)
    {
        $this->state = $stateToSave;
    }

    /**
     * @return State
     */
    public function getState()
    {
        return $this->state;
    }
}

class State
{
    const STATE_CREATED = 'created';
    const STATE_OPENED = 'opened';
    const STATE_ASSIGNED = 'assigned';
    const STATE_CLOSED = 'closed';

    /**
     * @var string
     */
    private $state;

    /**
     * @var string[]
     */
    private static $validStates = [
        self::STATE_CREATED,
        self::STATE_OPENED,
        self::STATE_ASSIGNED,
        self::STATE_CLOSED,
    ];

    /**
     * @param string $state
     */
    public function __construct(string $state)
    {
        self::ensureIsValidState($state);

        $this->state = $state;
    }

    private static function ensureIsValidState(string $state)
    {
        if (!in_array($state, self::$validStates)) {
            throw new \InvalidArgumentException('Invalid state given');
        }
    }

    public function __toString(): string
    {
        return $this->state;
    }
}

/**
 * Ticket is the "Originator" in this implementation
 */
class Ticket
{
    /**
     * @var State
     */
    private $currentState;

    public function __construct()
    {
        $this->currentState = new State(State::STATE_CREATED);
    }

    public function open()
    {
        $this->currentState = new State(State::STATE_OPENED);
    }

    public function assign()
    {
        $this->currentState = new State(State::STATE_ASSIGNED);
    }

    public function close()
    {
        $this->currentState = new State(State::STATE_CLOSED);
    }

    public function saveToMemento(): Memento
    {
        return new Memento(clone $this->currentState);
    }

    public function restoreFromMemento(Memento $memento)
    {
        $this->currentState = $memento->getState();
    }

    public function getState(): State
    {
        return $this->currentState;
    }
}

//Implementation
print "\nBEGIN TESTING MEMENTO PATTERN ";

$ticket = new Ticket();

        // open the ticket
        $ticket->open();
        $openedState = $ticket->getState();
        print "\n\n After open the ticket , getState : " . (string) $ticket->getState();

        $memento = $ticket->saveToMemento();

        // assign the ticket
        $ticket->assign();
        print "\n\n After assign the ticket , getState : " . (string) $ticket->getState();

        // now restore to the opened state, but verify that the state object has been cloned for the memento
        $ticket->restoreFromMemento($memento);

        print "\n\n After open the ticket , getState : " . (string) $ticket->getState();

?>

