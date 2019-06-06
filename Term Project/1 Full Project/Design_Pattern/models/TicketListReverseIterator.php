<?php
namespace models;

use models\TicketList;

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

?>