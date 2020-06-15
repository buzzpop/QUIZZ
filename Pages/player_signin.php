<!doctype html>
<html lang="en" class="h-100">
<head>
    <style>
        .iconify { width: 20px; height: 20px; }
    </style>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Css/index.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="h-100">

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class=" col-lg-4">
            <!-- Form -->
            <form class=" p-4 bg-white rounded shadow" method="post"   id="formRegister" action="../Traitement/register_admin.php" enctype="multipart/form-data" >
                <div style="background-color:#79EDF4;" class="container-fluid rounded p-1 mb-3">
                    <h4  class="text-center text-white  ">REGISTER</h4>
                </div>
                <div class="row justify-content-center mb-3">
                    <img id="img" alt="" class="img-responsive rounded-circle" width="60" height="60">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-2">
                            <span class="iconify" data-icon="ant-design:user-delete-outlined" data-inline="false"></span>
                        </div>
                        <div class="col-10">
                            <input type="text" class="form-control field" id="firstname" placeholder="Firstname..." name="firstname">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-2">
                            <span class="iconify" data-icon="ant-design:user-delete-outlined" data-inline="false"></span>
                        </div>
                        <div class="col-10">
                            <input type="text" class="form-control lastname field" id="lastname" placeholder="Lastname..." name="lastname">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-2">
                            <span class="iconify" data-icon="ant-design:user-add-outlined" data-inline="false"></span>
                        </div>
                        <div class="col-10">
                            <input type="text" class="form-control username field" id="username" placeholder="Login..." name="username">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-2">
                            <span class="iconify" data-icon="ri:lock-password-line" data-inline="false"></span>
                        </div>
                        <div class="col-10">
                            <input type="password" class="form-control password field" id="password" placeholder="Password..." name="password">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-2">
                            <span class="iconify" data-icon="ri:lock-password-line" data-inline="false"></span>
                        </div>
                        <div class="col-10">
                            <input type="password" class="form-control password field " id="password2" placeholder="Confirm Password..."name="password2" >
                        </div>
                    </div>

                <small id="aint"></small>
                </div>
                <div class="form-group  mb-1 mt-4 mb-3 clearfix">
                    <div class="custom-file mb-2">
                        <input type="file" class="custom-file-input" id="file" name="file" onchange="load_image(this)">
                        <label style="background-color: #79EDF4;" class="custom-file-label text-white" for="file">Choose file</label>
                    </div>
                   
                    <button style="background-color:#79EDF4;" id="send" type="button" name="btn" class=" border-0 rounded p-2 text-white w-100">CREER COMPTE</button>
                </div>
                <p class="copyright text-center">&copy; R_A_S BEAT.</p>
                <input type="hidden" name="role" value="player">
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>
<script src="../Js/jquery-3.5.1.js"></script>
<script src="../Js/register.js"></script>
</body>
</html>