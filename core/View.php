<?php

class View
{

    public function __construct()
    {
        
    }

    public function render($name, $model)
    {
        require(VIEWS.$name.'.php');
    }

}
 

?>