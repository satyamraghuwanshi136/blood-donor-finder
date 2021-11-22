<?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
}
else{
  $loggedin = false;
}
?> 

<nav class="navbar navbar-expand-lg navbar-dark navbar-color">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">Blood Donor Finder</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 ms-auto ">
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="eligibility.php">Eligibility</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="search-donor.php">Search a donor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="donor-register.php">Donor Registration</a>
          </li>
        <?php if(!$loggedin){ ?>
            <li class="nav-item">
              <a class="nav-link text-white" aria-current="page" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" aria-current="page" href="signup.php">Signup</a>            
            </li>
          <?php } ?>
          <?php if($loggedin){ ?>
            <li class="nav-item">
              <a class="nav-link text-white" aria-current="page" href="logout.php">Logout</a>
            </li>
          <?php } ?>
          </ul>
      </div>
    </div>
  </nav>