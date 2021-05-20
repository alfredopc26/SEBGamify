<?php
session_start();
// echo $_SESSION['uid'];

if($_SESSION['uid'] == "" ){
    header("Location: ./login.php");
}else{

    include './script/load.php';

    $auth= new auth();
    $user = $auth->dataUser($_SESSION['uid']);

    $userRol = $auth->dataUserRolStudent($user->uid);

    if($user->estado != 'A'){
        // var_dump($user);
        header("Location: ./login.php?error=1");
    }

    $data = file_get_contents('./script/dataJson/mod-user.json');
    $array = json_decode($data);

    foreach($array as $k => $v){

        if($user->kind == $k){
            $mod['dashboard'] = $v->dashboard;
            $mod['gestion_estudiante'] = $v->gestion_estudiante;
            $mod['gestion_ecoins'] = $v->gestion_ecoins;
            $mod['gestion_asignatura'] = $v->gestion_asignatura;
            $mod['gestion_actividades'] = $v->gestion_actividades;
            $mod['configuracion'] = $v->configuracion;
            $mod['table_main'] = $v->table_main;
            $mod['active_data_student'] = $v->active_data_student;
        }
    }

    // var_dump($user);
}



?>