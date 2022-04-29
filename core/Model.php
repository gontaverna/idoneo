<?php

class Model
{

    public function __construct()
    {
        $this->cn = new Database();  
    }

    public function JavaScriptError($message)
    {
        echo '<script type="text/javascript">alert("'.$message.'");</script>';
       
    }
    public function JavaScriptErrorLogin($message)
    {
        echo '<script type="text/javascript">
        if(confirm("'.$message.'"))
        {
            window.location = "'.URL.'";
        }
        else
        {
            window.location = "'.URL.'"; 
        }
        
        </script>';
       
    }

    public function JavaScriptSuccess($message)
    {
        echo '<script type="text/javascript">alert("'.$message.'")</script>';
    }

}
 

?>