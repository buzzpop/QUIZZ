<?php
// logout function
function logOut(){
    session_destroy();
    header('Location: ../index.php');
    exit();
}


// get avatar function
function avatar(){
    $name_file='';
    if (isset($_FILES['file'])) {
        $name_file = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $local_image = "../Images/";

    }
   return  move_uploaded_file($tmp_name, $local_image.$name_file);
}
