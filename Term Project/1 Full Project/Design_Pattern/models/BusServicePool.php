<?php

namespace models;

use models\BusService;

class BusServicePool
{
    private $out_of_service = [];
    private $available = [];
    private $plate_no = [];

    public function __construct($plate_no){
    	$this->plate_no = $plate_no;
    }

    public function getfree(){
    	return $this->available;
    }

    public function getfull(){
    	return $this->out_of_service;
    }

    public function getBusService()
    {

    	if(count($this->out_of_service) == count($this->plate_no)){
    		$response = array(
    			'response'  	=> false,
    			'id'  			=> null,
    			'plate_id' 		=> null,
    			'message' 		=> 'No availabe bus service !! ,please check later ..'
    		);
    		return $response;
    	}

        if (count($this->available) == 0) {
        	print "(".count($this->available).")";

            $id = count($this->out_of_service) + count($this->available) + 1;
            $plate = $id - 1;
            $bus_service = new BusService($id, $this->plate_no[$plate]);
        } else {
            $bus_service = array_pop($this->available);
        }
        $this->out_of_service[$bus_service->getId()] = $bus_service;
        $response = array(
    			'response'	  	=> true,
    			'id'  			=> $bus_service->getId(),
    			'plate_id' 		=> $bus_service->getPlateNo(),
    			'message' 		=> 'Bus service available'
    		);
        return $response;
    }

    public function release($id)
    {

        if (isset($this->out_of_service[$id])) {
            $this->available[$id] = $this->out_of_service[$id];
            unset($this->out_of_service[$id]);
        }

        $response = array(
            'response'      => false,
            'id'            => $id,
            'message'       => 'Released ..'
        );
        return $response;
    }
}

?>