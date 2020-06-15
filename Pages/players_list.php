<!doctype html>
<html lang="en">
  <head>
      <style>
          #scrollzone{
             height: 400px;
              overflow: scroll;
          }
      </style>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <!-- popup ki charge les donnees a editer: debut -->
  <div class="modal text-center" id="myModal">
      <div class="modal-dialog">
          <div class="modal-content">


              <div class="modal-header">
                  <h4 class="modal-title">Modify</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>


              <div class="modal-body">
                  <form>
                      <div class="form-group">
                          <input type="hidden" class="form-control" id="idU" name="idu">
                      </div>
                      <div class="form-group">
                          <label for="fn">Firstname</label>
                          <input type="text" class="form-control" id="firstname" name="firstname">
                      </div>
                      <div class="form-group">
                          <label for="ln">Lastname</label>
                          <input type="text" class="form-control" id="lastname" name="lastname">
                      </div>
                  </form>
              </div>


              <div class="modal-footer">
                  <button type="button"  class="btn btn-info" id="modif">Modify</button>

              </div>

          </div>
      </div>
  </div>
  <!--Fin popup-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- Mon tableau pour lister les joueurs-->
<div id="scrollzone" class="col">
    <table class="table table-bordered text-center">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Score</th>
            <th scope="col"colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>
</div>
  <!-- Fin de mon tableau-->
  <!-- Mon Script pour lister modifier et supprimer-->

    <script src="../Js/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function(){
            let offset= 0;
            let tbody= $('#tbody');
            $.ajax({
                url:'../Traitement/getPlayers.php',
                type: 'post',
                dataType: 'json',
                data:{
                    limit: 7,
                    offset: offset
                },
                success: function (data) {
                    showData(data, tbody);
                    offset+=7;
                }
            });
            // function showDta to show data received by the treatment
            function showData(data, tbody) {
                $.each(data, (indice, player)=> {
                    tbody.append(`<tr>
                                    <td>${player.Num}</td>
                                    <td>${player.Prenom}</td>
                                   <td>${player.Nom}</td>
                                   <td>${player.score}</td>
                                    <td><button type="button" class="btn btn-outline-primary"id="mdf" data-toggle="modal" data-target="#myModal">Modify</button></td>
                                    <td><button type="button" class="btn btn-outline-danger" id="dlt">Delete</button></td>
                                   </tr>`);
                })
            }
            const scrollzone= $('#scrollzone');
            scrollzone.scroll(function () {
                const st= scrollzone[0].scrollTop;
                const sh= scrollzone[0].scrollHeight;
                const ch= scrollzone[0].clientHeight;
                if (sh-st<= ch){
                    $.ajax({
                        type:'post',
                        url:'../Traitement/getPlayers.php',
                        data:{
                            limit: 7,
                            offset: offset
                        },
                        dataType: 'JSON',
                        success: function (data) {
                            showData(data, tbody);
                            offset+=7;
                        }
                    });
                }
            });
            //fonction ki supprime le tr et les données dans la base de données
            $(document).on('click','#dlt',function () {
                if (confirm("Do you want to delete?")){
                    $(this).parents("tr").remove();
                    let numplayer= $(this).parents('tr').find('td').eq(0).html();
                    $.ajax({
                        type:'post',
                        url:'../Traitement/deletePlayer.php',
                        dataType:'html',
                        data:{
                            numplayer: numplayer
                        },
                        success:function (data) {
                            if (data==="ok"){
                                alert('Successful deletion');
                            }
                        }
                    });
                }

            });
            //fonction ki charge les données de la ligne dans le popup
            $(document).on("click","#mdf", function() {
                let fieldnumber= $(this).parents('tr').find('td').eq(0).html();
                let firstname= $(this).parents('tr').find('td').eq(1).html();
                let lastname= $(this).parents('tr').find('td').eq(2).html();
                $('#idU').attr('value',fieldnumber);
                $('#firstname').attr('value',firstname);
                $('#lastname').attr('value',lastname);


            });
            //fonction qui met a jour les données
            $(document).on("click","#modif", function() {
                let firstname=$('#firstname').val();
                let lastname=$('#lastname').val();
                let idu=$('#idU').val();
                $.ajax({
                    url:'../Traitement/modifyPlayer.php',
                    type:'post',
                    data:{
                        firstname:firstname,
                        lastname:lastname,
                        idu:idu
                    },
                    dataType:'html',
                    success:function (data) {
                            alert('Modification carried out successfully');
                    }
                });
            });

        });
    </script>
  </body>
</html>