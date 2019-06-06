<?php
namespace models;

use models\MeetingHallSingleton;
use models\Park;
use models\ReserveLocation;
use models\CheckOutLocation;
use models\Invoker;

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
		elseif ($type == 'park') {
			$park = new Park();

			$reserveCommand = new ReserveLocation($park);
			$checkOutCommand = new CheckOutLocation($park);


			$invoker = new Invoker();
			if ($action == 'reserve') {

				$invoker->setCommand($reserveCommand);
				$invoker->run();

				$response = array(
				  	'status'	=> true,
				  	'location'	=> $park
				  );
				  return $response;

			} else {

				$invoker->setCommand($checkOutCommand);
				$invoker->run();
				$response = array(
				  	'status'	=> true,
				  );
				return $response;

			}

		}
	}

	
}


?>

