<?php

class Pizza {
    //Declare the propertirs as public to give access out of this class.
    public string $item;
    public string $description;

    public function __construct($nItem, $nDescription) {
        $this->item = $nItem;
        $this->description = $nDescription;
    }
}