<?php

namespace controllers;

use models\PreparationBuilderInterface;
use models\Preparation;
use models\assets\ChairPrototype;
use models\assets\ProjectorPrototype;
use models\assets\SoundSystemPrototype;
use models\assets\SnackPrototype;

class PreparationController implements PreparationBuilderInterface{
	


	private $preparation;

	private $view;

	public function setModel($model){
		$this->preparation = $model;
	}

	public function setView($view){
		$this->view = $view;
	}

	public function build($elements){
		foreach ($elements as $key => $value) {
			if ($key === 'projector') {
				$this->addprojector($value);
			}
			if ($key === 'sound_system') {
				$this->addSoundSystem($value);
			}
			if ($key === 'chair') {
				$this->addChairs($value);
			}
			if ($key === 'snack') {
				$this->addSnacks($value);
			}	
		}

		$this->view->print($this->preparation);

	}

	public function addprojector($amount)
    {
        $projector = new ProjectorPrototype();
        $this->preparation->prepare('projector_1', $projector);
        if ($amount > 1) {
            for ($i = 2; $i <= $amount; $i++) { 
                $cloned = clone $projector;
                $this->preparation->prepare('projector_'.$i, $cloned);
            } 
        }
    }

    public function addSoundSystem($amount)
    {
        $sound_system = new SoundSystemPrototype();
        $this->preparation->prepare('sound_system_1', $sound_system);
        if ($amount > 1) {
            for ($i = 2; $i <= $amount; $i++) { 
                $cloned = clone $sound_system;
                $this->preparation->prepare('sound_system_'.$i, $cloned);
            } 
        }
    }

    public function addChairs($amount)
    {
        $chair = new ChairPrototype();
        $this->preparation->prepare('chair_1', $chair);
        if ($amount > 1) {
            for ($i = 2; $i <= $amount; $i++) { 
                $cloned = clone $chair;
                $this->preparation->prepare('chair_'.$i, $cloned);
            } 
        }
    }

    public function addSnacks($amount)
    {
        $snack = new SnackPrototype();
        $this->preparation->prepare('snack_1', $snack);
        if ($amount > 1) {
            for ($i = 2; $i <= $amount; $i++) { 
                $cloned = clone $snack;
                $this->preparation->prepare('snack_'.$i, $cloned);
            } 
        }
    }




}

?>