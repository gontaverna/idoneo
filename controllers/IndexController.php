<?php

class IndexController extends Controller
{
  
    public function index()
    {
        $model =  $this->loadModel('UserModel');
        $model->setUsername('Gonzalo');

        $this->render('/main/index', $model);
    }

    public function login()
    {
        
        $model = $this->loadModel('UserModel');

        if (isset($_POST))
        {
            $model->setUsername($_POST['username']);
            $model->setPassword($_POST['password']);
            
            try
            {
               if($model->validateUser())
               {
                    $this->redirect("UserController");
               }

            }
            catch(Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }


        }
    }

}





?>