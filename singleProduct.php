<?php
include_once "header.php";

require 'connect.php';

?>
<?php

$id=$_GET['id'];
if (isset($_GET['id'])){
  $stmt=$conn->prepare("SELECT * FROM products WHERE product_id ='$id'");
  $stmt->execute([$_GET['id']]);

  $product=$stmt->fetch(PDO::FETCH_ASSOC);
  if(!$product){
    exit('product does not exist');
  }
}
  else {
    exit('product does not exist');



  }
  

$conn=NULL;

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

    <link rel="stylesheet" href="css/singleP.css">
  </head>
  <body>
  <main class="container">
 
 <!-- Left Column /   Image -->
 <div class="left-column">
   
   <img data-image="red" class="active" src="fwy6zosqphc8hzjk0rgr.webp" alt="">  
 </div>


 <!-- Right Column -->
 <div class="right-column">

   <!-- Product Description -->
   <div class="product-description">
     <span>Title</span>
     <h1><?php echo $product['product_name']?></h1>
     <p><?php echo $product['product_description']?></p>
   </div>

 
   <div class="product-configuration">

     <div class="cable-config">
      
     <div class="product-price">
     <span><?php echo $product['product_price']?>JOD</span>

    
   </div>
   </div>
       <div class="cable-choose">
       <form action="index.php?page=cart" method="post">
         <input type="number" name="quantity" min=1 max="<?=$product['quantity']?>" placeholder="Qnty"  required>
         <input type="hidden" name="product_id" value="<?=$product['product_id']?>"   >
         <input type="submit"  value="Add To Cart" class="cart-btn">

       </form>

       </div> 

     
      
     </div>
   

   <!-- Product Pricing -->
 
 </div>
</main>
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
 