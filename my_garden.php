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
  <link href="css/style1.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
    /* CSS Reset and General Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
    }

    /* Overlay Styles */
    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
      z-index: 1000; /* Ensure the overlay is on top of other content */
    }

    .form-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff; /* White background */
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Box shadow for depth */
    }

    .form-container h2 {
      margin-bottom: 20px; /* Add space below the form title */
    }

    .form-container label {
      display: block; /* Display labels as block elements for better spacing */
      margin-bottom: 10px; /* Add space between labels and input fields */
    }

    .form-container input,
    .form-container select {
      width: 100%; /* Make input fields and select dropdowns fill the container */
      padding: 10px; /* Add padding to input fields */
      margin-bottom: 15px; /* Add space between input fields */
      border: 1px solid #ccc; /* Add border to input fields */
      border-radius: 4px; /* Add border radius for rounded corners */
      box-sizing: border-box; /* Include padding and border in element's total width and height */
    }

    .form-container button {
      width: 100%; /* Make the button fill the container */
      padding: 10px; /* Add padding to the button */
      background-color: #4CAF50; /* Green background color */
      color: white; /* White text color */
      border: none; /* Remove border */
      border-radius: 4px; /* Add border radius for rounded corners */
      cursor: pointer; /* Change cursor to pointer on hover */
    }

    /* Change button color on hover */
    .form-container button:hover {
      background-color: #45a049;
    }

    /* Call-to-Action Section Styles */
    .cta-container {
      width: 90%;
      margin: 0 auto;
    }

    .cta-content {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 230px;
      background-color: #fff; /* White background */
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Box shadow for depth */
    }

    h2 {
      font-size: 24px;
    }

    /* Container for displaying crop information */
    .crop-info-container {
      display: none;
      border: 1px solid #ccc;
      padding: 20px;
      margin-top: 20px;
      border-radius: 5px;
    }

    /* Image styling */
    .crop-image {
      max-width: 100%;
      height: auto;
      margin-bottom: 20px;
    }
    .crop-info-container {
  border: 1px solid #ccc;
  padding: 20px;
  margin-top: 20px;
  border-radius: 5px;
  margin-bottom: 30px;
  margin-left: 70px;
  width: 90%;
  background-color: #f9f9f9; /* Light gray background */
}

.crop-info-container h2 {
  font-size: 20px;
  margin-bottom: 10px;
}

.crop-info-container #cropInfo {
  font-size: 16px;
}

.crop-info-container #cropInfo strong {
  font-weight: bold;
}


  </style>

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
    <span class="title">CROP LIBRARY</span>
    <div class="search_ham"></div>
    <div class="search-bar">
      <input  type="text" class="search-bar" placeholder="Search...">
      <button  class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
      <div class="dropdown">
        <button class="dropbtn"><img src="images/hamburger_manu.png" alt=""></button>
        <div class="dropdown-content">
          <a href="my_garden.php">MY GARDEN</a>
          <a href="crop_library.php">CROP LIBRARY</a>
       <!--   <a href="garden_planner.php">GARDEN PLANNER</a>-->
          <a href="crop_cultivation_guide.php">CROP GUIDE</a>
          <a href="soil_analysis.php">SOIL ANALYSIS</a>
      <!--    <a href="WEATHER_MONITORING.php">WEATHER MONITORING</a>-->
          <a href="pest_management.php">PEST AND DISEASE MANAGEMENT</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Crop Form Overlay -->
  <div id="cropFormOverlay" class="overlay">
    <div class="form-container">
      <h2>Select Crop</h2>
      <form id="cropForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="cropName">Crop Name:</label>
        <select id="cropName" name="cropName" required>
          <option value="">Select Crop</option>
          <?php
// Include database configuration file
include 'config.php';

// Fetch plant names from the database
$sql = "SELECT plant_name FROM crop_library";
$result = mysqli_query($conn, $sql);

// Check if there are any records
if (mysqli_num_rows($result) > 0) {
    // Output options for the dropdown list
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['plant_name'] . '">' . $row['plant_name'] . '</option>';
    }
} else {
    echo '<option value="">No crops available</option>';
}

// Close the database connection
mysqli_close($conn);
?>

        </select>
        
        <button type="submit">View Crop Information</button>
        <button type="button" id="closeCropFormBtn">Close</button>
      </form>
    </div>
  </div>

  <!-- Container to display crop information -->
  <div id="cropInfoContainer" class="crop-info-container">
    <!-- Crop information will be displayed here -->
    <h2>Crop Information</h2>
    <div id="cropInfo">
      <?php
      if (isset($row['plant_name'])) {
        echo "<h1 style='display: flex; justify-content: center;'>" . $row['plant_name'] . "</h1>";
      }
      ?>
    </div>
  </div>
<!-- Container to display crop information -->
<div id="cropInfoContainer" class="crop-info-container" style="display: none;">
  <!-- Crop information will be displayed here -->
  <h2>Crop Information</h2>
  <div id="cropInfo"></div>
</div>
<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize selected crop name
    $cropName = isset($_POST["cropName"]) ? $_POST["cropName"] : '';

    // Fetch crop information from the database based on the selected crop name
    // You need to include your database connection configuration file here
    include 'config.php';

    // Query to fetch crop details based on crop name
    $sql = "SELECT * FROM crop_library WHERE plant_name = '$cropName'";
    $result = mysqli_query($conn, $sql);

    // Check if crop details are found
    if (mysqli_num_rows($result) > 0) {
        // Display crop details in the container
        $row = mysqli_fetch_assoc($result);
        echo "<script>";
        echo "document.getElementById('cropInfo').innerHTML = '<strong>Plant Name:</strong> " . $row['plant_name'] . "<br><strong>Varieties:</strong> " . $row['varieties'] . "<br><strong>Soil and Climate:</strong> " . $row['soil_and_climate'] . "<br><strong>Field Preparation:</strong> " . $row['field_preparation'] . "<br><strong>Irrigation:</strong> " . $row['irrigation'] . "';";
        echo "document.getElementById('cropInfoContainer').style.display = 'block';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Crop details not found!');";
        echo "</script>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

  <!-- Call-to-Action Section -->
  <section class="cta" id="ctaSection">
    <div class="cta-container">
      <div class="cta-content">
        <h2>Add Crop</h2>
        <div class="plant-icon">
          <img src="images/alocasia.png" alt="Plant Icon">
        </div>
      </div>
    </div>
  </section>

  <!-- JavaScript for overlay form -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var cropFormOverlay = document.getElementById('cropFormOverlay');
      var ctaSection = document.getElementById('ctaSection');

      // Show overlay form when page loads
      cropFormOverlay.style.display = 'none';

      // Button to open the form
      ctaSection.addEventListener('click', function() {
        cropFormOverlay.style.display = 'block';
      });

      // Button to close the form
      var closeCropFormBtn = document.getElementById('closeCropFormBtn');
      closeCropFormBtn.addEventListener('click', function() {
        cropFormOverlay.style.display = 'none';
      });
    });
  </script>

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
