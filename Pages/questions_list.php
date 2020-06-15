<div class="container h-100">
    <div class="row mb-3">
        <div class="col-6">
           <h4>Nombre de Question/Jeu</h4>
        </div>
        <div class="col-4">
            <div class="input-group">
                <input type="text" class="form-control" >
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary btn-dark text-light" type="button">OK</button>
                </div>
            </div>
        </div>
    </div>
    <div style=" height: 400px; overflow: scroll;" class="container-fluid listes" id="scrollquestions">

    </div>
</div>
<script src="../Js/jquery-3.5.1.js"></script>
<script>

    $(document).ready(function() {
        let offset = 0;
        let liste = $('.listes');
        $.ajax({
            url: '../Traitement/getQuestions.php',
            type: 'post',
            dataType: 'json',
            data: {
                limit: 3,
                offset: offset
            },
            success: function (data) {

                showData(data, liste);
                offset+=3;
            }
        });

        // function showDta to show data received by the treatment
        function showData(data, liste) {
            $.each(data, (indice, q) => {
                if (q.type==='texte'){
                    liste.append(`<div class="row text-info font-weight-bold">${q.idQ}__<p>${q.question}</p></div><div class="row"><div class="col-6 font-italic"><input  type="text" name="" disabled></div></div>`);
                }
                else if (q.type==='simple'){
                    liste.append(`<div class="row text-info font-weight-bold">${q.idQ}__<p>${q.question}</p></div>`);
                     repv=q.repvalide.trim().split(';');
                    resp=q.reponse.trim().split(';');
                    $.each(resp , function (indice, r) {
                        if (r!==""){
                        liste.append(`<div class="row"><div class="col-1"><input  type="radio" name="radio" disabled></div><div class="col-6 font-italic">${r}</div></div>`);
                        }
                        })
                }else {
                    liste.append(`<div class="row text-info font-weight-bold">${q.idQ}__<p>${q.question}</p></div>`);
                    resp=q.reponse.trim().split(';');
                    $.each(resp , function (indice, r) {
                        if (r!==""){
                            liste.append(`<div class="row"><div class="col-1"><input  type="checkbox" name="" disabled ></div><div class="col-6 font-italic">${r}</div></div>`);
                        }
                    })
                }
                liste.append(`<hr style="border: 1px solid #79EDF4">`);
            })

        }
        const scrollzone= $('#scrollquestions');
        scrollzone.scroll(function () {
            const st= scrollzone[0].scrollTop;
            const sh= scrollzone[0].scrollHeight;
            const ch= scrollzone[0].clientHeight;
            if (sh-st<= ch){
                $.ajax({
                    type:'post',
                    url:'../Traitement/getQuestions.php',
                    data:{
                        limit: 3,
                        offset: offset
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        showData(data, liste);
                        offset+=3;
                    }
                });
            }
        });
    });
</script>
