$('#form').submit(function(){
    let form_data= $(this).serialize();
    let form_method= $(this).attr("method");
    let  form_action= $(this).attr('action');
    $.ajax({
        url:form_action,
        type:form_method,
        data: form_data,
        success: function(data){
            if (data==="success_admin"){
                window.location.replace('Pages/admin_page.php');
            }else if(data==="success_player") {
                window.location.replace('Pages/player_page.php');
            }else {
                window.location.replace('index.php');
              alert(data);

            }
        }
    })
});


$(document).ready(function(){

    var $login= $('#username'),
        $password = $('#password'),
        $send = $('#send'),
        $field = $('.field');


    $field.keyup(function(){
        if($(this).val().length < 5){
            $(this).css({
                borderColor : 'red',
                color : 'red'
            });
        }
        else{
            $(this).css({
                borderColor : 'green',
                color : 'green'
            });
        }
    });

    $send.click(function(e){
        let arrayinput=[$login,$password];
        arrayinput.forEach(input=>{
            if(input.val() === ""){
                input.css({
                    borderColor : 'red',
                    color : 'red'
                });
                e.preventDefault();
            }
        });
    });

});