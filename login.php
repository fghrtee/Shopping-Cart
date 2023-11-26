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
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
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
        exit();
    } else {
        // otherwise, display an error message
        echo '<div class="alert alert-danger" role="alert">Invalid username or password</div>';
    }
}
?>

<!-- create a login form -->

<head>
    <title>Login System</title>
</head>

    <br><br><br>
    <div class="container">
        <h1>Login System</h1>
        <form method="post" action="login.php">
            <label>Username:</label>
            <input class="form-control" type="text" name="username" required>
            <label>Password:</label>
            <input class="form-control" type="password" name="password" required><br>
            <button class="btn btn-success" type="submit" name="login">Login</button>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </form><br><br><br>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>

  </html>
