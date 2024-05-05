<!DOCTYPE html>
<html  lang="en">

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
  <link rel="shortcut icon" href="images/favicon.ico" type="">

  <title> EcoGenSphere </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="images/hero-bg.png" alt="">
      </div>
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="service.php">
            <span>
              EcoGenSphere
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="about.php"> About</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="service.php">Services</a>
              </li>
              <!-- Replace Why Us and Team links with PHP logic -->
              <?php
              session_start();
              if(isset($_SESSION['email'])) {
                  // User is logged in, display Profile and Logout links
                  echo '
                  <li class="nav-item">
                      <a class="nav-link" href="profile.php">Profile</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                  </li>
                  ';
                  
              } else {
                  // User is not logged in, display default navigation links
                  echo '
                  <li class="nav-item">
                      <a class="nav-link" href="why.php">Why Us</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="team.php">Team</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="login.php"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
                  </li>
                  ';
              }
              ?>
              <!-- End of PHP logic -->
          </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <?php
// Assuming you've already established a database connection
include 'config.php';
// Fetch data from the database
$query = "SELECT * FROM hero_data";
$result = mysqli_query($conn, $query);

?>

<section class="slider_section">
  <div id="customCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

      <?php
      // Counter to track the active slide
      $counter = 0;

      // Loop through the fetched data
      while ($row = mysqli_fetch_assoc($result)) {
        // Determine if this is the first item to set as active
        $active_class = ($counter == 0) ? 'active' : '';

        // Increment counter
        $counter++;
      ?>

        <div class="carousel-item <?php echo $active_class; ?>">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="detail-box">
                  <h1><?php echo $row['header']; ?></h1>
                  <p><?php echo $row['paragraph']; ?></p>
                  <div class="btn-box">
                    <a href="<?php echo $row['button_link']; ?>" class="btn1"><?php echo $row['button_text']; ?></a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="img-box">
                  <img src="images/<?php echo $row['image']; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php
      }
      ?>

    </div>

    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php
      // Reset counter
      $counter = 0;

      // Loop through fetched data to generate indicators
      mysqli_data_seek($result, 0);
      while ($row = mysqli_fetch_assoc($result)) {
        $active_class = ($counter == 0) ? 'active' : '';
      ?>
        <li data-target="#customCarousel1" data-slide-to="<?php echo $counter; ?>" class="<?php echo $active_class; ?>"></li>
      <?php
        $counter++;
      }
      ?>
    </ol>

  </div>
</section>

<?php
// Close the database connection
mysqli_close($conn);
?>

    <!-- end slider section -->
  </div>


  <!-- service section -->
  <?php
// Include your database connection file
include 'config.php';

// SQL query to fetch service data
$sql = "SELECT * FROM service_content LIMIT 3"; // Assuming your table name is 'services' and you want to fetch only 3 services
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    ?>
    <section class="service_section layout_padding">
        <div class="service_container">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Our <span>Services</span>
                    </h2>
                    <p>
                        EcoGenSphere is your ultimate destination for home crop cultivation and gardening expertise. We're here to empower you to create thriving green spaces right in the comfort of your own home. Explore our comprehensive range of services
                    </p>
                </div>
                <div class="row">
                    <?php
                    // Loop through each row in the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="img-box">
                                    <img src="images/<?php echo $row['image']; ?>" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5><?php echo $row['title']; ?></h5>
                                    <p><?php echo $row['description']; ?></p>
                                    <a href="service.php">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="btn-box">
                    <a href="service.php">
                        View All
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php
} else {
    // No rows returned from the query
    echo "No services available.";
}
?>

  <!-- end service section -->


  <!-- about section -->
  <?php
// Include the database connection file if needed
 include 'config.php';

// Assuming you have already established a database connection

// Query to fetch the content from the database
$query = "SELECT * FROM about_content";
$result = mysqli_query($conn, $query);

