<?php 
namespace models;

class Ticket implements EventTicket
{
	private $seat_no;
	private $price;

    /**
     * @var State
     */
    private $currentState;

    public function __construct($seat_in, $price_in) {
      $this->seatNo  = $seat_in;
      $this->price  = $price_in;
      $this->currentState = new State(State::STATE_OPEN);
    }


    function getSeatNo() {return $this->seatNo;}
    function getPrice() {return $this->price;}


	

    public function open()
    {
        $this->currentState = new State(State::STATE_OPEN);
    }

    public function close()
    {
        $this->currentState = new State(State::STATE_CLOSE);
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

    // iterator
    public function calculatePrice()
    {
        return $this->price;
    }

}

?>