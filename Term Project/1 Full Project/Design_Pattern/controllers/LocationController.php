<?php

namespace controllers;

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

?>