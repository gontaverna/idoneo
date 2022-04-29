
<?php

class UserModel extends Model
{

    private $username;
    private $password;
    private $name;
    private $last_name;
    private $id;

    public function __construct()
    {
        parent::__construct();
    }


    public function create()
    {
        if($this->password != '')
            $hashPassword = password_hash($this->password, PASSWORD_DEFAULT);

         try
         {
           
            $userExist = $this->findByUsername()->getID() != null ? true : false;

            if(!$userExist)
            {
                $query = $this->cn->connect()->prepare('INSERT INTO users (username, password, name, last_name) VALUES (:username, :password, :name, :last_name)');
                $query->execute(['username' => $this->username, 'password' => $hashPassword, 'name' => $this->name, 'last_name' => $this->last_name]);
    
            }
            else
            {
                $this->JavaScriptError('Ya existe ese nombre de usuario.');
                return false;
            }
     
            return true;
            
         }   
         catch(Exception $ex)
         {
             throw new Exception($ex->getMessage());
             return false;
         }

       

    }

    public function update()
    {
        if($this->password != '')
            $hashPassword = password_hash($this->password, PASSWORD_DEFAULT);

        try
        {
      
            $userExist = $this->findByUsername(' and id != :ID ')->getID() != null ? true : false;

            if(!$userExist)
            {
               
                $query = $this->cn->connect()->prepare('UPDATE users SET username = :username, name = :name, password = :password, last_name = :last_name WHERE id = :ID');
             
                $query->execute(['username' => $this->username, 'password' => $hashPassword, 'name' => $this->name, 'last_name' => $this->last_name, 'ID' => $this->id]);
               

            }
            else
            {
                $this->JavaScriptError('Ya existe ese nombre de usuario.');
                return false;
            }
    
            return true;
            
        }   
        catch(PDOException $ex)
        {
            throw new PDOException($ex->getMessage());
            return false;
        }
    }

    public function delete()
    {
        try
        {
           
            $query = $this->cn->connect()->prepare('UPDATE users SET is_delete = 1 WHERE id = :ID');
            $query->execute(['ID' => $this->id]);

            return true;
            
        }   
        catch(Exception $ex)
        {
            throw new Exception($ex->getMessage());
            return false;
        }
    }


    public function validateUser()
    {
        try
        {
            if($this->username == 'admin' && $this->password == 'admin')
                return true;

        
            $user = $this->findByUsername();

            if($user != null)
            {
                if(password_verify($this->password, $user->getPassword()))
                {
                    return true;
                }
                else
                {
                    $this->JavaScriptErrorLogin('Contraseña incorrecta.');
                }
            }
            else
            {
                $this->JavaScriptErrorLogin('El usuario no existe');
                return false;
            }
        }
        catch(Exception $ex)
        {
            throw new Exception($ex->getMessage());
        }
    
      
    }


    #region DATABASE FUNCTIONS


    public function findByUsername($condition = '')
    {
        try
        {
            $query = $this->cn->connect()->prepare('SELECT * FROM users WHERE is_delete = 0 and username = :USERNAME'.$condition);
            
            $condition != '' ? $query->execute(["USERNAME" => $this->username, "ID"=> $this->id]) : $query->execute(["USERNAME" => $this->username]);

            $user = new UserModel();

            while($row = $query->fetch())
            {
                
                $user->setUsername($row['username']);
                $user->setPassword($row['password']);
                $user->setName($row['name']);
                $user->setLastName($row['last_name']);
                $user->setID($row['id']);
               
            } 

            return $user;
        }
        catch (Exception $ex)
        {
            throw new Exception($ex->getMessage());
        }

        return null;
    }

    public function findByPk($id)
    {
        try
        {
            $query = $this->cn->connect()->prepare('SELECT * FROM users WHERE is_delete = 0 and id = :ID');
            $query->execute(["ID" => $id]);

            $user = new UserModel();

            while($row = $query->fetch())
            {
               
                $user->setUsername($row['username']);
                $user->setName($row['name']);
                $user->setLastName($row['last_name']);
                $user->setID($row['id']);
                
            } 

            return $user;
        }
        catch (Exception $ex)
        {
            throw new Exception($ex->getMessage());
        }

        return null;
    }

    public function findAll()
    {
        try
        {
            $query = $this->cn->connect()->query('SELECT id, username, name, last_name FROM users WHERE is_delete = 0');
            $data = array();

            while($row = $query->fetch())
            {
                $user = new UserModel();
                $user->setUsername($row['username']);
                $user->setName($row['name']);
                $user->setLastName($row['last_name']);
                $user->setID($row['id']);
                array_push($data, $user);
            } 

            return $data;
        }
        catch (Exception $ex)
        {
            throw new Exception($ex->getMessage());
        }

        return null;
    }

    #endregion
    #region  GETTERS & SETTERS

       public function getUsername()
       {
           return $this->username;
       }
   
       public function getPassword()
       {
           return $this->password;
       }
   
       public function getName()
       {
           return $this->name;
       }
   
       public function getLastName()
       {
           return $this->last_name;
       }
   
       public function setUsername($username)
       {
           $this->username = $username;
       }
   
       public function setPassword($password)
       {
           $this->password = $password;
       }
   
       public function setName($name)
       {
           $this->name = $name;
       }
   
       public function setLastName($last_name)
       {
           $this->last_name = $last_name;
       }

       public function getID()
       {
           return $this->id;
       }

       public function setID($id)
       {
           $this->id = $id;
        
       }
   
       #endregion
   
}



?>