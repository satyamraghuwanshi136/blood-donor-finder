
<?php
session_start();
include('./config/db_connect.php');
$success_msg = false;
$name = $gender = $dob = $bloodgroup = $weight = $address = $state = $city = $mobile = $email = '';
$errors = array('name' => '', 'gender' => '', 'dob' => '', 'bloodgroup' => '', 'weight' => '','address' => '','state' => '', 'city' => '', 'mobile' => '', 'email' => '');

if(isset($_POST['submit'])){

    
    if(empty($_POST['name'])){
      $errors['name'] = 'A name is required';
    } else{
      $name = $_POST['name'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
        $errors['name'] = 'Name must be letters and spaces only';
      }
    }
  
    if(empty($_POST['gender'])){
      $errors['gender'] = 'A gender is required';
    }

    if(empty($_POST['dob'])){
      $errors['dob'] = 'A date of birth is required';
    }

    if(empty($_POST['bloodgroup'])){
      $errors['bloodgroup'] = 'A bloodgroup is required';
    }

    if(empty($_POST['weight'])){
      $errors['weight'] = 'A weight is required';
    }
  
    if(empty($_POST['address'])){
      $errors['address'] = 'A address is required';
    }

    if(empty($_POST['state'])){
      $errors['state'] = 'A state is required';
    }

    if(empty($_POST['city'])){
      $errors['city'] = 'A city is required';
    }

    if(empty($_POST['mobile'])){
      $errors['mobile'] = 'A mobile is required';
    }

  // check email
  if(empty($_POST['email'])){
    $errors['email'] = 'An email is required';
  } else{
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errors['email'] = 'Email must be a valid email address';
    }
  }


  if(array_filter($errors)){
    // echo 'errors in form';
  } else {
    // escape sql chars
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $bloodgroup = mysqli_real_escape_string($conn, $_POST['bloodgroup']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // create sql
    $sql = "INSERT INTO blood_donor(name,gender,dob,blood_group,weight,address,state,city,mobile,email) VALUES('$name','$gender','$dob', '$bloodgroup', '$weight', '$address', '$state', '$city', '$mobile', '$email')";

    // save to db and check
    if(mysqli_query($conn, $sql)){
      // success
      $success_msg = true;
    } else {
      echo 'query error: '. mysqli_error($conn);
    }
    
  }
} 

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./css/style.css" />
    <title>Find a donor</title>
  </head>
  <body>
    
    <?php include './partials/nav.php' ?>

    <?php if($success_msg){ ?>
      <!-- The Modal -->
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> Registration Successful.
      </div>
    <?php } ?>

    <main class="container-fluid donor-register">
      <div class="row">
        <div class="col-lg-12 pt-5">
          <h1 class="text-center fw-bold">Blood Donor Registration</h1>
          <div class="row pt-4">
            <form action="donor-register.php" method="POST" >
              <div class="row  d-flex align-items-center justify-content-center">
                  <div class="col-md-6">
                          <div class="form-group">
                              <label class="pb-1">Name</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" >
                              <div class="text-danger"><?php echo $errors['name']; ?></div>
                          </div>
                          <div class="form-group">
                              <label class="pb-1">Gender</label>
                              <!-- <input type="radio" name="gender" value="0" =""> Male
                              <input type="radio" name="gender" value="1" =""> Female -->
                                <div class="form-control">
                                <input class="form-check-input" type="radio" value="male" name="gender" id="male">
                                <label class="form-check-label me-3" for="male">
                                  Male
                                </label>
                              
                                <input class="form-check-input" type="radio" value="female" name="gender" id="female" >
                                <label class="form-check-label" for="female">
                                  Female
                                </label>
                                </div>
                                <div class="text-danger"><?php echo $errors['gender']; ?></div>
                          </div>
                          <div class="form-group">
                              <label class="pb-1">Date of Birth</label>
                              <input type="date" class="form-control" id="datepicker1" name="dob" >
                              <div class="text-danger"><?php echo $errors['dob']; ?></div>
                          </div>
                          <div class="form-group">
                              <label class="pb-1">Blood Group</label>
                              <select name="bloodgroup" class="form-select" >
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
                              <div class="text-danger"><?php echo $errors['bloodgroup']; ?></div>
                          </div>
                          <div class="form-group">
                              <label class="pb-1">Weight</label>
                              <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter weight" >
                              <div class="text-danger"><?php echo $errors['weight']; ?></div>
                          </div>
                  
                  
                          <div class="form-group">
                              <label class="pb-1">Address</label>
                              <input type="text" class="form-control" id="address" name="address" placeholder="Enter address name" >
                              <div class="text-danger"><?php echo $errors['address']; ?></div>
                          </div>

                          <div class="form-group">
                              <label class="pb-1">State</label>
                              
                                <select name="state" class="form-select form-control" id="countrySelect" size="1" onchange="makeSubmenu(this.value)" >
                                  <option value="" disabled selected>Choose State</option>
                                  </select>
                              <div class="text-danger"><?php echo $errors['state']; ?></div>
                                                                      
                          </div>
                          <div class="form-group">
                            <label class="pb-1">City</label>
                            
                            <select class="form-select form-control" id="citySelect" name="city" size="1" >
                              <option value="" disabled selected>Choose City</option>
                              <option></option>
                              </select>       
                              <div class="text-danger"><?php echo $errors['city']; ?> </div>                                                             
                        </div>

                          <div class="form-group">
                              <label class="pb-1">Mobile</label>
                              <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile" >
                              <div class="text-danger"><?php echo $errors['mobile']; ?></div>
                          </div>
                          <div class="form-group">
                              <label class="pb-1">E-mail</label>
                              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" >
                              <div class="text-danger"><?php echo $errors['email']; ?></div>
                          </div>
                          <div class=" mb-5 mt-3">
                          <button type="submit" class="btn  btn-color w-100" name="submit">Register</button>
                          </div>
                        </div>
                      </div>
                      
              <div class="box-footer text-center"></div>
              
          </form>
          </div>
          </ul>
        </div>
      </div>
    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <script src="javascript/cities.js"></script>
    <script src="javascript/script.js"></script>
  </body>
</html>
