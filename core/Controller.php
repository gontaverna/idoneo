<?php

class Controller
{

    public function __construct()
    {
        $this->view = new View();
        
    }

    public function render($name, $model = null)
    {
        $this->view->render($name, $model);
    }  

    public function loadModel($model)
    {
        $url = MODELS.$model.'.php';

        if(file_exists($url))
        {
           
            require $url;
            $this->model = new $model();

            return $this->model;
        }
        
        return null;

    }

    public function redirect($url, $data = null)
    {
        header('Location: ' . URL.$url, true);

        exit();
    }



}
 

?>