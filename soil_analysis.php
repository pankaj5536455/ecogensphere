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

  <link href="css/pest.css" rel="stylesheet"/>
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
      <span class="title">SOIL ANALYSIS AND RECOMMENDATIONS</span>
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
// Database connection
include 'config.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// SQL query
$sql = "SELECT * FROM soil_information ";

// Execute query
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch all soil information
    while ($row = $result->fetch_assoc()) {
        echo '<div class="soil-info">';
        echo '<h2>' . $row['soil_type'] . '</h2>';
        echo '<p><strong>Location:</strong> ' . $row['location'] . '</p>';
        echo '<p><strong>Sampling Depth:</strong> ' . $row['sampling_depth'] . '</p>';
        echo '<p><strong>Soil Texture:</strong> ' . $row['soil_texture'] . '</p>';
        echo '<p><strong>pH:</strong> ' . $row['ph'] . '</p>';
        echo '<p><strong>Organic Matter Content:</strong> ' . $row['organic_matter_content'] . '</p>';
        echo '<p><strong>Color:</strong> ' . $row['color'] . '</p>';
        echo '<p><strong>Drainage:</strong> ' . $row['drainage'] . '</p>';
        echo '<p><strong>Temperature:</strong> ' . $row['temperature'] . '</p>';
        echo '<p><strong>Soil Depth:</strong> ' . $row['soil_depth'] . '</p>';
        echo '<p><strong>Land Use:</strong> ' . $row['land_use'] . '</p>';
        echo '<p><strong>Previous Crop:</strong> ' . $row['previous_crop'] . '</p>';
        echo '<p><strong>Tillage:</strong> ' . $row['tillage'] . '</p>';
        echo '<h2>Nutrient Levels</h2>';
        echo '<ul>';
        echo '<li><strong>Nitrogen (N):</strong> ' . $row['nitrogen'] . '</li>';
        echo '<li><strong>Phosphorus (P):</strong> ' . $row['phosphorus'] . '</li>';
        echo '<li><strong>Potassium (K):</strong> ' . $row['potassium'] . '</li>';
        echo '<li><strong>Calcium (Ca):</strong> ' . $row['calcium'] . '</li>';
        echo '<li><strong>Magnesium (Mg):</strong> ' . $row['magnesium'] . '</li>';
        echo '<li><strong>Sulfur (S):</strong> ' . $row['sulfur'] . '</li>';
        echo '<li><strong>Micronutrients:</strong> ' . $row['micronutrients'] . '</li>';
        echo '</ul>';
        echo '</div>';
    }
} else {
    echo "No soil information found.";
}

// Close connection
$conn->close();
?>

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

</html>