<?php
//Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//Connect To The DataBase
$username="root";
$password="";
$database = new PDO("mysql:host=localhost;dbname=gestionarticle;charset=utf8",$username,$password);
//Get Data
//Get Data From the DataBase
$items = $database->prepare("SELECT * FROM article");
$items->execute();
$items = $items->fetchAll(PDO::FETCH_ASSOC);

//Data Json
print_r(json_encode($items));