// Check if there are rows returned from the query
if (mysqli_num_rows($result) > 0) {
    // Loop through each row of the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Output the HTML structure with dynamic content from the database
        ?>
        <!-- about section -->
        <section class="about_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        About <span>Us</span>
                    </h2>
                    <p>
                        <?php echo $row['sub_title']; ?>
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="img-box">
                            <img src="images/<?php echo $row['image']; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-box">
                            <h3>
                                We Are EcoSphere
                            </h3>
                            <p>
                                <?php echo $row['para_1']; ?>
                            </p>
                            <p>
                                <?php echo $row['para_2']; ?>
                            </p>
                            <a href="about.php">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end about section -->
        <?php
    }
} else {
    // No data found
    echo "No data found in the database.";
}
?>

  <!-- end about section -->

  <!-- why section -->
  <section class="why_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Why Choose <span>Us</span>
        </h2>
      </div>
      <div class="why_container">
      <?php
        // Fetch data from the database
        include 'config.php'; // Include your database connection file

        // Query to fetch data from the 'reasons' table
        $sql = "SELECT * FROM reasons limit 3";
        $result = mysqli_query($conn, $sql);

        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row in the result set
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="box">
                    <div class="img-box">
                        <img src="images/<?php echo $row['image']; ?>" alt="">
                    </div>
                    <div class="detail-box">
                        <h5><?php echo $row['title']; ?></h5>
                        <p><?php echo $row['description']; ?></p>
                    </div>
                </div>
                <?php
            }
        } else {
            // No rows returned from the query
            echo "No reasons available.";
        }
      ?>
      </div>
    </div>
  </section>

  <!-- end why section -->

  <!-- team section -->
  <section class="team_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container heading_center">
        <h2 class="">
          Our <span> Team</span>
        </h2>
      </div>

      <div class="team_container">
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="images/default-user-photo.jpg" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Amishee Mathur
                </h5>
                <p>
                  Data Analyst &amp; DBA
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                  
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="images/default-user-photo.jpg" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Ashi Mittel
                </h5>
                <p>
                  Web Designer &amp; Front-end Dev
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                  
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="images/default-user-photo.jpg" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Anshita Goel
                </h5>
                <p>
                  Researcher  &amp; content writer
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                  
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="images/default-user-photo.jpg" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  vanshika tyagi
                </h5>
                <p>
                  full-stack developer &amp; designer
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end team section -->


  <!-- client section 

  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>
          What says our <span>Customers</span>
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel client_owl-carousel">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/client1.jpg" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      LusDen
                    </h6>
                    <p>
                      magna aliqua. Ut
                    </p>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/client2.jpg" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      Zen Court
                    </h6>
                    <p>
                      magna aliqua. Ut
                    </p>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/client1.jpg" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      LusDen
                    </h6>
                    <p>
                      magna aliqua. Ut
                    </p>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/client2.jpg" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      Zen Court
                    </h6>
                    <p>
                      magna aliqua. Ut
                    </p>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

   end client section -->


  <!-- info section -->

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>
              Address
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                 EcoGenSphere@gmail.com
                </span>
              </a>
            </div>
          </div>
          <div class="info_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>
              Info
            </h4>
            <p>
              Empowering Sustainability: Harnessing Nature's Wisdom with Innovative Technology. Join us in shaping a brighter, eco-friendly future.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          <div class="info_link_box">
            <h4>
              Links
            </h4>
            <div class="info_links">
              <a class="active" href="service.php">
                Home
              </a>
              <a class="" href="about.php">
                About
              </a>
              <a class="" href="service.php">
                Services
              </a>
              <a class="" href="why.php">
                Why Us
              </a>
              <a class="" href="team.php">
                Team
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col ">
          <h4>
            Subscribe
          </h4>
          <form action="#">
            <input type="text" placeholder="Enter email" />
            <button type="submit">
              Subscribe
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->


  <!-- footer section -->

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>

<!--              <form class="form-inline">
                <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>-->