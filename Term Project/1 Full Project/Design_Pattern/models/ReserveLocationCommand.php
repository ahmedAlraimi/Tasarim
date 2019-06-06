<?php
namespace models;

interface ReserveLocationCommand
{
    /**
     * this is the most important method in the Command pattern,
     */
    public function execute();
}

?>