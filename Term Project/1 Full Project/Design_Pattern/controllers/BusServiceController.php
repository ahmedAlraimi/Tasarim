<?php

namespace controllers;

class BusServiceController {
    


    private $pool;

    private $view;

    public function setModel($model){
        $this->pool = $model;
    }

    public function setView($view){
        $this->view = $view;
    }


    public function CallBusService(){

        $this->view->print($this->pool->getBusService() );
    }

    public function Release($bus){

        $this->view->print($this->pool->release($bus) );
    }

    

}

?>