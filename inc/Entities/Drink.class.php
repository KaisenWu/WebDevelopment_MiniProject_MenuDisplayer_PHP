<?php

class Drink {
    //Declare the propertirs as public to give access out of this class.
    public $item;
    public $description;

    public function __construct($nItem, $nDescription) {
        $this->item=$nItem;
        $this->description=$nDescription;
    }
}