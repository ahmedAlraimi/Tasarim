<?php

namespace models;

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
?>