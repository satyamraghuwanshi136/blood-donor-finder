<?php
$showAlert = false;
$showError = false;

$username = $password = $cpassword = '';

$errors = array('username' => '','password' => '','cpassword' => '');


if($_SERVER["REQUEST_METHOD"] == "POST"){
    include './config/db_connect.php';

    if(empty($_POST['username'])){
      $errors['username'] = 'A username is required';
    }
  
    if(empty($_POST['password'])){
      $errors['password'] = 'A password is required';
    }
  
    if(empty($_POST['cpassword'])){
      $errors['cpassword'] = 'A cpassword is required';
    }
  
    if(array_filter($errors)){
      // echo 'errors in form';
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];

         // Check whether this username exists
        $existSql = "SELECT * FROM `users` WHERE username = '$username'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
            // $exists = true;
            $showError = "Username Already Exists";
        }
        else{
            // $exists = false; 
            if(($password == $cpassword)){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` ( `username`, `password`) VALUES ('$username', '$hash')";
                $result = mysqli_query($conn, $sql);
                if ($result){
                    $showAlert = true;
                }
            }
            else{
                $showError = "Passwords do not match";
            }
        }
    }
   
}
    
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>SignUp</title>
  </head>
  <body>
    <?php include './partials/nav.php' ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
     <h1 class="my-3">Signup</h1>
     <form action="" class="col-md-6" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" maxlength="11" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            <div class="text-danger d-inline"><?php echo $errors['username']; ?></div>
        </div>
        <div class="form-group my-3">
            <label for="password">Password</label>
            <input type="password" maxlength="23" class="form-control" id="password" name="password">
            <div class="text-danger d-inline"><?php echo $errors['password']; ?></div>
        </div>
        <div class="form-group my-3">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            <div class="text-danger d-inline"><?php echo $errors['cpassword']; ?></div><br>
            <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
        </div>
         
        <button type="submit" class="btn btn-color px-4">SignUp</button>
        
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>