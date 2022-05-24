<?php
session_start();
require "../connect2.php";
include_once "../headFoot/header.php";

$id_user = $_SESSION['user_id '] ?? 0;
?>
<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
  // Prepare statement and execute, prevents SQL injection
  $stmt = $conn->prepare('SELECT * FROM products WHERE product_id = ?');
  $stmt->execute([$_GET['id']]);
  // Fetch the product from the database and return the result as an Array
  $product = $stmt->fetch(PDO::FETCH_ASSOC);
  // Check if the product exists (array is not empty)
  if (!$product) {
    // Simple error to display if the id for the product doesn't exists (array is empty)
    exit('Product does not exist!');
  }
} else {
  // Simple error to display if the id wasn't specified
  exit('Product does not exist!');
}
?>


<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/singleP.css">
</head>





<body>
  <main class="container">

    <!-- Left Column /   Image -->
    <div class="left-column">

      <img src="<?= $product['product_image'] ?>" width="500" height="500" alt="<?= $product['product_name'] ?>">
    </div>


    <!-- Right Column -->
    <div class="right-column">

      <!-- Product Description -->
      <div class="product-description">
        <span>Title</span>
        <h1><?= $product['product_name'] ?></h1>
        <div class="product-price">
          <span> <?= $product['product_price'] ?> JOD</span>


        </div>

        <div class="product-configuration">

          <div class="cable-config">



          </div>
          <div class="description">
            <?= $product['product_description'] ?>
          </div>

        </div>

      </div>

      <div class="cable-choose">

        <form action="" method="post">
          <input type="number" name="quantity" min="1" value="1" placeholder="Quantity" required>
          <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
          <input type="submit" value="Add To Cart" name="add_cart" class="cart-btn" style="display: block; margin:20px;">

        </form>

      </div>

    </div>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_cart'])) {

      if (!empty($_POST['quantity'])) {

        $id_prd = $_GET['id'];
        $id = $_SESSION['user_id '];
        $check = $conn->query("SELECT * FROM cart_temp WHERE product_id = '$id_prd' and customer_id = ' $id' ");
        $row = $check->fetchAll(PDO::FETCH_ASSOC);
        if ($row) {
          echo "<script>alert('this item already added to cart')</script>";
        } else {

          $sqlInsert = "INSERT INTO cart_temp( product_id, product_name, product_price, customer_id ,quantity) VALUES (:prd_id,:prd_name,:prd_price,:cust_id , :qty) ";

          $stat = $conn->prepare($sqlInsert);
          $stat->execute([
            ":prd_id" => $_GET['id'],
            ":prd_name" => $product['product_name'],
            ":prd_price" => $product['product_price'],
            ":cust_id" => $id_user,
            ":qty" => $_POST['quantity']

          ]);
          echo "<script>alert('this item added to cart')</script>";
        }
      } else {
        echo "<script>alert('you havt to add quantity')</script>";
      }
    }




    ?>



    <!-- Product Pricing -->

    </div>
  </main>

  <?php
  $pr_id = $_GET['id'];


  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_name ']) && isset($_POST["comment"])) {
    $com = $_POST["comment"];
    if ($com != "") {
      if ($com != "") {
        $u_name =  $_SESSION['user_name '];
        $pr_di = $_POST["id_comment"];

        $result = $conn->prepare("INSERT INTO `comment`(`comment_id`, `comment`, `name`, `date`, `product_id`) VALUES (NULL,:comment,:name,NULL,:product_id)");
        $result->bindParam(':comment', $com);
        $result->bindParam(':name', $u_name);
        $result->bindParam(':product_id', $pr_di);
        $result->execute();
      } else {
        //echo <script>
      }
    }
  }
  ?>

  <div class="row d-flex flex-column  ">
    <div>
      <div class="d-flex justify-content-center row">
        <div class="d-flex flex-column col-md-8">

          <form action="" method="post">

            <div class="coment-bottom bg-white p-2 px-4">
              <div class="d-flex flex-row add-comment-section mt-4 mb-4">

                <input type="text" name="comment" class="form-control mr-3" placeholder="Add comment">

                <button class="btn btn-primary" type="submit" value="comment">Comment</button>
              </div>

              <input type="hidden" name="id_comment" value="<?php echo $pr_id; ?>">

              <input type="hidden" name="name_comment" value="<?php echo $_SESSION['user_name ']; ?>">

          </form>


          <?php

          $check = $conn->query("SELECT * FROM comment WHERE product_id = '$pr_id'");
          $row = $check->fetchAll(PDO::FETCH_ASSOC);
          foreach ($row as $r) {
          ?>
            <div class="commented-section mt-2">
              <div class="d-flex flex-row align-items-center commented-user">
                <h5 class="mr-2"><?php echo $r['name'];  ?></h5><span class="dot mb-1">
              </div>
              <div class="comment-text-sm"><span> <?php echo $r['comment']; ?></span></div>
              <div class="reply-section">
                <div class="d-flex flex-row align-items-center voting-icons">
                  <hr class="hr">
                </div>
              </div>
            </div>

          <?php } ?>
          <!-- ------------------------------------- update2022---comment ------------------------------------------------------------------------------------->



        </div>
      </div>
    </div>
  </div>








  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  <footer class="footer text-center text-white" style="background-color: rgb(26, 26, 26) ;">


    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(70, 70, 70, 0.907);">
      © 2022 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">FocusZone.com</a>
    </div>
    <!-- Copyright -->
  </footer>
</body>

</html>