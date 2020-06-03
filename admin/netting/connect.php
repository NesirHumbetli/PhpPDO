<?php 


try {

    $db = new PDO("mysql:host=localhost;dbname=cvemlak;charset=utf8;",'root','');
    //echo "Connection Succes";
}catch (PDOException $e){

    echo $e->getMessage();
}


?>