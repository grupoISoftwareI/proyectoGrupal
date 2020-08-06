<?php
$url="https://bdsoftware-778e9.firebaseio.com/usuario.json";
$method=$_SERVER['REQUEST_METHOD'];
if($method='POST'){
    $requestBody=file_get_contents('php://input');
    $params=json_decode($requestBody);
    $params=(array)$params;

    if($params['UserName']&&$params['UserEmail']&&$params['UserPhone']){
        $UserName=$params['UserName'];
        $UserEmail=$params['UserEmail'];
        $UserPhone=$params['UserPhone'];

        $data='{"UserName":"'.$UserName.'","UserEmail":"'.$UserEmail.',"UserPhone":"'.$UserPhone.'"}';

        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type: text/plain'));

        $response=curl_exec($ch);

        if(curl_errno($ch)){
            echo "No se han ingresado sus datos, intente nuevamente.";
        }else{
            echo "Sus datos se han ingresado correctamente, nos pondremos en contacto contigo.";
        }
    }
}
?>