<?php

/*
* Evetns Ticket Sale
*
*/
class Ticket {
    private $seatNo;
	private $price;
    function __construct($seat_in, $price_in) {
      $this->seatNo  = $seat_in;
      $this->price  = $price_in;
    }
    function getSeatNo() {return $this->seatNo;}
    function getPrice() {return $this->price;}
    function getTicketInfo() {
      return 'Seat No :' . $this->getSeatNo() . ' - ' . $this->getPrice(). ' TL';
    }
}

class TicketList {
    private $tickets = array();
    private $ticketCount = 0;
    public function __construct() {
    }
    public function getTicketCount() {
      return $this->ticketCount;
    }
    private function setTicketCount($newCount) {
      $this->ticketCount = $newCount;
    }
    public function getTicket($ticketNumberToGet) {
      if ( (is_numeric($ticketNumberToGet)) && 
           ($ticketNumberToGet <= $this->getTicketCount())) {
           return $this->tickets[$ticketNumberToGet];
         } else {
           return NULL;
         }
    }
    public function addTicket(Ticket $ticket_in) {
      $this->setTicketCount($this->getTicketCount() + 1);
      $this->tickets[$this->getTicketCount()] = $ticket_in;
      return $this->getTicketCount();
    }
    public function removeTicket(Ticket $ticket_in) {
      $counter = 0;
      while (++$counter <= $this->getTicketCount()) {
        if ($ticket_in->getAuthorAndTitle() == 
          $this->tickets[$counter]->getAuthorAndTitle())
          {
            for ($x = $counter; $x < $this->getTicketCount(); $x++) {
              $this->tickets[$x] = $this->tickets[$x + 1];
          }
          $this->setTicketCount($this->getTicketCount() - 1);
        }
      }
      return $this->getTicketCount();
    }
}

class TicketListIterator {
    protected $ticketList;
    protected $currentTicket = 0;

    public function __construct(TicketList $ticketList_in) {
      $this->ticketList = $ticketList_in;
    }
    public function getCurrentTicket() {
      if (($this->currentTicket > 0) && 
          ($this->ticketList->getTicketCount() >= $this->currentTicket)) {
        return $this->ticketList->getTicket($this->currentTicket);
      }
    }
    public function getNextTicket() {
      if ($this->hasNextTicket()) {
        return $this->ticketList->getTicket(++$this->currentTicket);
      } else {
        return NULL;
      }
    }
    public function hasNextTicket() {
      if ($this->ticketList->getTicketCount() > $this->currentTicket) {
        return TRUE;
      } else {
        return FALSE;
      }
    }
}

class TicketListReverseIterator extends TicketListIterator {
    public function __construct(TicketList $ticketList_in) {
      $this->ticketList = $ticketList_in;
      $this->currentTicket = $this->ticketList->getTicketCount() + 1;
    }
    public function getNextTicket() {
      if ($this->hasNextTicket()) {
        return $this->ticketList->getTicket(--$this->currentTicket);
      } else {
        return NULL;
      }
    }
    public function hasNextTicket() {
      if (1 < $this->currentTicket) {
        return TRUE;
      } else {
        return FALSE;
      }
    }
}


print "\n BEGIN TESTING ITERATOR PATTERN \n";

$t = array(); 
for ($i = 0 ; $i < 10 ; $i++){
    $seat = 'Seat'.strval($i+1);
	$t[] = new Ticket($seat, 10);
} 	

$tickets = new TicketList();
  

for ($i = 0 ; $i < 10 ; $i++){
   $tickets->addTicket($t[$i]);
} 

print "\n Testing the Iterator \n";
 
 
 $ticketsIterator = new TicketListIterator($tickets);

  while ($ticketsIterator->hasNextTicket()) {
    $ticket = $ticketsIterator->getNextTicket();
	print "\n getting next ticket with iterator : ". $ticket->getTicketInfo() . "\n";
  }
 
  $ticket = $ticketsIterator->getCurrentTicket();
  print "\n getting current ticket with iterator : ". $ticket->getTicketInfo() . "\n";  

  print "\n\n Testing the Reverse Iterator \n";

  $ticketsReverseIterator = new TicketListReverseIterator($tickets);

  while ($ticketsReverseIterator->hasNextTicket()) {
    $ticket = $ticketsReverseIterator->getNextTicket();
	print "\n getting next ticket with reverse iterator : ". $ticket->getTicketInfo() . "\n";
  }
 
  $ticket = $ticketsReverseIterator->getCurrentTicket();
  print "\n getting current ticket with reverse iterator : ". $ticket->getTicketInfo() . "\n";  

print "\n END TESTING ITERATOR PATTERN \n";


?>