<?php
require_once "pdo.php";
global $pdo;
$numplayer=$_POST['numplayer'];
$req=$pdo->query("DELETE from utilisateur where Num='$numplayer'");
if ($req->rowCount()>0){
    echo 'ok';
}
