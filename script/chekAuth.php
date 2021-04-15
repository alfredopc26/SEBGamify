<?php

session_start();

if($_SESSION['uid'] == "" ){
    header("Location: ./login.php");
}else{

    include './script/load.php';

    $auth= new auth();
    $user = $auth->dataUser($_SESSION['uid']);

    if($user['estado'] == 'C'){
        header("Location: ./recovery_pass.php?uid=".$user['uid']);
    }elseif($user['estado'] != 'A'){
        header("Location: ./login.php?error=1");
    }

    $data = file_get_contents('./script/dataJson/mod-user.json');
    $array = json_decode($data);

    foreach($array as $k => $v){

        if($user['tipo'] == $k){
            $mod['dashboard'] = $v->dashboard;
            $mod['gestion_estudiante'] = $v->gestion_estudiante;
            $mod['gestion_ecoins'] = $v->gestion_ecoins;
            $mod['gestion_asignatura'] = $v->gestion_asignatura;
            $mod['configuracion'] = $v->configuracion;
            $mod['table_main'] = $v->table_main;
        }
    }

    // var_dump($user);
}



?>