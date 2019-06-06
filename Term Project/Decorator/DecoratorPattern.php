<?php

interface EventTicket
{
    public function calculatePrice();

    public function getDescription();
}

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

class Ticket implements EventTicket
{
    public function calculatePrice()
    {
        return 40;
    }

    public function getDescription()
    {
        return 'Ticket';
    }
}

class Transportation extends EventTicketDecorator
{
    private const PRICE = 5;

    public function calculatePrice()
    {
        return $this->event_ticket->calculatePrice() + self::PRICE;
    }

    public function getDescription()
    {
        return $this->event_ticket->getDescription() . ' with transportation';
    }
}

class OpenBuffet extends EventTicketDecorator
{
    private const PRICE = 10;

    public function calculatePrice()
    {
        return $this->event_ticket->calculatePrice() + self::PRICE;
    }

    public function getDescription()
    {
        return $this->event_ticket->getDescription() . ' with open buffet';
    }
}

//Implementation
print "\nBEGIN TESTING DECORATOR PATTERN ";

$only_ticket_bill = new Ticket();
print "\n\n Bill : " . $only_ticket_bill->calculatePrice() . " - Description : " . $only_ticket_bill->getDescription();

$tran_ticket_bill = new Ticket();
$tran_ticket_bill = new Transportation($tran_ticket_bill);
print "\n\n Bill : " . $tran_ticket_bill->calculatePrice() . " - Description : " . $tran_ticket_bill->getDescription();


$buffet_tran_ticket_bill = new Ticket();
$buffet_tran_ticket_bill = new Transportation($buffet_tran_ticket_bill);
$buffet_tran_ticket_bill = new OpenBuffet($buffet_tran_ticket_bill);
print "\n\n Bill : " . $buffet_tran_ticket_bill->calculatePrice() . " - Description : " . $buffet_tran_ticket_bill->getDescription();


?>
