<?php

namespace controllers;

class EventController {
	


	private $factory;

	private $event;

	private $view;

	public function setModel($model){
		$this->factory = $model;
	}

	public function setView($view){
		$this->view = $view;
	}


	public function makeEvent($graduated, $info, $observer){

		$this->event = $this->factory::getFactory($graduated);
		$event = $this->event->makeEvent($info['type'], $info['manager'], $info['location'], $info['date_time'], $info['description']);	

		foreach ($observer as $member) {
				$event->attach($member);
				$event->trigger();
			}	

		$this->view->printEvent($event);
	}

}

?>