<?php
namespace models;

abstract class EventTicketDecorator implements EventTicket
{
    /**
     * @var EventTicket
     */
    protected $event_ticket;

    public function __construct(EventTicket $event_ticket)
    {
        $this->event_ticket = $event_ticket;
    }
}
?>