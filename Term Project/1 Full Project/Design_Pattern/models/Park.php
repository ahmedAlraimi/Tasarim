<?php
namespace models;

class Park {

    private $title;
    private $limit;
    private $type;

    public function __construct()
    {
        
    }

    function reserve() {
        $this->title = 'ABC Park';
        $this->limit = 40;
        $this->type = 'outdoor';
    }

    function checkOut() {
        $this->title = null;
        $this->limit = null;
        $this->type = null;
       
    }

    function getPark(){
        $park = array(
            'title' => $this->title,
            'limit' => $this->limit,
            'type'  => $this->type
        );

        return $park;
    }

    function getTitle() {return $this->title;}


} 


?>