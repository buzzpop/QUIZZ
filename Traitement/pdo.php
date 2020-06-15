<?php
try {
    $pdo= new PDO('mysql:host=mysql-rasquizz.alwaysdata.net;dbname=rasquizz_quizz', 'rasquizz', 'buzzpop1122',
   //$pdo= new PDO('mysql:host=localhost;dbname=rasquizz_quizz', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch (Exception $message){

    echo "Erreur : " . $message->getMessage();
}

