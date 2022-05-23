<?php


require 'connect2.php';

?>
<?php

$stmt = $conn->query('SELECT * FROM categories ORDER BY category_id ASC ');
// $stmt->execute();
$cats = $stmt->fetchAll(PDO::FETCH_ASSOC);



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
  <!-- css -->
  <link rel="stylesheet" href="home.css">
  <!-- <link rel="stylesheet" href="slider.css"> -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/font-awesome.min.css" rel="stylesheet">
  <link href="../css/prettyPhoto.css" rel="stylesheet">

  <link href="../css/animate.css" rel="stylesheet">
  <link href="../css/maain.css" rel="stylesheet">



  <link href="../css/responsive.css" rel="stylesheet">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>






  <!-- fontss -->
  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">








</head>

<body>
  <div class="wrapper">
    <header>
      <nav>
        <div class="menu-icon">
          <i class="fa fa-bars fa-2x"></i>
        </div>
        <div class="logo">
          Focus Zone
        </div>
        <div class="menu">
          <ul>
            <li class="active">
              <a href="home.php">Home</a>
            </li>
            <li>
              <a href="http://localhost/php_mysql_project/shop/shop.php">Shop</a>
            </li>
            <li>
              <a href="http://localhost/php_mysql_project/check_cart/cart2.php">Cart</a>
            </li>
            <li>
              <a href="http://localhost/php_mysql_project/aboutus.php">About Us</a>
            </li>
            <li>
              <a href="http://localhost/php_mysql_project/contact-us.php">Contact Us</a>
            </li>
            <li>
              <a href="http://localhost/php_mysql_project/check_cart/cart2.php">Profile</a>
            </li>


          </ul>
        </div>
      </nav>
    </header>
    <section class="hero">
      <div class="hero-inner">
        <h1>Find Everything You are Looking For</h1>
        <h2>View Our Awesome Sporting goods!</h2>
        <div class="btns">
          <a href="#about">
            <button id="aboutus" class="btn">More About Us</button>
          </a>
          <a href="../php_Mysql_project/shop/shop.php">
            <button id="shop" class="btn">Shop Now</button>
          </a>
        </div>
      </div>
    </section>
    <!-- cards section  -->
    <section class="wrapper">
      <h3>Categories</h3>

      <div class="container">
        <div class="row">
          <?php foreach ($cats as $cat) : ?>
            <div class="col-md-4">
              <div class="card text-white card-has-bg click-col" style="background-image:url('<?= $cat['category_image'] ?>');">
                <!-- <img class="card-img d-none" src="<?= $cat['category_image'] ?>" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?"> -->
                <div class="card-img-overlay d-flex flex-column">
                  <div class="card-body">
                    <small class="card-meta mb-2">View Our Collections Of</small>
                    <h4 class="card-title mt-0 ">
                      <!-- <a class="text-white" herf="#">Fittness Equipment</a> -->
                      <a href="../php_Mysql_project/shop/shop.php"><?php echo $cat['category_name'] ?></a>
                    </h4>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>



        </div>
      </div>
    </section> 

 

    <!-- ******************* ABout us************************** -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="column-66">
            <h1 class="xlarge-font">
              <b>About US</b>
            </h1>
            <h1 class="large-font" style="color:#ef7828;">
              <b>Why Purchase Our Products?</b>
            </h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius quam id quibusdam distinctio commodi tempore mollitia asperiores a architecto aliquid dolores, harum eveniet veritatis quia, magni suscipit eum corporis quod?</p>
          </div>
          <div class="column-33">
            <img src="media/pexels-cottonbro-4753891.jpg" width="300" height="500">
          </div>
        </div>
      </div>
      <div id="cu" class="container">
        <div class="row">
          <div class="column-33">
            <img src="media/pexels-tima-miroshnichenko-6389075.jpg" width="300" height="500">
          </div>
          <div class="column-66">
            <h1 class="xlarge-font">
              <b>Clarity</b>
            </h1>
            <h1 class="large-font" style="color:#ef7828;">
              <b>How Can You Contact Us?</b>
            </h1>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, voluptatum modi corrupti non nemo error? Ducimus, doloribus natus! Delectus alias earum sit sint iusto laudantium accusantium repellendus non, dolor iste.</p>
          </div>
        </div>
      </div>
  </div>
  </section>




  
  <!--/slider-->

  <!-- <div class="container1">
    <div class="fetaured">
      <h2>
        Featured Products
      </h2>
      <h5 style="margin-bottom: 40px ;">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h5>
      <a href="shop/shop.php">See More</a>
    </div>
  </div> -->




  <script>
    $(document).ready(function() {
      $(".menu-icon").on("click", function() {
        $("nav ul").toggleClass("showing");
      });
    });
    // Scrolling Effect
    $(window).on("scroll", function() {
      if ($(window).scrollTop()) {
        $('nav').addClass('black');
      } else {
        $('nav').removeClass('black');
      }
    })
  </script>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/price-range.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>


</body>

</html>

<?php include_once "../php_Mysql_project/headFoot/footer.php"?>