$(document).ready(function () {

    //
    $(document).on('click','#send',function(){
        let form_action= $("#formRegister").attr('action');
        let form_method= $("#formRegister").attr('method');
        var myForm = document.getElementById('formRegister');
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
                    window.location.href = "/QUIZZ/index.php";
                }
            }
        });
    })

});




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
    })

});




