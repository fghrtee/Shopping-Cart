<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
  <body>
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="home3.php" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="kids.php" class="nav-link px-2 text-white">Boys & Girls</a></li>
          <li><a href="home.php" class="nav-link px-2 text-white">Fragrances</a></li>
          <li><a href="contact.php" class="nav-link px-2 text-white">Contact Us</a></li>
          <?php
          include 'connection.php';
          if ($username == "admin") {?>
            <li>
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Admin
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <a href="admin.php" class="dropdown-item" type="button">Action</a>
            <button class="dropdown-item" type="button">Another action</button>
            <button class="dropdown-item" type="button">Something else here</button>
            </div>
            </div>
            </li>
            <?php }?>
          </ul>


        <div class="text-end">
          <button type="button" class="btn btn-outline-primary me-2" onclick="openFile()"  >Login</button>
          <button type="button" id="a" class="btn btn-outline-warning me-2" onclick="register()">Sign-up</button>
          <button type="button" id="b" class="btn btn-outline-success me-2" onclick="cart()">View Cart</button>
        </div>
      </div>
    </div>
  </header>
        <body> 
            
            
            <?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// initialize variables
$name = "";
$email = "";
$password = "";
$password_confirm = "";
$errors = array();

// register user
if (isset($_POST['register'])) {
  // get input values
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_confirm = $_POST['password_confirm'];

  // validate input values
  if (empty($name)) {
    array_push($errors, "Username is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if ($password != $password_confirm) {
    array_push($errors, "Passwords do not match");
  }

  // check if username or email already exists
  $sql = "SELECT * FROM users WHERE username='$name' OR email='$email' LIMIT 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['username'] == $name) {
      array_push($errors, "Username already exists");
    }
    if ($row['email'] == $email) {
      array_push($errors, "Email already exists");
    }
  }

  // register user if no errors
  if (count($errors) == 0) {
    // // hash password
    // $password = password_hash($password, PASSWORD_DEFAULT);
    // insert user into database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
      // redirect to login page
      header("Location: login.php");
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

// close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<script>

   function openFile() {
  window.location.href = "login.php";
  }

  function register() {
  window.location.href = "register.php";
  }

  function cart() {
  window.location.href = "home2.php";
  }
  </script>
</html>