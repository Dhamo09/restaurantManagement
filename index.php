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

  <title> index </title>

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

<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <?php
    include("comman/header.php");
    ?>




    slider section
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                    Restaurant Mission Statement
                    </h1>
                    <p>
                    A good restaurant mission statement clearly defines your<br> restaurant’s goals. It also explains why your restaurant <br>exists, and what makes it different. 
                    </p>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                    Restaurant Vision Statement
                    </h1>
                    <p>
                    A restaurant’s vision statement (a.k.a. credo)<br> describes what the future will look like when<br> you accomplish your mission.
                    </p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                    Restaurant Value Statement
                    </h1>
                    <p>
                    A restaurant’s values statement describes<br> what you believe in and what your business<br> stands for.              
                    </p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

 

  <!-- food section -->
  <?php
// include('viewmenu.php');
?>
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

  <!-- <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      <ul class="filters_menu">
        <li class="active"r><a href="menu.php">All</a></li>
        <li><a href="Burger.php">Burger</a></li>
        <li><a href="pizza.php">Pizza</a></li>
        <li><a href="pasta.php">Pasta</a></li>
        <li><a href="Fries.php">Fries</a></li>
      </ul>

      <div class="filters-content">
        <div class="row grid">
          <div class="col-sm-6 col-lg-4 all pizza">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/f1.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    The Californian Pizza
                  </h5>
                  <p>
                    Also known as gourmet pizza, California pizza was invented in the late seventies. It’s one of the “busy” pizzas in that it </p>
                  <div class="options">
                    <h4>
                      $20
                      </h6>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all burger">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/f2.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Cheese Burger
                  </h5>
                  <p>
                    In its purest form, a burger is a patty sandwiched between a bun and topped with condiments.
                  </p>
                  <div class="options">
                    <h4>
                      $15
                    </h4>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all pizza">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/f3.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Marinara Pizza
                  </h5>
                  <p>
                    sssssThe green and white tiled wood-fired oven, the tangy tomato sauce, and the doughy crust: it is all precisely authentic.
                  </p>
                  <div class="options">
                    <h4>
                      $17
                    </h4>

                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all pasta">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/f4.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Plain Pasta
                  </h5>
                  <p>
                  This recipe is so different from the Italian dressing pasta salads. Works as a main dish or a very hearty side dish for lunch.
                  </p>
                  <div class="options">
                    <h4>
                      $10
                    </h4>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all fries">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/f5.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    French Fries
                  </h5>
                  <p>
                    Some may say French fries are really nothing other than deep fried potatoes, but in order to truly appreciate French fries at.
                  </p>
                  <div class="options">
                    <h4>
                      $10
                    </h4>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all pizza">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/f6.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Mix Pizza
                  </h5>
                  <p>
                    The oldest usage of the word "pizza" that we have record of was in a Latin text from the town of Gaeta.
                  </p>
                  <div class="options">
                    <h4>
                      $15
                    </h4>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all burger">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/f7.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Onion Burger
                  </h5>
                  <p>
                    Oklahoma onion burger is prepared by smashing thin slices of onions into a beef patty. </p>
                  <div class="options">
                    <h4>
                      $14
                    </h4>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all burger">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/f8.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Veggie Burger
                  </h5>
                  <p>
                    Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque
                  </p>
                  <div class="options">
                    <h4>
                      $10
                    </h4>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all pasta">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/f9.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Cheese Pasta
                  </h5>
                  <p>
                    Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque
                  </p>
                  <div class="options">
                    <h4>
                      $20
                    </h4>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        
        <a href="menu.php"> View More</a>
        </a>
      </div>
    </div>
  </section> -->

  <!-- end food section -->

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
            <h2>
                We Are Restaurant
              </h2>
            </div>
            <p>
              Restaurant! It is a most popular name in the present world. 
              Many people do not have their meal in their home, they always 
              take meal and food from restaurant.  Restaurant is a public
              place, which opens to all for selling food and beverage to
              any person and peoples. We are visit restaurant and take 
              food from restaurant. But we don’t the proper meaning or 
              definition of Restaurant.Sometimes many peoples think that 
              Restaurant and Hotel is same things and its definition is also 
              same. But it is not true. Definition of Hotel and restaurant is 
              different from each other.
            </p>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Book A Table
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" class="form-control" placeholder="Your Name" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Phone Number" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Your Email" />
              </div>
              <div>
                <select class="form-control nice-select wide">
                  <option value="" disabled selected>
                    How many persons?
                  </option>
                  <option value="">
                    2
                  </option>
                  <option value="">
                    3
                  </option>
                  <option value="">
                    4
                  </option>
                  <option value="">
                    5
                  </option>
                </select>
              </div>
              <div>
                <input id="date-range" type="date" class="form-control">
              </div>
              <div class="btn_box">
                <button>
                  Book Now
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container ">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118147.82106503707!2d70.73889467562678!3d22.273466166759295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c98ac71cdf0f%3A0x76dd15cfbe93ad3b!2sRajkot%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1688558831059!5m2!1sen!2sin" width="550" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>				</div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end book section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>
          What Says Our Customers
        </h2>
      </div>
      <div class="carousel-wrap row ">
        <div class="owl-carousel client_owl-carousel">
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                First time in (RN) and YOU have to go! It’s the cutest little spot with amazing food. The (FN) is to die for. IT WAS FIRE!! The service we received was so amazing and we will definitely be back again. 
                </p>
                <h6>
                  Moana Michell
                </h6>
                <p>
                  magna aliqua
                </p>
              </div>
              <div class="img-box">
                <img src="images/client1.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                Do yourself a favor and visit this lovely restaurant in (CN). The service is unmatched. The staff truly cares about your experience. The food is absolutely amazing – everything we tasted melted in other mouths.
                </p>
                <h6>
                  Mike Hamell
                </h6>
                <p>
                  magna aliqua
                </p>
              </div>
              <div class="img-box">
                <img src="images/client2.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

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