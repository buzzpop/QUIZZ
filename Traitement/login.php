<?php
session_start();
include("pdo.php");
global $pdo;
if (isset($_POST['username']) and isset($_POST['password'])) {
    $login = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($login) and !empty($password)) {
        $response = $pdo->query("SELECT * from utilisateur where login ='" . $_POST['username'] . "' and mdp
        = '" . $_POST['password'] . "'");
        if ($response->rowCount() > 0) {
            $data = $response->fetch();

            $_SESSION['firstname'] = $data['Prenom'];
            $_SESSION['lastname'] = $data['Nom'];
            $_SESSION['avatar'] = $data['avatar'];
            $_SESSION['score'] = $data['score'];

            if ($data['role'] == "admin") {
                echo 'success_admin';

            } elseif ($data['role'] == "player") {
                echo 'success_player';
            }
        } else {
            echo 'invalid login or password';
        }
    }
}
