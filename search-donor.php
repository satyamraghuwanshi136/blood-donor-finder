
<?php 
session_start();
include('config/db_connect.php');

$state = $city = $bloodgroup = $users = '';

$errors = array('state' => '','city' => '','bloodgroup' => '');

if(isset($_POST['submit'])){
  
  if(empty($_POST['state'])){
    $errors['state'] = 'A state is required';
  }

  if(empty($_POST['city'])){
    $errors['city'] = 'A city is required';
  }

  if(empty($_POST['bloodgroup'])){
    $errors['bloodgroup'] = 'A bloodgroup is required';
  }

  if(array_filter($errors)){
    // echo 'errors in form';
  } else {
      $state = $_POST["state"];
      $city = $_POST["city"];
      $bloodgroup = $_POST["bloodgroup"];

      $sql = "SELECT * FROM blood_donor WHERE city = '$city' AND blood_group = '$bloodgroup'";

      // get the result set (set of rows)
      $result = mysqli_query($conn, $sql);

      // fetch the resulting rows as an array
      $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

      // print_r($users);
  }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <title>Find a donor</title>
</head>
<body>
<!-- Trigger/Open The Modal -->
<!-- <button id="myBtn">Open Modal</button> -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p id="error-msg" class="text-danger"></p>
  </div>

</div>

<?php include './partials/nav.php' ?>

  <main class="container-fluid">
    <div class="h-100 w-100">
      <div class="p-5 h-100 main-right">
        <div class="find-donor-section p-5 text-center">
          <h1 class="mb-3">SEARCH A DONOR</h1>
          <form class="d-flex align-items-center justify-content-center" action="search-donor.php" method="POST">
            <div class="row">
              <div class="col-lg-2 col-md-12 mx-2 my-2 search-select">
          <select class="form-select" id="countrySelect" size="1" name="state" onchange="makeSubmenu(this.value)" >
            <option value="" disabled selected>Choose State</option>
            </select>
            <div class="text-danger d-inline"><?php echo $errors['state']; ?></div>
            </div>
            <div class="col-lg-2 col-md-12 mx-2 my-2 search-select">
            <select class="form-select" id="citySelect" size="1" name="city" >
            <option value="" disabled selected>Choose City</option>
            </select>
            <div class="text-danger d-inline"><?php echo $errors['city']; ?></div>
            </div>
            <div class="col-lg-2 col-md-12 mx-2 my-2 search-select">
            <select class="form-select" name="bloodgroup" id="bloodgroup" >
              <option value="" disabled selected>Choose Blood group</option>
                <option value="A1+">A1+</option>
                <option value="A1-">A1-</option>
                <option value="A2+">A2+</option>
                <option value="A2-">A2-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="A1B+">A1B+</option>
                <option value="A1B-">A1B-</option>
                <option value="A2B+">A2B+</option>
                <option value="A2B-">A2B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
          </select>
          <div class="text-danger d-inline"><?php echo $errors['bloodgroup']; ?></div>
          </div>
          <button type="submit" name="submit"  class="btn search-select btn-color px-4 mx-2 my-2 col-md-2 col-md-12 d-xl-block" id="myBtn" style="height: 40px;">SEARCH</button>
        </div>
        </form>
        <?php if($users){ ?>

        <table class="table table-striped mt-5">
          <thead>
            <tr>
              <th scope="col">NAME</th>
              <th scope="col">EMAIL</th>
              <th scope="col">CITY</th>
              <th scope="col">MOBILE NUMBER</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($users as $user): ?>
            <tr>
              <td><?php echo htmlspecialchars($user['name']); ?></td>
              <td><?php echo htmlspecialchars($user['email']); ?></td>
              <td><?php echo htmlspecialchars($user['city']); ?></td>
              <td><?php echo htmlspecialchars($user['mobile']); ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <?php }else{ ?>
          
        <?php } ?>
        </div>
      </div>
    </div>
  </main>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="javascript/cities.js"></script>
  <script src="javascript/script.js"></script>
</body>
</html>