<?php

namespace models;

class Preparation
{

    private $data = [];

    /**
     * @param string $key
     * @param object $value
     */
    public function prepare($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function getArray(){
        return $this->data;
    }
}

?>