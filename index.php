<?php
session_start();

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//     header("location: login.php");
//     exit;
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <title>Find a donor</title>
</head>
<body>
  <?php include './partials/nav.php' ?>

  <main class="container-fluid hero">
    <div class="row h-100">
      <div class="col-md-6 h-100 main-left pt-5">
        <img src="./img/heart-2.png" alt="" class="d-block mx-auto">
        <h1 class="text-center">SAVE <br>
         A LIFE</h1>
         <p class="text-center mt-3">The blood you give can help someones life.</p>
      </div>
      <div class="col-md-6 p-5 h-100 main-right d-flex flex-column justify-content-center">
        <!-- <h2 class="main-heading"><em>"This website will help in saving lives of those who are in immediate need of blood. You can find blood donors here and also register as a donor."</em></h2> -->
        <div class="find-donor-section p-5">
          <h2 class="mb-3">SEARCH A BLOOD DONOR</h2>
          <a href="search-donor.php" type="button" class="btn btn-color px-4">SEARCH</a>
        </div>
        <div class="register-donor-section p-5">
          <h2 class="mb-3">DONOR REGISTER</h2>
          <a href="donor-register.php" type="button" class="btn btn-color px-4">REGISTER</a>
        </div>
      </div>
    </div>
  </main>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>