<?php
session_start();
$firtsname= $_SESSION['firstname'];
$lastname= $_SESSION['lastname'];
$score= $_SESSION['score'];
?>
<!doctype html>
<html lang="en">
<head>

    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<body style="background-color: #F2ECEC;">
<div class="row">
    <div class="col">
        <?php
        require_once "header.php";
        ?>
    </div>
</div>
<div class="row justify-content-between">
    <div class="col-lg-2 bg-white pt-2">
        <div class="row justify-content-center mb-3">
            <?php
            echo "<img src='../Images/".$_SESSION['avatar']."' alt='' class='img-responsive rounded-circle' width='120' height='120'>";
            ?>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col text-center text-light">
                 <span class="font-weight-bold bg-dark p-2"><?= $firtsname?><span/>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col text-center text-light">
                 <h4 class="font-weight-bold bg-dark p-2"><?=$lastname?><h4/>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col text-center">
                 <h4 class="font-weight-bold ">Best Score<h4/>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col text-center">
                <h5 class="font-weight-bold"><?=$score?> Pts<h5/>
            </div>
        </div>

    </div>
    <div class="col-lg-6 bg-white p-2 ">

    </div>
    <div class="col-lg-3 bg-white p-2 justify-content-center ">
       <div class="row mb-2">
           <div class="col-lg-12 text-center">
               <h3>Top Scores</h3>
           </div>

       </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered text-center">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" colspan="2">Firstname</th>
                        <th scope="col">Score</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<script src="../Js/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function () {
        let offset= 0;
        let tbody= $('#tbody');
        $.ajax({
            url:'../Traitement/getBestPlayers.php',
            type: 'post',
            dataType: 'json',
            data:{
                limit: 5,
                offset: offset
            },
            success: function (data) {
                showData(data, tbody);

            }
        });
        function showData(data, tbody) {
            $.each(data, (indice, player)=> {
                tbody.append(`<tr>
                                    <td>${player.Prenom}</td>
                                   <td>${player.Nom}</td>
                                   <td>${player.score} Pts</td>
                                   </tr>`);
            })
        }
    })
</script>
