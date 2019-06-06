<?php

namespace controllers;

use models\Transportation;
use models\OpenBuffet;

class TicketController {
    
    const STATE_OPEN = 'available';
    const STATE_CLOSE = 'sold';

    private $tickets;

    private $view;

    private $sold_ticket;

    public function setModel($model){
        $this->tickets = $model;
    }

    public function setView($view){
        $this->view = $view;
    }

    public function buyTicket(){

        $this->tickets->getNextTicket();

        $ticket = $this->tickets->getCurrentTicket();

        if ($ticket->getState() == self::STATE_OPEN) {
            $this->sold_ticket = $ticket;

            $this->view->print($ticket);
        }

    }


    public function getSoldTicket(){

        return $this->sold_ticket;
    }

    public function SoldState($ticket){

        $ticket->close();
        $memento = $ticket->saveToMemento();

        $this->view->print( $ticket );
    }

    public function extra($extra){

        $ticket = $extra['ticket'];

        $price = ' Ticket  = ' . $ticket->getPrice(). ' TL ,';


        foreach ($extra['extra'] as $key) {

            
            if($key == 'Transportation'){
                $ticket = new Transportation($ticket);
                $price .= $key.'  = ' . $ticket->getPrice(). ' TL ,';
            }

            if ($key == 'OpenBuffet') {
                $ticket = new OpenBuffet($ticket);
                $price .= $key.'  = ' . $ticket->getPrice(). ' TL ,';
            }
        }

        $price .= ' TOTAL = ' . $ticket->calculatePrice(). ' TL ';

        $this->view->printline($price);
    }



    

}

?>