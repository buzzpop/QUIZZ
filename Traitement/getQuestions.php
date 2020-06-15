<?php

require_once "pdo.php";
global $pdo;
$limit= $_POST['limit'];
$offset= $_POST['offset'];

$response="SELECT questions.idQ, questions.question, reponses.reponse, reponses.type, reponses.repvalide from questions join reponses on questions.idQ=reponses.idQ
 order by questions.idQ LIMIT {$offset} , {$limit}";

$response= $pdo->query($response);
if ($response->rowCount()> 0){
    $data= $response->fetchAll();

    echo json_encode($data);

}
