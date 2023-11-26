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
  <title>Registration Form</title>
</head>
<body>
 

<br><br><br>
<div class="container"><form method="post" action="register.php">
<h1>REGISTRATION FORM</h1>
<hr>
  <div>
    <label for="name">Username:</label>
    <input class="form-control" required type="text" id="name" name="name" value="<?php echo $name; ?>">
  </div>
  <div>
    <label for="email">Email:</label>
    <input class="form-control" required   type="email" id="email" name="email" value="<?php echo $email; ?>">
  </div>
  <div>
    <label for="password">Password:</label>
    <input class="form-control"  required  type="password" id="password" name="password">
  </div>
  <div>
    <label for="password_confirm">Confirm Password:</label>
    <input class="form-control"  required  type="password" id="password_confirm" name="password_confirm">
  </div>
  <div><br>
    <button class="form-control btn btn-success"  type="submit" name="register">Register</button>
  </div> <br>
</form>
<p>Already have an account? <a href="login.php">Login here</a></p><br><br><br>
</div>

<?php
// display errors
if (count($errors) > 0) {
  echo "<ul>";
  foreach ($errors as $error) {
    echo "<li>" . $error . "</li>";
  }
  echo "</ul>";
}
?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>