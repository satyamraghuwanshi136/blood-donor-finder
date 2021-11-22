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
  
    <main class="container-fluid eligibility">
      <div class="row">
        <div class="col-lg-12 pt-5">
          <h1 class="text-center fw-bold">Blood Donors Eligibility</h1>
          <div class="row d-flex align-items-center justify-content-center pt-5">
            <h5 class="text-center fw-bold mb-4">You should not be suffering from any of the following diseases or taking medicines for them.</h5>
            <ul class="list-group col-md-5 ps-3 ps-md-0">
            <li class="list-group-item">&starf; Hepatitis B, C</li>
            <li class="list-group-item list-group-item-primary">&starf; AIDS / Diabetes (are you under medication currently?)</li>
            <li class="list-group-item list-group-item-secondary">&starf; Fits / Convulsions (are you under medication currently?)</li>
            <li class="list-group-item list-group-item-success">&starf; Cancer / Leprosy or any other infectious diseases</li>
            <li class="list-group-item list-group-item-danger">&starf; Any allergies (Only if you are suffering from severe symptoms)</li>
            <li class="list-group-item list-group-item-warning">&starf; Hemophilia/ Bleeding problems</li>
            <li class="list-group-item list-group-item-info">&starf; Kidney disease</li>
            <li class="list-group-item list-group-item-light">&starf; Heart disease</li>
            <li class="list-group-item list-group-item-dark">&starf; Hormonal disorders</li>
            </ul>
            <ul class="list-group col-md-5 ps-3 ps-md-0">
            <li class="list-group-item">&starf; Any other type of Jaundice (within 5 years)</li>
            <li class="list-group-item list-group-item-primary">&starf; Tuberculosis (within 2 years)</li>
            <li class="list-group-item list-group-item-secondary">&starf; Chicken Pox (within 1 year)</li>
            <li class="list-group-item list-group-item-success">&starf; Malaria (within 1 year)</li>
            <li class="list-group-item list-group-item-danger">&starf; Organ Transplant (within one year)</li>
            <li class="list-group-item list-group-item-warning">&starf; Blood Transfusion (within the last 6 months)</li>
            <li class="list-group-item list-group-item-info">&starf; Pregnancy (within the last 6 months)</li>
            <li class="list-group-item list-group-item-light">&starf; Blood Donation (within the last 3 months)</li>
            <li class="list-group-item list-group-item-dark">&starf; Major Surgery (within the last 3 months)</li>
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
  </body>
</html>
