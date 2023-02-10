<?php

require "dbBroker.php";
require "model/rezervacija.php";
require "model/stolovi.php";

session_start();
if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
    header("Location: index.php");
    exit();
}

$resultRez = Rez::getAll($conn);    //varijabla za sve rezervacije, atr: rezID, sto, datumRez, opis
if (!$resultRez) {
    echo "Greska kod upita<br>";
    exit();
}

$resultSto = Stolovi::getAll($conn); //varijabla za sve stolove, atr: stoID, naziv, brMesta
if (!$resultSto) {
    echo "Greska kod upita<br>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glavna stranica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        
    <div class="container text-center">
        <h1 style="color:whitesmoke" class="display-1">Restoran 12345</h1>
    </div>

    <div class="container-fluid">
        <div class="row ms-5 pt-3 justify-content-lg-center">
            <div class="col-lg-9 border-4 bg-light rounded-5">
                <div class="row">
                    <?php
                        while ($redSto = $resultSto->fetch_array()) {
                    ?>
                    <div class="col-lg-3 mt-2 mb-2"> 
                        <div class="card d-flex">
                            <div class="card-body align-items-center d-flex justify-content-center">
                                <!-- Button trigger modal -->
                                <button type="button" id="<?php echo $redSto["naziv"]?>" onClick="reply_click(this.id)" class="btn btn-danger nazivSto" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <?php echo $redSto["naziv"];
                                        ?>
                                </button>
                                
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col pt-3">
                <div class="container-fluid">
                    <div class="d-grid gap-2 col mx-auto">
                    <div class="btn-group-vertical" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary mb-1 btn-lg">Dodaj sto</button>
                        <button type="button" class="btn btn-primary mb-1 btn-lg">Filtriraj po stolu</button>
                        <button type="button" class="btn btn-primary mb-1 btn-lg">Filtriraj po datumu</button>
                    </div>
                    </div>
                
                </div>
            </div>
            </div>
        </div>
        <div class="row ms-5 pt-3">
            <div class="col">
                <div class="container bg-light mt-3 ">
                    <?php if(empty($redRez)){ ?>
                        <div class="text-center fs-1 " ><?php echo "NEMA REZERVACIJA" ?></div>
                    <?php
                        }else{
                        while ($redRez = $resultRez->fetch_array()) {
                    ?>
                <table class="table border-1 bg-light">
                    <thead>
                        <tr>
                        <th scope="col">Sto</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Opis</th>
                        <!-- <th scope="col">Korisnik</th> -->
                        <th scope="col">Akcija</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td><?php echo $redRez["sto"] ?></td>
                        <td><?php echo $redRez["datumRez"] ?></td>
                        <td><?php echo $redRez["opis"] ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?> 
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ZATVORI</button>
            </div>

            <div class="modal-body">
                <form action="#" method="post" id="dodajRez">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" id="stoNaziv" value="X" class="form-control form-control-lg mb-3" readonly>
                        </div>
                        
                        <div class="form-group">
                            <input class="form-control form-control-lg mb-3" type="date" name="datum" placeholder="Odaberi datum" required>
                        </div>

                        <div class="form-group">
                            <input  class="form-control form-control-lg" type="text" name="detalji" placeholder="Unesi detalje" required></textarea>
                        </div>

                        <div class="form-group">
                        <button type="button" class="btn btn-secondary" type="submit" id="zakazi" >POTVRDI</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>                
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>