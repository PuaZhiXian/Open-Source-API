<?php

class User
{
    public $name;
    public $postion;

    /**
     * @param $name
     * @param $postion
     */
    public function __construct($name, $postion)
    {
        $this->name = $name;
        $this->postion = $postion;
    }
}

?>
