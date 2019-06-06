<?php 
namespace models;

class OpenBuffet extends EventTicketDecorator
{
    private $price = 10;

    public function calculatePrice()
    {
        return $this->event_ticket->calculatePrice() + + $this->price;
    }

    function getPrice() {return $this->price;}

}

?>