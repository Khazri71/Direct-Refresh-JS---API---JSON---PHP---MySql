<?php
//Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: *");


 //Connect To The DataBase
 $username="root";
 $password="";
 $database = new PDO("mysql:host=localhost;dbname=gestionarticle;charset=utf8",$username,$password);


//Add Data
 if(isset($_POST["titleInp"]) && isset($_POST["descriptionInp"])){
   
    //Add Data To the DataBase
    $toData = $database->prepare("INSERT INTO article(title,descrip) VALUES (:title , :descrip)");
    $toData->bindParam("title" , $_POST["titleInp"]);
    $toData->bindParam("descrip", $_POST["descriptionInp"]);
    if($toData->execute()){
       print_r(json_encode(["message" => "Data Added successfully"]));  
    }else{
        print_r(json_encode(["message" => "Fail To Add Data"]));
    }
}else{
    print_r(json_encode(["message" => "You Must Add Data!"]));
}


 

