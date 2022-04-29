<?php

require_once( '../config/config.php');
require_once('../core/Database.php');
require_once('../core/Model.php');
require_once('../core/View.php');
require_once('../core/Controller.php');

$url = $_GET['url'];
$url = trim($url);
$url = explode('/', $url);


 if($url[0] != '' && $url != null)
 {
     $fileController = $url[0].'.php';
     $controller = $url[0];
 }
 else
 {
     $fileController = INDEX.'.php';
     $controller = INDEX;
 }


 if (file_exists(CONTROLLERS.$fileController))
 {
  
    require_once(CONTROLLERS.$fileController);
     $controller = new $controller();

    if($url[1] != '') 
        $controller->{$url[1]}();
    else
        $controller->index();

 }
 else
 {
     throw new Exception('No existe el recurso solicitado');
 }

 ?>