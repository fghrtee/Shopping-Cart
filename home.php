<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Hello, world!</title>
  </head>
  <style>


            /* Define styles for the image container */
            .image-container {
         /* Adjust the width and height as needed */

            overflow: hidden; /* Hide any overflow if the new image is larger */
        }
     
        /* Define styles for the image container */
        .image-container {
            height: auto;
            width: auto;
            overflow: hidden; /* Hide any overflow if the new image is larger */
        }
    
        /* Define styles for the image container */
        .image-container {
            width: auto; /* Adjust the width and height as needed */
            height: auto;
            overflow: hidden; /* Hide any overflow if the new image is larger */
        }
      
        .b:hover
        {
            color: white;
            background-color: black;
        }

        
        .fixed-card {
            width: 1000px; /* Set the desired width for all cards */
            height: 500px; /* Set the desired height for all cards */
            margin-bottom: 50px; /* Add some margin between cards */
        }

        .fixed-card img {
            width: 100%; /* Make sure the image takes the full width of the card */
            height: 100%; /* Make sure the image takes the full height of the card */
            object-fit:fill; /* Maintain the aspect ratio and cover the card */
        }
        .color
        {
          background-color:black;
        }
        .fa:hover
        {
          opacity: 0.5;
        }
  </style>
      
       <body id="pageContent">
       <?php
       session_start();
  include('connection.php');
  $sql = "SELECT * FROM products WHERE category='perfume'and status='yes'";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>
 

  
   <br><br>
<div id="pageContent" class="container">
  <div class="row">

    <?php
      while ( $row = mysqli_fetch_assoc($result) ) {  
          
    ?>
    <div class="col col-xl-4 mb-4">
      
       <div class="card" style="width: 18rem;">
        
        <img src=pics/<?php echo $row['img_name'];?> class="card-img-top" alt="...">

        <div class="card-body">
        <p class="card-title">  <?php echo $row['name']; ?>   </p>
   
        <p class="card-text">
          <b> PKR <?php echo $row['price']; ?> </b>
        </p>
<!-- Your button to add an item -->
<button class="btn btn-primary" onclick="addItemToCart('<?php echo $row['name']; ?>', <?php echo $row['price']; ?>)">Add Item</button>

<!-- Bootstrap Modal for displaying the added items and total amount -->
<div class="modal fade" id="addedItemModal" tabindex="-1" role="dialog" aria-labelledby="addedItemModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addedItemModalLabel">Added Items</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Item Name</th>
              <th scope="col">Item Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Actions</th> <!-- New column for delete button -->
            </tr>
          </thead>
          <tbody id="addedItemsContainer">
            <!-- Content will be dynamically added here -->
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <p>Total Amount: <span id="totalAmount">0.00</span></p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Your existing JavaScript code -->
<script>
var totalAmount = 0;

function addItemToCart(itemName, itemPrice) {
    // Check if the item is already added
    var existingItem = $('#addedItemsContainer').find('tr:contains("' + itemName + '")');

    if (existingItem.length > 0) {
        // If item exists, increase the quantity and update the total amount
        var quantityCell = existingItem.find('.itemQuantity');
        var quantity = parseInt(quantityCell.text()) + 1;
        quantityCell.text(quantity);

        totalAmount += parseFloat(itemPrice);
    } else {
        // If item is not added, create a new row with delete button
        var newRow = $('<tr><td>' + itemName + '</td><td>' + itemPrice + '</td><td class="itemQuantity">1</td><td><button class="btn btn-danger btn-sm" onclick="deleteItem(this)">Delete</button></td></tr>');
        $('#addedItemsContainer').append(newRow);

        // Update the total amount
        totalAmount += parseFloat(itemPrice);
    }

    // Update the total amount displayed in the modal
    $('#totalAmount').text(totalAmount.toFixed(2));

    // Show the modal
    $('#addedItemModal').modal('show');
}

function deleteItem(button) {
    // Get the closest row and remove it
    var row = $(button).closest('tr');
    var quantity = parseInt(row.find('.itemQuantity').text());
    var itemPrice = parseFloat(row.find('td:nth-child(2)').text());

    // Update the total amount when an item is deleted
    totalAmount -= quantity * itemPrice;

    // Update the total amount displayed in the modal
    $('#totalAmount').text(totalAmount.toFixed(2));

    // Remove the row
    row.remove();
}
</script>





        </div>
        </div>

    </div>

        <!-- echo "<h1>" . $row['product_name'] . "====" . $row['price'] . "====" . $row['image_filename'] . "</h1><br>"; -->

    <?php
      }
    ?>


  </div>
</div>
        



            <?php 
            
            include ('close.php');
            
            
            ?>

  </head>
         
  </head>



  
        
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
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

 
  </body>
  </html>