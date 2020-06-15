<div class="container h-100">
    <form id="questions">
    <div class="row justify-content-between align-items-center mb-3 ">

        <div class="col-lg-3">
            <label for="area">Questions</label>
        </div>
        <div class="col-lg-9">
            <div class="form-group">
                <input id="nbrInput" type="hidden" name="nbrInput">
                <textarea class="form-control form" name="question" id="area" rows="3"></textarea>
            </div>
        </div>
    </div>
    <div class="row justify-content-between align-items-center  mb-3 ">
        <div class="col-lg-3">
            <label for="nbr">Nbr de Point</label>
        </div>
        <div class="col-lg-9">
            <div class="form-group">
                <input class="h-25 w-25 form" type="number" name="point" id="nbr">
            </div>
        </div>
    </div>
    <div class="row  align-items-center  justify-content-between mb-2 mb-2 ">
        <div class="col-lg-3  ">
            <label for="select">Type de Response</label>
        </div>
        <div class="col-lg-8 ">
            <div class="form-group">
                <select class="form-control form" name="type" id="select">
                    <option value="" selected>Donnez le type de réponse</option>
                    <option value="texte">Texte</option>
                    <option value="simple">Choix Simple</option>
                    <option value="multiple">Choix Multiple</option>
                </select>
            </div>
        </div>
        <div class=" col-lg-1">
            <button id="addInput" type="button"> <span class="iconify" data-icon="ant-design:plus-circle-outlined" data-inline="false"></span></button>
        </div>

    </div>
        <div class="align-items-center justify-content-between mb-4" id="inputadded">

        </div>
    <div class="float-right">
        <button type="button" id="enregistrer" class="btn btn-outline-info">ENREGISTRER</button>
    </div>
    </form>
</div>

<script src="../Js/jquery-3.5.1.js"></script>
<script>

    $('#enregistrer').on('click',function (e) {
        if ($('.form').val()==""){
            $('.form').css('borderColor','red');
            e.preventDefault();
        }
    });

    $(document).ready(function () {
        let nbr=0;
        $('#select').change(function () {
           nbr=0;
        $('.add').remove();
        });

        $('#addInput').click(function () {
            nbr++;
            let choix = $('#select').val();
            var inputs = $('#inputadded');
            $('#nbrInput').attr('value',nbr);
            if (choix === "simple") {
                inputs.append(`<div class="add mb-2"><input type="text" name="response_${nbr}" class="form valeur"/><input type="radio" name="radio" value="response_${nbr}"/> <a href="#" class="remove_field">Delete</a></div>`); //add input box
            } else if (choix === "multiple") {

                inputs.append(`<div  class="add mb-2"><input type="text" name="response_${nbr}" class="form valeur"/> <input type="checkbox" name="checkbox_${nbr}"/> <a href="#" class="remove_field">Delete</a></div>`); //add input box
            } else if (choix === "texte") {

                inputs.append(`<div  class="add mb-2"><input type="text" name="response_${nbr}" class="form valeur"/><a href="#" class="remove_field">Delete</a></div>`); //add input box
            }
        });
        $(document).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            nbr=nbr-1;
        });
        $('#enregistrer').click(function (e) {
            if ($('.form').val()==""){
                $('.form').css('borderColor','red');
                e.preventDefault();
            }else{
                let sr= $('#questions').serialize();
                $.ajax({
                    type:'post',
                    url:'../Traitement/saveQuestion.php',
                    dataType:'html',
                    data:sr,
                    success:function (data) {
                        console.log(sr);
                        alert(data);
                    }
                })
            }

        })
    });

</script>
