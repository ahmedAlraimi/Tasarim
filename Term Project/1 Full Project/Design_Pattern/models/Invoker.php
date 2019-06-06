<?php
namespace models;

class Invoker
{

    private $command;

    public function setCommand($cmd)
    {
        $this->command = $cmd;
    }

    /**
     * executes the command; the invoker is the same whatever is the command
     */
    public function run()
    {
        $this->command->execute();
    }
}

?>