<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>EShop106</title>
  </head>
  <body>
    <?php 
    include('connection.php')
    ?>


    <?php
      if (isset($_GET['txtBrands'])){
        $brand = $_GET['txtBrands'];        
      }
      else{
        $brand = "ALL";        
      }
      // echo "<h1>" . $brand . "</h1>";
    ?>

    <?php 
      if ($brand=='ALL'){
        $ss = "select * from products";  
      }
      else{
        $ss = "select * from products where brand='" . $brand . "'";
      }

      $res = mysqli_query($cn, $ss);
    ?>

    <div class="alert alert-danger" role="alert">
    <?php 
    echo ( "<h4> Total " . mysqli_num_rows( $res ) . " Product(s) Found .... </h4>");
    ?>
    </div>  

    <div class="alert alert-success" role="alert">

    <form action="#" method="get" class="row g-3"> 
    <div class="col-8">    
    <select id="inputState" name="txtBrands" class="form-select">

    <?php
      $sql2 = "SELECT DISTINCT BRAND FROM products WHERE status='yes'";
      $res2 = mysqli_query($cn, $sql2);
      echo "<option>ALL</option>";
      while($row2 = mysqli_fetch_assoc($res2)){
        echo "<option>" . $row2['BRAND'] . "</option>";
      }
    ?>
    </select>
    </div>
    <div class="col-4">
     <button type="submit" class="btn btn-primary">Search</button>
    </div>
    </form>
    </div>


  <div class="container">

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item Name</th>
      <th scope="col">Description</th>
      <th scope="col">Brand</th>
      <th scope="col">Price</th>
      <th scope="col">FileName</th>
      <th scope="col">Status</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

    <?php
      while ( $row = mysqli_fetch_assoc($res) ) {     
    ?>

    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['description']; ?></td>
      <td><?php echo $row['brand']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><?php echo $row['img_name']; ?></td>
      <td><?php echo $row['status']; ?></td>

      <td>
        <a href="newitem.php?sr=<?php echo $row['id']; ?>">
          <img src='images/edit.png' width='30px'>
        </a>
      </td>
      <td><img src='images/del.png' width='30px'></td>

    </tr>

        <!-- echo "<h1>" . $row['product_name'] . "====" . $row['price'] . "====" . $row['image_filename'] . "</h1><br>"; -->
    
    <?php
      }
    ?>
   
  </tbody>
</table>

</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>