<?php
include './load.php';

$getAction=$_GET['action'];

switch($getAction){

    case "authentication":

        $user = $_GET['user'];
        $password = $_GET['pass'];

        $auth= new auth();
        $autenticate = $auth->authenticate($user, $password);
        if(!$autenticate){
            echo json_encode(array('result'=> false, 'error' => 'Usuario o contraseña invalido.'));
        }else{
            echo json_encode(array('result'=> true, 'uid'=> $autenticate ));
            
        }
        
    break; 

    case "authenticationpass":

        $uid = $_GET['uid'];
        $password = $_GET['pass'];

        $auth= new auth();
        $change_pass = $auth->changePass($password, $uid);

        if(!$change_pass){
            echo json_encode(array('result'=> false, 'error' => 'No se pudo cambiar la contrase;a.'));
        }else{
            echo json_encode(array('result'=> true, 'uid'=> $uid ));
            
        }
        
    break; 

    case "logout":

        session_start();
        // $_SESSION['uid']=$result->uid; // Storing user session value
        $_SESSION['uid'] = "";
        $_SESSION['email'] = "";
        
    break; 

    case "request_user":

       include '../form/request_form_user.php';
        
    break; 

    case "formUserSubmit":

        $array['email'] = $_GET['email'];
        $array['name'] = $_GET['name'];
        $array['last_name'] = $_GET['apellido'];
        $array['type'] = $_GET['tipo'];
        
        $auth= new auth();
        $register = $auth->dataUserInsert($array);
        if(!$register){
            echo "No se ha podido guardar la informacion, revise sus datos o contacte al administrador.";
        }else{
            echo "Solicitud realizada correctamente.";
            
        }

         
    break; 

    case "getTableUsersPending":

        $db = new ConnectionMySQL();
        $db->CreateConnection();

        $stmt = $db->ExecuteQuery("SELECT * FROM SEBgamify.usuario WHERE estado='P' "); 
        while ($row = $stmt->fetch_object()){
            $user_pend[] = $row;
        }

        include '../tables/table_users_pending.php';
    break;

    case "approvaluid":

        $db = new ConnectionMySQL();
        $db->CreateConnection();
        $uid = $_GET['uid'];

       if($stmt = $db->ExecuteQuery("UPDATE SEBgamify.usuario SET estado='C' WHERE uid='$uid'")){

        $stmt = $db->ExecuteQuery("SELECT * FROM SEBgamify.usuario WHERE estado='P' "); 
        while ($row = $stmt->fetch_object()){
            $user_pend[] = $row;
        }

        include '../tables/table_users_pending.php';

       }

    break;
}

