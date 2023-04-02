<?php

class User
{
    public $name;
    public $position;
    public $image;

    /**
     * @param $name
     * @param $postion
     * @param $image
     */
    public function __construct($name, $position, $image)
    {
        $this->name = $name;
        $this->position = $position;
        $this->image = $image;
    }

}

?>
