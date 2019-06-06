<?php

class Location {

	private $type;
	private $action;
	private $location;

    private $available = FALSE;

	public function __construct(){
	}

	public function getLocation($type, $action){

		if ($type == 'hall') {
			if ($action == 'reserve') {
				$this->location = MeetingHallSingleton::reserve();
				if ($this->location == NULL) {
				  $response = array(
				  	'status'	=> false,
				  	'location'	=> null
				  );
				  return $response;
				} else {
				  $response = array(
				  	'status'	=> true,
				  	'location'	=> $this->location
				  );
				  return $response;
				}
			} else {
				$this->location->checkOut();
				$response = array(
				  	'status'	=> true,
				  );
				return $response;
			}
		} 
		

		
	}

	
}



class LocationView
	{

	    public function printLocation($input){
	    	var_dump($input) ;
	    }
	    
	}

class LocationController {
	


	private $location;
	private $view;

	public function setModel($model){
		$this->location = $model;
	}

	public function setView($view){
		$this->view = $view;
	}


	public function getLocation($location_type, $order){
		$location = $this->location->getLocation($location_type, $order);

		$this->view->printLocation($location);
	}

	public function useLocation(){
		return $this->location;	
	}

}

class MeetingHallSingleton  {

    private $title  = 'Main Meeting Hall';
    private $limit  = 30;
    private $type = 'indoor';

    private static $hall = NULL;
    private static $is_occupied = FALSE;

    static function reserve() {
      if (FALSE == self::$is_occupied) {
        if (NULL == self::$hall) {
           self::$hall = new MeetingHallSingleton();
        }
        self::$is_occupied = TRUE;
        return self::$hall;
      } else {
        return null;
      }
    }

    function checkOut() {
        self::$is_occupied = FALSE;
    }

    function getTitle() {return $this->title;}

    /**
     * is not allowed to call from outside to prevent from creating multiple instances,
     * to use the singleton, you have to obtain the instance from Singleton::getInstance() instead
     */
    private function __construct()
    {
    }

    /**
     * prevent the instance from being cloned (which would create a second instance of it)
     */
    private function __clone()
    {
    }

    /**
     * prevent from being unserialized (which would create a second instance of it)
     */
    private function __wakeup()
    {
    }

} 




////////DEMO
// Location Model
$location = new Location();

// Location View
$location_view = new LocationView();

// Location Controller
$location_controller = new LocationController();
$location_controller->setModel($location);
$location_controller->setView($location_view);

print "\n\n Meeting Hall Reservation (1) - while free \n";
$location_controller->getLocation('hall', 'reserve') ;

$location2 = new Location();
$location_controller->setModel($location2);

print "\n\n Meeting Hall Reservation (2) - while occupied \n";
$location_controller->getLocation('hall', 'reserve') ;

$location_controller->setModel($location);

print "\n\n Meeting Hall Check Out (1) - \n";
$location_controller->getLocation('hall', 'check_out') ;

$location_controller->setModel($location2);

print "\n\n Meeting Hall Reservation (2) - after check out \n";
$location_controller->getLocation('hall', 'reserve');


?>