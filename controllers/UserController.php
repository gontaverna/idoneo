<?php

class UserController extends Controller
{
  
    public function index()
    {
    
        $model =  $this->loadModel('UserModel');
    
        $users = $model->findAll();
        
        $this->render('/users/index', $users);
    
    }

   public function update()
   {
      if (isset($_GET['id']))
      {
          $id = $_GET['id'];
          $model = $this->loadModel('UserModel');
          $user = $model->findByPk($id);

          if($user != null)
          {
              $this->render('/users/update', $user);
          }

      }

      if(isset($_POST) && count($_POST) > 0)
      {
        $model =  $this->loadModel('UserModel');
        $model->setName($_POST['name']);
        $model->setLastName($_POST['last_name']);
        $model->setUsername($_POST['username']);
        $model->setPassword($_POST['password']);
        $model->setID($_POST['id']);

        if($model->update())
        {
            $model::JavaScriptSuccess('Se ha modificado el usuario con exito');
           $this->redirect("UserController");
        }
      }
      
   }


   public function delete()
   {
        if (isset($_GET['id']))
        {
            $id = $_GET['id'];
            $user = $this->loadModel('UserModel');
            $model = $user->findByPk($id);

            if($model != null)
            {
                if($model->delete())
                {
                    $model::JavaScriptSuccess('Se ha eliminado el usuario con exito');
                    $this->redirect("UserController");
                }
            }

        }
   }

   public function create()
   {

        if(isset($_POST) && count($_POST) > 0)
        {
            $model =  $this->loadModel('UserModel');
            $model->setName($_POST['name']);
            $model->setLastName($_POST['last_name']);
            $model->setUsername($_POST['username']);
            $model->setPassword($_POST['password']);

            if($model->create())
            {
                $model::JavaScriptSuccess('Se ha creado el usuario con exito');
                $this->redirect("UserController");
            }

        }

        $this->render('/users/create');
   }




}





?>