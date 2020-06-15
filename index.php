<!doctype html>
<html lang="en" class="h-100">
<head>
    <link rel="stylesheet" href="Css/index.css">
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Css/index.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
<body class="h-100 bg-light">
  
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class=" col-lg-4">
            <p id="message"></p>

            <!-- Form -->
            <form class=" p-4 bg-white rounded shadow" id="form" method="post" action="Traitement/login.php" >
                <div style="background-color:#79EDF4;" class="container-fluid rounded p-1 mb-2">
                <h3  class="text-center text-white  ">REGISTER</h3>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col-1">
                            <span class="iconify" data-icon="ant-design:user-delete-outlined" data-inline="false"></span>
                        </div>
                        <div class="col-10">
                            <label class=" mb-2" for="username">Login:</label>
                        </div>
                    </div>

                    <input type="text" class="form-control username field " id="username" autocomplete="off" placeholder="Username..." name="username">
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col-1">
                            <span class="iconify" data-icon="ri:lock-password-line" data-inline="false"></span>
                        </div>
                        <div class="col-10">
                            <label class=" mb-2" for="password">Password:</label>
                        </div>
                    </div>
                    <input type="password" class="form-control password field" id="password" placeholder="Password..." name="password">
                </div>
                <button style="background-color:#79EDF4;" class=" w-100 border-0 rounded p-2 text-white mb-4 mt-3" id="send">CONNEXION</button>
                <a href="Pages/player_signin.php"><button style="background-color:#79EDF4;" type="button" class=" w-100 border-0 rounded p-2 text-white mb-4">S'INSCRIRE POUR JOUER</button></a>

                <p class="copyright text-center">&copy; R_A_S BEAT.</p>
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>
<script src="Js/jquery-3.5.1.js"></script>
<script src="Js/login.js"></script>

</body>
</html>