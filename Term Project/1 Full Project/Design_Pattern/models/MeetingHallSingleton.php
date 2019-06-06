<?php
namespace models;

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


?>