<?php

require "dbBroker.php";
require "model/rezervacija.php";
require "model/stolovi.php";

session_start();
if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
    header("Location: index.php");
    exit();
}

$resultRez = Rez::getAll($conn);
if (!$resultRez) {
    echo "Greska kod upita<br>";
    exit();
}

$resultSto = Stolovi::getAll($conn);
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
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
            <div class="container text-center">
                <h1 style="color:whitesmoke" class="display-1">Restoran 12345</h1>
            </div>

    <div class="container-fluid">
    <div class="row ms-5 pt-3 justify-content-lg-center">
        <div class="col-lg-9 border-4 bg-light rounded-5">
        <div class="container-fluid">
            <div class="row">
                <?php
                    while ($redSto = $resultSto->fetch_array()) {
                ?>
                <div class="col-lg-3 mt-2 mb-2"> 
                    <div class="card d-flex">
                        <div class="card-body align-items-center d-flex justify-content-center">
                            <h5 class="card-title"><?php echo $redSto["naziv"] ?></h5>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
        </div>
        <div class="col pt-3">
            <div class="container-fluid">
                <div class="d-grid gap-2 col mx-auto">
                        <button class="btn btn-primary btn-lg" type="button">Dodaj rezervaciju</button>
                        <button class="btn btn-primary btn-lg" type="button">Dodaj sto</button>
                        <button class="btn btn-primary btn-lg" type="button">Filtriraj</button>
                </div>
            
            </div>
        </div>
        </div>
    </div>
    <div class="row ms-5 pt-3">
        <div class="col">
            <div class="container bg-light mt-3 ">
            <table class="table border-1 bg-light">
                <thead>
                    <tr>
                    <th scope="col">Sto</th>
                    <th scope="col">Datum</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Korisnik</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
                </table>
        </div>
        </div>
        <div class="col">
            <div class="card border-dark rounded-4" >
                <div class="card-body">
</div>
</div>
        </div>
    </div>
    <!-- <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->
    </div>
</body>
</html>