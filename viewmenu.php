





<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/logo.png" type="">

  <title> menu </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <?php
    include("comman/header.php");
    


?>


  </div>

  <!-- food section -->

  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>
 <?php

include('config.php');
if(isset($_GET['catid']))
{
$catid=$_GET['catid'];

$select="SELECT * from category";
$result=mysqli_query($conn,$select);
echo"<ul class='filters_menu'>";
while($row=mysqli_fetch_row($result))
{
  echo " <li><a href='viewmenu.php ? catid=$row[0] '>$row[1]</a></li>";
}
echo"</ul>";
}
else{
    $catid=9;

    $select="SELECT * from category";
    $result=mysqli_query($conn,$select);
    echo"<ul class='filters_menu'>";
    while($row=mysqli_fetch_row($result))
    {
      echo " <li><a href='viewmenu.php ? catid=$row[0] '>$row[1]</a></li>";
    }
    echo"</ul>"; 
}

$selcat="SELECT * from category where id=$catid"
?> 

      

      <div class="filters-content">
        <div class="row grid">
        <?php


     $selcat="SELECT * from subcategory where categoryid=$catid";
     $result1=mysqli_query($conn,$selcat);
    //  echo ' <div class="col-sm-6 col-lg-4 all pasta">
    //  <div class="box">';
    while($res=mysqli_fetch_row($result1))
    {
       
     echo"

     <div class='col-sm-6 col-lg-4 all pasta'>
    <div class='box'>
    <div>
      <div class='img-box'>
        <img src='admin/images/subcategory/".$res[3]."' alt=''>
      </div>
      <div class='detail-box'>
        <h5>
          ".$res[2]."
        </h5>
        <p>".
            $res[5]."
        </p>
        <div class='options'>
          <h4>
          ".
          $res[4]."
          </h4>

        </div>
      </div>
    </div>
  </div>
</div>";

     }

       ?> 
       
        </div>
      </div>
      <div class='btn-box'>
        
        <a href='viewmenu.php'> View More</a>
        </a>
      </div>
    </div>
  </section>

  <!-- end food section -->

  <!-- footer section -->
  <?php
  include("comman/footer.php");
  ?>
  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>