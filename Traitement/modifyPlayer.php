<?php
require_once "pdo.php";
global $pdo;
if (isset($_POST['firstname']) and isset($_POST['lastname'])){
    $num= $_POST['idu'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    if (!empty($firstname)and !empty($lastname)){
        $req=$pdo->query("UPDATE utilisateur set Prenom='$firstname' , Nom='$lastname'
where Num='$num'");
    }
    if ($req->rowCount()>0){
        echo 'ok';
    }
}

