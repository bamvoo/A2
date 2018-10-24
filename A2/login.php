<?php

//se están estableciendo las galletas 1 y 2 para guardar usuario y contraseña
if(isset($_COOKIE["type"]) && $_COOKIE["type2"]){
    
    header("location:index.php");
}

$json = file_get_contents('BBDDJSON.json'); //lo guardas en una variable
$data = json_decode($json);                 //lo metes como un array
$message = '';
$user = $_POST['user'];
$pass = $_POST['user_password'];
$chk_bx = $_POST['chkbx'];
$now = date("Y-m-d H:i:s");

if(isset($_POST["login"])){
    //si está vacio el usuario o la contraseña te devuelve un mensaje y si no 
    if(empty($_POST["user"]) || empty($_POST["user_password"])){
        
        $message = "<h3>Introduce el usuario y contraseña.</h3>";            
    }   
        else {
            //
            foreach($data as $obj){
            
                $id_true = $obj->user;
                $pass_true = $obj->pass;

                if ($user == $id_true){
                
                    if($pass == $pass_true){
                        
                        setcookie("type", $user, time()+100000);
                        setcookie("type2", $pass, time()+100000);
                        setcookie("type3", $now, time()+100000);
                        
                        header('Location: index.php');
                        echo $pass_true;
                    }
                        else {
                            $message = '<div class="alert alert-danger">Wrong password</div>';

                        }                    
                }
                    else {
                        $message = '<div class="alert alert-danger">Wrong id</div>';
                    }
            }
        }
}
    else {
        $message = "";
    }
    //si esta puesto el check box inicia sesión
    if (isset($chk_bx)){
         session_start();
    }
?>

<!DOCTYPE html>
<html>
 <head>
  <title>Bienvenido</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div>

   <div>
    <div>Login</div>
    <div>
     <span><?php echo $message; ?></span>
     <form method="post">
      <div>
       <label>User </label>
       <input type="text" name="user" id="user_email"/>
      </div>
      <div>
       <label>Password</label>
       <input type="password" name="user_password" id="user_password"/>
      </div>
      <div>
          <label> Recuerdame  </label> <br>
          <input type="checkbox" name="remember" id="chkbx" value="sesionrestore" />
      </div>
      <div>
       <input type="submit" name="login" id="login" value="Login" />
      </div>
     </form>
    </div>
   </div>
   <br />
  </div>
 </body>
</html>
