<?php

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

class BusServiceView
	{

	    public function print($input){
	    	var_dump($input) ;
	    }
	    
	}
	
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

class BusService
{
    
    private $id;
    private $plate_no;

    public function __construct($id, $plate_no)
    {
    	$this->id 		= $id;
        $this->plate_no = $plate_no;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPlateNo()
    {
        return $this->plate_no;
    }

}

///// DEMO

 //  Model
$plates = array('111', '222', '333');
$pool = new BusServicePool($plates);

 // View
$bus_view = new BusServiceView();

 // Controller
$bus_service_controller = new BusServiceController();

$bus_service_controller->setModel($pool);
$bus_service_controller->setView($bus_view);

print "\n\n Call a Bus From Pool (111, 222, 333) \n\n";
$bus1 = $bus_service_controller->CallBusService();

print "\n\n Call a Bus From Pool (111, 222, 333) \n\n";
$bus2 = $bus_service_controller->CallBusService();

print "\n\n Call a Bus From Pool (111, 222, 333) \n\n";
$bus3 = $bus_service_controller->CallBusService();

print "\n\n Call a Bus From Pool (111, 222, 333) \n\n";
$bus4 = $bus_service_controller->CallBusService();

print "\n\n Release a Bus From Pool (111, 222, 333) \n\n";
$bus_service_controller->release(3);

print "\n\n Call a Bus From Pool (111, 222, 333) \n\n";
$bus4 = $bus_service_controller->CallBusService();

?>