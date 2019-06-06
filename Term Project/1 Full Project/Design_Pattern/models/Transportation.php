<?php 
namespace models;

class Transportation extends EventTicketDecorator
{
    private $price = 5;

    public function calculatePrice()
    {
        return $this->event_ticket->calculatePrice() + $this->price;
    }

    function getPrice() {return $this->price;}

}

?>