<?php
require_once "pdo.php";
global $pdo ;
if (isset($_POST['question']) and isset($_POST['point'])and isset($_POST['type'])and isset($_POST['nbrInput'])){
    $question= $_POST['question'];
    $point= $_POST['point'];
    $type= $_POST['type'];
    $nbrInput= $_POST['nbrInput'];
    $table='';
    $repV='';

    for ($i=1;$i<=$nbrInput;$i++){
       $table=$table.$_POST['response_'.$i].';';
        if ($type=="texte"){
            $repV=$_POST['response_'.$i];
        }else{
            if (isset($_POST['checkbox_'.$i])){
                $repV=$repV.$_POST['response_'.$i].';';
            }
            elseif (isset($_POST['radio'])){
                if ($_POST['radio']== "response_".$i){
                    $repV=$_POST['response_'.$i];
                }
            }
        }
    }

    if (!empty($question) and !empty($point)and !empty($type)and !empty($nbrInput)){

        $response= $pdo->prepare('INSERT INTO questions (idQ, question, point)
VALUES (:idQ, :question, :point)');
        $response->execute(array(
            'idQ'=>"",
            'question'=>$question,
            'point'=>$point
        ));
      if ($response){
          $req= $pdo->prepare('INSERT INTO reponses (idR, reponse,repvalide, type,idQ)
VALUES (:idR, :reponse,:repvalide, :type,:idQ)');
          $req->execute(array(
              'idR'=>"",
              'reponse'=>$table,
              'repvalide'=>$repV,
              'type'=>$type,
              'idQ'=>$pdo->lastInsertId()
          ));
      }

if ($response){
    echo 'ok';
}
        $response->closeCursor();
    }

}
