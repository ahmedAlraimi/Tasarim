<?php
namespace models;

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

?>