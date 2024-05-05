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
  <link href="css/pest.css" rel="stylesheet" />
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
          <a class="navbar-brand" href="service.php">
            <span>
              EcoGenSphere
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item ">
                <a class="nav-link" href="service.php">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="service.php">Services <span class="sr-only">(current)</span> </a>
              </li>
              <li class="nav-item">
                      <a class="nav-link" href="profile.php">Profile</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                  </li>

            </ul>
          </div>
        </nav>
      </div>
    </header>
  </div>
  
    <!-- end header section -->
    <div class="sub_header_section">
      <span class="title">PEST AND DISEASE MANAGEMENT</span>
      <div class="search_ham"></div>
        <div class="search-bar">          
        <div class="dropdown">
          <button class="dropbtn"><img src="images/hamburger_manu.png" alt=""></button>
          <div class="dropdown-content">
            <a href="my_garden.php">MY GARDEN</a>
            <a href="crop_library.php">CROP LIBRARY</a>
           <!--    <a href="garden_planner.php">GARDEN PLANNER</a>-->
           <a href="crop_cultivation_guide.php">CROP GUIDE</a>
            <a href="soil_analysis.php">SOIL ANALYSIS</a>
         <!--   <a href="WEATHER_MONITORING.php">WEATHER MONITORING</a>-->
            <a href="pest_management.php">PEST AND DISEASE MANAGEMENT</a>
          </div>
        </div>
      </div>
      </div>
      <?php
// Placeholder for database connection code

include 'config.php';

// Query all pest management data for all crops
$sql = "SELECT * FROM pest_management";
$result = $conn->query($sql);
?>

<div class="main-cont">
  <?php
  // Loop through each row of pest management data
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<div class="container">';
      echo '<h2>' . $row["crop_name"] . ' Pest and Disaster Management</h2>';
      // Check if image location is not empty
      if (!empty($row['image_url'])) {
        echo '<img src="database/pest-and-desease/' . $row['image_url'] . '" alt="' . $row["crop_name"] . '" title="' . $row["crop_name"] . '">';
      } else {
        // Display a default image if image location is empty
        echo '<img src="database/plant_images/default_image.jpg" alt="' . $row["crop_name"] . '" title="' . $row["crop_name"] . '">';
      }
      echo '<p>' . $row["intro_text"] . '</p>';

      echo '<h3>Pest Management</h3>';
      echo '<ul>';
      for ($i = 1; $i <= 4; $i++) {
        $pest_strategy = $row["pest_management_" . $i];
        $pest_strategy_description = $row["pest_management_" . $i . "_description"];
        if (!empty($pest_strategy) && !empty($pest_strategy_description)) {
          echo '<li><strong>' . $pest_strategy . ':</strong> ' . $pest_strategy_description . '</li>';
        }
      }
      echo '</ul>';

      echo '<h3>Disaster Management</h3>';
      echo '<ul>';
      for ($i = 1; $i <= 4; $i++) {
        $disaster_strategy = $row["disaster_management_" . $i];
        $disaster_strategy_description = $row["disaster_management_" . $i . "_description"];
        if (!empty($disaster_strategy) && !empty($disaster_strategy_description)) {
          echo '<li><strong>' . $disaster_strategy . ':</strong> ' . $disaster_strategy_description . '</li>';
        }
      }
      echo '</ul>';

      echo '</div>'; // Close container div
    }
  } else {
    echo "0 results";
  }
  ?>
</div>

  <!-- end info section -->

  <!-- footer section -->
  <!-- chat.js library-->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

</html

<?php
 mysqli_close($conn);
?>

