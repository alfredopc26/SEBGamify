<?php
error_reporting(0);

class auth{

    public $auth = false;
    public $user;


    public function authenticate($user, $pass){

        try{
            $db = new ConnectionMySQL();
            $db->CreateConnection();

            $hash_password= hash('sha256', $pass); //Password encryption 
            $stmt =  $db->ExecuteQuery("SELECT * FROM SEBgamify.auth WHERE user='$user' AND password='$hash_password'"); 
           
            // var_dump($hash_password);
            if($stmt->num_rows > 0)
            {
                $value = $stmt->fetch_assoc();
                session_start();
                // $_SESSION['uid']=$result->uid; // Storing user session value
                $_SESSION['uid'] = $value['uid'];
                $_SESSION['email'] = $value['user'];
                $db->CloseConnection();

                return $value['uid'];
                
            }
            else
            {
                return false;
            } 
        }
        catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
        }

    }

    public function dataUser($uid){

        try{
            $db = new ConnectionMySQL();
            $db->CreateConnection();

            $stmt =  $db->ExecuteQuery("SELECT * FROM SEBgamify.usuario WHERE uid='$uid' "); 
           
            // var_dump($hash_password);
            if($stmt->num_rows > 0)
            {
                $value = $stmt->fetch_assoc();
                $db->CloseConnection();
                return $value;
            }
            else
            {
                return false;
            } 
        }
        catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function dataUserInsert($array){

        try{
            $db = new ConnectionMySQL();
            $db->CreateConnection();
            $hash_password= hash('sha256', DEFAULT_PASS); //Password encryption 
            $stm = $db->ExecuteQuery("INSERT INTO SEBgamify.auth (user, password) values ('{$array['email']}', '$hash_password' )"); 
           
            // var_dump($stm);

            if($stm)
            {

               return $db->ExecuteQuery("INSERT INTO SEBgamify.usuario (uid, email, nombre, apellido, tipo, fecha_creacion, estado ) values ('". $db->lastid() ."', '{$array['email']}', '{$array['name']}', '{$array['last_name']}', '{$array['type']}', '". date('Y-m-d')."', 'P' )"); 

            }
            else
            {
                return false;
            } 
        }
        catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function changePass($pass, $uid){

        try{
            $db = new ConnectionMySQL();
            $db->CreateConnection();
            $hash_password= hash('sha256', $pass); //Password encryption 
            $stm = $db->ExecuteQuery("UPDATE SEBgamify.auth SET password='$hash_password' WHERE uid='$uid'"); 
           
            // var_dump($stm);

            if($stm)
            {
                $user = $this->dataUser($uid);
                $stmt = $db->ExecuteQuery("UPDATE SEBgamify.usuario SET estado='A' WHERE uid='$uid'");
                if($stmt){
                    session_start();
                    // $_SESSION['uid']=$result->uid; // Storing user session value
                    $_SESSION['uid'] = $uid;
                    $_SESSION['email'] = $user['user'];
                   return true;
    
                }else{
                    return false;
                }

            }
            else
            {
                return false;
            } 
        }
        catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
        }

    }

}
?>