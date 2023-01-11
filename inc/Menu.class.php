<?php
 
 class Menu {

    //Declare an array to prepare to store the data.
    public $menuItems = array();

    //Build an array for each class type for all the classes.
    public $pizzas = array();
    public $drinks = array();

    //This function returns a flat array of objects and puts them to $this->menuItems
    function parseMenuData($fileContents)   {

        //Split the array by using new lines.
        $lines = explode("\n", $fileContents);
        //Walk the lines
            //Pull the columns
            for($numberOfLines=1;$numberOfLines<count($lines);$numberOfLines++) {
                $columns = explode("|",$lines[$numberOfLines]);
                //If the class is Pizza
                if($columns[0] == "pizza") {                    
                     //Parse the different kinds of pizza
                    switch ($columns[1])    {
                
                        case "Basics":
                            //Make a new pizza
                            $i = new Basics($columns[2],$columns[3]);
                        break;
                        case "Veggie":
                            $i = new Veggie($columns[2],$columns[3]);
                        break;
                        case "Chicken":
                            $i = new Chicken($columns[2],$columns[3]);
                        break;        
                        case "Meat":
                            $i = new Meat($columns[2],$columns[3]);
                        break;
                        }                        
                }
                //Or if its a Drink
                if ($columns[0] == "drink") {            
                //Parse the different kinds of drinks
                switch ($columns[1])    {
                    case "Juice":
                        $i = new Juice($columns[2],$columns[3]);
                    break;
                    case "Pop":
                        $i = new Pop($columns[2],$columns[3]);
                    break;   
                }
                }
                //Add the item
                $this->menuItems[] = $i;               
            }
    }

    /* Build the menu into specific categories based on the subclass and the class name
    * Pizzas should go in the pizzas array
    * Drinks should go in the drinks array
    */

    function buildMenu() {

        //Walk through the entire menu, 
        //put each item in its respective array by class and type. 
        //HINT use is_subclass_of
       foreach($this->menuItems as $item) {
           //If its a drink (check is_subclass_of)
           if (is_subclass_of($item, "Drink"))   {
                //Check what type. HINT use gettype
                //If its Pop
                //Use getClass
                switch(get_class($item)) {
                    case "Pop":
                    //Add to the drinks array with the key "pop"
                    $this->drinks["pop"][] = $item;
                    break;
                     //Add to the drinks array with the key "juice"
                    case "Juice":
                    $this->drinks["juice"][] = $item;
                    break;    
                    default:
                    Page::notify(array("Problem we dont know where to put this drink!"));
                    break;
                }
            }
            if(is_subclass_of($item,"Pizza"))   {
                switch(get_class($item)) {
                    //Add to the Pizza array with the key "basics"
                    case "Basics":
                        $this->pizzas["basics"][]=$item;
                    break;
                    //Add to the Pizza array with the key "chicken"
                    case "Chicken":
                        $this->pizzas["chicken"][]=$item;
                    break;
                    //Add to the Pizza array with the key "meat"
                    case "Meat":
                        $this->pizzas["meat"][]=$item;
                    break;
                    case "Veggie":
                    //Add to the Pizza array with the key "veggie"
                        $this->pizzas["veggie"][]=$item;
                    break;
                    default:
                        Page::notify(array("Problem we dont know where to put this Pizza". get_class($item)));
                    break;        
                }
            }            
       }
     
        //Sort the arrays by key.
        ksort($this->pizzas);
        ksort($this->drinks);

    }
}
?>