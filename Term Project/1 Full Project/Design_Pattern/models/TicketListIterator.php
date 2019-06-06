<?php
namespace models;

use models\TicketList;

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

?>