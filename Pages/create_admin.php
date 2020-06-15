
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">

        <img src="" alt="">
        <div class=" col-lg-7">
            <!-- Form -->
            <form style="border: 2px solid gainsboro;" class=" p-3 bg-white rounded shadow" method="post" id="formadmin" action="../Traitement/register_admin.php" enctype="multipart/form-data" >
                <div class="row justify-content-center mb-3">
                    <img id="img" alt="" class="img-responsive rounded-circle" width="60" height="60">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <span class="iconify" data-icon="ant-design:user-delete-outlined" data-inline="false"></span>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control field" id="firstname" placeholder="Firstname..." name="firstname">
                        </div>
                    </div>


                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <span class="iconify" data-icon="ant-design:user-delete-outlined" data-inline="false"></span>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control lastname field" id="lastname" placeholder="Lastname..." name="lastname">
                        </div>
                    </div>

                </div>
                <div class="form-group w-100">
                    <div class="row">
                        <div class="col-lg-2">
                            <span class="iconify" data-icon="ant-design:user-add-outlined" data-inline="false"></span>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control username field" id="username" placeholder="Login..." name="username">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <span class="iconify" data-icon="ri:lock-password-line" data-inline="false"></span>
                        </div>
                        <div class="col-lg-10">
                            <input type="password" class="form-control password field" id="password" placeholder="Password..." name="password">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <span class="iconify" data-icon="ri:lock-password-line" data-inline="false"></span>
                        </div>
                        <div class="col-lg-10">
                            <input type="password" class="form-control password field " id="password2" placeholder="Confirm Password..."name="password2" >
                        </div>
                    </div>

                    <small id="aint"></small
                </div>
                <div class="form-group mt-3 mb-2 clearfix">
                    <div class="custom-file mb-2">
                        <input type="file" class="custom-file-input" id="file" name="file" onchange="load_image(this)">
                        <label style="background-color: #79EDF4;" class="custom-file-label text-white" for="file">Choose file</label>
                    </div>
                    <button style="background-color:#79EDF4;" id="send" type="button" name="btn" class=" border-0 rounded p-2 text-white  float-right w-100">CREER COMPTE</button>
                </div>
                <p class="copyright text-center">&copy; R_A_S BEAT.</p>
                <input type="hidden" name="role" value="admin">
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>
<script>
    function load_image(avatar) {
        let image= document.getElementById('img');
        image.src=window.URL.createObjectURL(avatar.files[0]);
    }

    $(document).ready(function(){

        var $firstname = $('#firstname'),
            $lastname= $('#lastname'),
            $login= $('#username'),
            $password = $('#password'),
            $password2 = $('#password2'),
            $file= $('#file');


        $(document).on('keyup','.field',function(){
            if($(this).val().length < 5){ // si la chaîne de caractères est inférieure à 5
                $(this).css({ // on rend le champ rouge
                    borderColor : 'red',
                    color : 'red'
                });
            }
            else{
                $(this).css({ // si tout est bon, on le rend vert
                    borderColor : 'green',
                    color : 'green'
                });
            }
        });


        $(document).on('click','#send',function(e){
            let arrayinput=[$firstname,$lastname,$login,$password,$password2,$file];
            arrayinput.forEach(input=>{
                if(input.val() === ""){
                    input.css({ // on rend le champ rouge
                        borderColor : 'red',
                        color : 'red'
                    });
                    e.preventDefault();
                }
            });
            if($password2.val()!== $password.val()){
                $("#aint").html('password ain\'t match').css({color: 'red', display:'block'});

                e.preventDefault();
            }
        });
        $(document).on('keyup','#password2',function(){
            $("#aint").css("display", "none");
        });

        $(document).on('click','#send',function(){
            let form_action= $("#formadmin").attr('action');
            let form_method= $("#formadmin").attr('method');
            var myForm = document.getElementById('formadmin');
            let form_data= new FormData(myForm);

            $.ajax({
                url:form_action,
                processData:false,
                dataType:false,
                contentType:false,
                type:form_method,
                data: form_data,
                success: function (data) {
                    if(data === "ok"){
                        window.location.href = "admin_page.php";
                    }
                }
            });
        })

    });
</script>

