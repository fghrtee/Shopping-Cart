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
<style>
          .card {
            margin-bottom: 20px;
        }

        #cart1 {
            margin-top: 20px;
        }

        #cartEmptyMessage {
            display: none;
            text-align: center;
        }

</style>
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
        </ul>
      </div>
    </div>
  </header>
        <body> 
<?php
  include('connection.php');
  $id = $_GET['p'];
  $sql = "select * from products where id=" . $id;
  $result = mysqli_query($conn, $sql);
?>

<!-- ... your existing HTML code ... -->

<?php if ($row = mysqli_fetch_assoc($result)) { ?>
  <br><br>

  <div class="container b">
    <div class="row">
      <div class="col col-8">
        <img src="pics\<?php echo $row['img_name'] ?>" width="70%">
      </div>
      <div class="col col-4 ">
        <p id = "name1"> <?php echo $row['name'] ?> </p>
        <p> <?php echo $row['description'] ?> </p>
        <p id = "price1">  PKR <?php echo $row['price'] ?></p> <br>
        <!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Your button to add an item -->
<button onclick="addItemToCart('Item Name', 'Item Price')">Add Item</button>

<!-- Hidden div to display the added item -->
<div id="addedItemDiv" style="display: none;">
    <h3>Added Item</h3>
    <p id="itemName"></p>
    <p id="itemPrice"></p>
    <button onclick="closeAddedItem()">Close</button>
</div>

<!-- Your JavaScript code -->
<script>
function addItemToCart(itemName, itemPrice) {
    // Set the item details in the hidden div
    $('#itemName').text('Name: ' + itemName);
    $('#itemPrice').text('Price: ' + itemPrice);

    // Display the hidden div
    $('#addedItemDiv').show();
}

function closeAddedItem() {
    // Close the hidden div
    $('#addedItemDiv').hide();
}
</script>

        
      </div>
    </div>
  </div> <br><br>

<?php } ?>
<div class="container box1" id = "box1">
              
         
          
          <hr>

          <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Your Cart</h3>
                <hr>
                <div id="cart1">
                    <table id="table1" class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Cart items will be dynamically added here -->
                        </tbody>
                    </table>
                    <p id="cartEmptyMessage">Your cart is empty</p>
                </div>
            </div>
        </div>
    </div>
          
          <p id="cartEmptyMessage">Your cart is empty</p>

          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
              
          </div>

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
  <script src="js.js"></script>
  </body>
  </html>