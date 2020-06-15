<?php
session_start();
$firtsname= $_SESSION['firstname'];
$lastname= $_SESSION['lastname'];
if (!isset($_SESSION['firstname'])){
    header('Location: ../index.php');
    exit();
}
?>
<!doctype html>
<html lang="en" class="h-100">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
<body style="background-color: #F2ECEC;">
<div class="row">
    <div class="col">
        <?php
        require_once "header.php";
        ?>
    </div>
</div>

<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-lg-3  p-3 rounded-lg shadow" style="background-color: #d0cbcb;">
          <div class="justify-content-between mb-3">
              <?php
             echo "<img src='../Images/".$_SESSION['avatar']."' alt='' class='img-responsive rounded-circle' width='100' height='100'>";
              ?>
              <span class="ml-4 font-weight-bold "><?= $firtsname.' '. $lastname?><span/>
          </div>
            <div style="background-color: #79EDF4" class="row rounded-lg justify-content-center align-items-center ml-1 mr-1 mb-4">
                <span class="iconify " data-icon="mdi:desktop-mac-dashboard" data-inline="false"></span>
                <h4 class="ml-3">DASHBOARD</h4>
            </div>
           <div style="font-size: 25px" class="row ml-0 mr-2">
               <nav class="nav flex-column w-100" id="nav">
                   <div class="row">
                       <div class="col-10">
                           <li><a  class="nav-link text-dark active mb-3" href="questions_list">Liste Questions</a></li>
                       </div>
                       <div class="col-2">
                           <span class="iconify" data-icon="clarity:note-edit-line" data-inline="false"></span>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-10">
                           <li><a class="nav-link text-dark mb-3" href="create_admin">Creer Admin</a></li>
                       </div>
                       <div class="col-2">
                           <span class="iconify" data-icon="bi:person-plus" data-inline="false"></span>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-10">
                           <li><a class="nav-link text-dark mb-3" href="players_list">Liste Joueurs</a></li>
                       </div>
                       <div class="col-2">
                           <span class="iconify" data-icon="clarity:note-edit-line" data-inline="false"></span>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-10">
                          <li><a  class="nav-link text-dark mb-3" href="create_questions">Creer Questions</a></li>
                       </div>
                       <div class="col-2">
                           <span class="iconify" data-icon="ant-design:plus-circle-outlined" data-inline="false"></span>
                       </div>
                   </div>



               </nav>
           </div>
        </div>
        <div class="col-lg-8 p-3 rounded-lg shadow" style="background-color: #d0cbcb;">
            <div id="receive" class="row w-100 border border-dark m-2 p-1 shadow rounded-lg justify-content-center">
                <?php
                require_once "questions_list.php";
                ?>
            </div>
        </div>
    </div>
</div>
<script src="../Js/jquery-3.5.1.js"></script>
<script>
    $(document).on('click','#nav li a',function (event) {
        event.preventDefault();
        $('#receive').html('<img src="../Images/ajax-loader.gif" width="50"; height="50">');
        var page= $(this).attr('href');
        jQuery('#receive').load(page + '.php');
    });
</script>
</body>
</html>
