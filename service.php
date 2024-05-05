<?php
// Include the database connection file
include 'config.php';

// Fetch data from the database
$sql = "SELECT * FROM service_content";
$result = mysqli_query($conn, $sql);

// Check if the query executed successfully
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

?>
<!DOCTYPE html>
<html lang="en">

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

<body class="sub_page">

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
          <a class="navbar-brand" href="index.php">
            <span>
              EcoGenSphere
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="about.php"> About</a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="service.php">Services  <span class="sr-only">(current)</span> </a>
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
  </div>


  <!-- service section -->
<!-- service section -->
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
            <?php
            // Counter for the number of services per row
            $service_counter = 0;

            // Loop through each service
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['title'];
                    $description = $row['description'];
                    $image = $row['image'];
                    $link = $row['link'];

                    // Check if it's the start of a new row
                    if ($service_counter % 3 == 0) {
                        echo '<div class="row">';
                    }
            ?>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="images/<?php echo $image; ?>" alt="<?php echo $title; ?>">
                            </div>
                            <div class="detail-box">
                                <h5><?php echo $title; ?></h5>
                                <p><?php echo $description; ?></p>
                                <?php
                                // Check if user is logged in
                                if (isset($_SESSION['email'])) {
                                    // User is logged in, provide Explore Now link
                                    echo '<a href="' . $link . '">Explore Now</a>';
                                } else {
                                    // User is not logged in, display default link
                                    echo '<a href="javascript:displayAlert();">Explore Now</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            <?php
                    // Increment the service counter
                    $service_counter++;

                    // Check if it's the end of a row
                    if ($service_counter % 3 == 0) {
                        echo '</div>';
                    }
                }
            } else {
                echo "No services found.";
            }
            ?>
        </div>
    </div>
</section>
<!-- end service section -->

  <!-- end service section -->

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
              <a class="active" href="index.php">
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
  <!-- custom js 
  <script type="text/javascript" src="js/custom.js"></script>-->
  <script type="text/javascript" src="custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>