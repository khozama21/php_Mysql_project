
<?php
session_start();
require "connect2.php";

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>


 
<div class="product content-wrapper">
    <img src="fwy6zosqphc8hzjk0rgr.webp" width="500" height="500" alt="<?=$product['product_name']?>">
    <div>
        <h1 class="name"><?=$product['product_name']?></h1>
        <span class="price">
            &dollar;<?=$product['product_price']?>
        </span>
        <form action="cart2.php" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['product_id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$product['product_description']?>
        </div>
    </div>
</div>
</body>
</html>

