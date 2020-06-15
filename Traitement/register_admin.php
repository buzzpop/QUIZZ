<?php
require_once "pdo.php";
require_once "../Pages/function.php";
global $pdo ;
avatar();
if ($_POST['role']=="admin"){
    $role="admin";
}else $role="player";
if (isset($_POST['lastname']) and isset($_POST['firstname']) and isset($_POST['username'])
    and isset($_POST['password']) and isset($_FILES['file'])){
    $nom= $_POST['lastname'];
    $prenom= $_POST['firstname'];
    $login= $_POST['username'];
    $password= $_POST['password'];
    $file=$_FILES['file']['name'];

    if (!empty($nom) and !empty($prenom) and !empty($login) and !empty($password) and !empty($file)){

        $response= $pdo->prepare('INSERT INTO utilisateur(Nom, Prenom, mdp, role,login,avatar,score)
VALUES (:Nom, :Prenom, :mdp, :role, :login, :avatar,:score)');
        $response->execute(array(
            'Nom'=>$nom,
            'Prenom'=>$prenom,
            'mdp'=>$password,
            'role'=>$role,
            'login'=>$login,
            'avatar'=>$file,
            'score'=>0
        ));
        if($response->rowCount() > 0){
            echo "ok";
        }else echo "nok";
        $response->closeCursor();
    }

}


