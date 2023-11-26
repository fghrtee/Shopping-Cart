<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="jquery.js"></script>
</head>
  <body>

<?php
// connect to the database
$db = mysqli_connect("localhost", "root", "", "users_db");

// check if the user has submitted the login form
if (isset($_POST['login'])) {
  // get the username and password from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // query the database to find the user with the given username and password
  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($db, $sql);

  // if the user exists, start a session and redirect to the home page
  if (mysqli_num_rows($result) == 1) {
    session_start();
    $_SESSION['username'] = $username;
    header("location: home.php");
  } else {
    // otherwise, display an error message
    echo "<font color=red>. Invalid username or password</font >";
  }
}
?>

<!-- create a login form -->
<html>
<head>
</head>
<body>
  
    


<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>


        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

          <li><a href="#" class="nav-link px-2 text-white" onclick="loadPage('kids.php')">Boys & Girls</a></li>
          <li><a href="#" class="nav-link px-2 text-white" onclick="loadPage('home.php')">Fragrances</a></li>
          <li><a href="#" class="nav-link px-2 text-white" onclick="loadPage('contact.php')">Contact Us</a></li>
          <li><a href="#" class="nav-link px-2 text-white" onclick="loadPage('login.php')">Login</a></li>
          <li><a href="#" class="nav-link px-2 text-white" onclick="loadPage('register.php')">Register</a></li>
        </ul>
            

        <div class="text-end">

        </div>
      </div>
    </div>
  </header>  

  <div id="pageContent">
  <br><br>

<div class="container">
   <div class="row">
   <div class="col col-xl-4 mb-4">

<div class="card" style="width: 18rem;">

<img src="pics/wint1.webp" class="card-img-top" alt="...">


</div>
</div>
<div class="col col-xl-4 mb-4">

<div class="card" style="width: 18rem;">

<img src="pics/wint2.webp" class="card-img-top" alt="...">


</div>

</div>
<div class="col col-xl-4 mb-4">

<div class="card" style="width: 18rem;">

<img src="pics/wint3.webp" class="card-img-top" alt="...">


</div>
</div>
<div class="col col-xl-4 mb-4">

<div class="card" style="width: 18rem;">

<img src="pics/wint4.webp" class="card-img-top" alt="...">


</div>

</div> <div class="col col-xl-4 mb-4">

<div class="card" style="width: 18rem;">

<img src="pics/wint7.webp" class="card-img-top" alt="...">


</div>
</div>
<div class="col col-xl-4 mb-4">

<div class="card" style="width: 18rem;">

<img src="pics/wint9.webp" class="card-img-top" alt="...">
</div>
</div>


<div class="col col-xl-4 mb-4">
<div class="card" style="width: 18rem;">
<img src="pics/mustard.webp" class="card-img-top" alt="...">
</div>
</div>

<div class="col col-xl-4 mb-4">
<div class="card" style="width: 18rem;">
<img src="pics/navy.webp" class="card-img-top" alt="...">
</div>
</div>

<div class="col col-xl-4 mb-4">
<div class="card" style="width: 18rem;">
<img src="pics/orange.webp" class="card-img-top" alt="...">
</div>
</div>

<div class="col col-xl-4 mb-4">
<div class="card" style="width: 18rem;">
<img src="pics/green.webp" class="card-img-top" alt="...">
</div>
</div>

<div class="col col-xl-4 mb-4">
<div class="card" style="width: 18rem;">
<img src="pics/darkblue.webp" class="card-img-top" alt="...">
</div>
</div>

<div class="col col-xl-4 mb-4">
<div class="card" style="width: 18rem;">
<img src="pics/black.webp" class="card-img-top" alt="...">
</div>
</div>
   </div>
</div>





<br><br><br><br><br><br><br><br>
  </div>

  

<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="my-0" style=bottom:0px;>

<!-- Footer -->
<footer
        class="text-center text-lg-start text-white"
        style="background-color: #1c2331"
        >
  <!-- Section: Social media -->
  <section
           class="d-flex justify-content-between p-4"
           style="background-color: #6351ce"
           >
    <!-- Left -->
    <div class="me-5">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->
      <i class="fa fa-facebook-square" style="font-size:30px;color:blue"></i>
      <i class="fa fa-twitter" style="font-size:30px;color:cyan"></i>
      <i class="fa fa-instagram" style="font-size:30px;color:orchid"></i>
      <i class="fa fa-youtube" style="font-size:30px;color:red"></i>

    <!-- Right -->
    <div>

    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container-fluid text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold">Company name</h6>
          <hr
              class="mb-4 mt-0 d-inline-block mx-auto"
              style="width: 60px; background-color: #7c4dff; height: 2px"
              />
          <p>
            Here you can use rows and columns to organize your footer
            content. Lorem ipsum dolor sit amet, consectetur adipisicing
            elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">Products</h6>
          <hr
              class="mb-4 mt-0 d-inline-block mx-auto"
              style="width: 60px; background-color: #7c4dff; height: 2px"
              />
          <p>
            <a href="#!" class="text-white">MDBootstrap</a>
          </p>
          <p>
            <a href="#!" class="text-white">MDWordPress</a>
          </p>
          <p>
            <a href="#!" class="text-white">BrandFlow</a>
          </p>
          <p>
            <a href="#!" class="text-white">Bootstrap Angular</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">Useful links</h6>
          <hr
              class="mb-4 mt-0 d-inline-block mx-auto"
              style="width: 60px; background-color: #7c4dff; height: 2px"
              />
          <p>
            <a href="#!" class="text-white">Your Account</a>
          </p>
          <p>
            <a href="#!" class="text-white">Become an Affiliate</a>
          </p>
          <p>
            <a href="#!" class="text-white">Shipping Rates</a>
          </p>
          <p>
            <a href="#!" class="text-white">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">Contact</h6>
          <hr
              class="mb-4 mt-0 d-inline-block mx-auto"
              style="width: 60px; background-color: #7c4dff; height: 2px"
              />
          <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
          <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
          <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
          
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div
       class="text-center p-3"
       style="background-color: rgba(0, 0, 0, 0.2)"
       >
    © 2020 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/"
       >MDBootstrap.com</a
      >
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

</div>
</body>
</html>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  <script>
function loadPage(page) {
    $.ajax({
        url: page,
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            // Load the content into the specified div
            $('#pageContent').html(data);
        },
        error: function() {
            alert('Error loading page');
        }
    });
}
</script>
  </html>
