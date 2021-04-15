<?php
error_reporting(0);

class mapDB{

    public $arrayUser;

    function __construct()
    {
        if(!file_exists('./dataJson/data-user.json')){
            $this->buildDataUserDefault();
        }else{
            $this->jsonToArray();
        }
    }

    function buildDataUserDefault(){

        $array = array(
            'user' => 'admin',
            'password' => 'admin',
            'type' => 'admin',
            'create_data' => date('Y-m-d')
        );

        file_put_contents('data-user.json', json_encode($array));

    }


    function jsonToArray(){

        $data = file_get_contents('./dataJson/data-user.json');
        $array = json_decode($data);
        
        $this->arrayUser = $array;
    }

}