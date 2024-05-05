<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico" type="">

    <title> EcoGenSphere </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Owl Carousel stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">

    <style>
        @media screen and (max-width: 768px) {
        .book {
            flex-direction: column;
            align-items: center;
            height: auto;
        }

        .title, .detail-container, .view-btn {
            width: 100%;
            text-align: center;
            margin-right: 0;
        }

        .details {
            align-items: center;
        }
}
    </style>
    <!-- Responsive styles -->
    <link href="css/responsive.css" rel="stylesheet">
</head>

<body class="sub_page">

    <div class="hero_area">
        <div class="hero_bg_box">
            <div class="bg_img_box">
                <img src="images/hero-bg.png" alt="">
            </div>
        </div>

        <!-- Header section -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="service.php">
                        <span>EcoGenSphere</span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  ">
                            <li class="nav-item ">
                                <a class="nav-link" href="service.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="service.php">Services <span class="sr-only">(current)</span></a>
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

    <!-- End header section -->

    <!-- Sub header section -->
    <div class="sub_header_section">
        <span class="title">CROP LIBRARY</span>
        <div class="search_ham"></div>
        <div class="search-bar">
            <div class="dropdown">
                <ul id="searchResults"></ul>
            </div>

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
    <!-- End sub header section -->

    <!-- Crop library section -->
    <div class="root-1">
        <?php
        // Include database configuration file
        include 'config.php';

        // Function to handle database errors
        function handleDatabaseError($conn, $message)
        {
            // Close the database connection
            mysqli_close($conn);
            // Output error message
            echo "<p>Error: " . $message . "</p>";
        }

        // Check if search query is set
        if (isset($_GET['search'])) {
            // Get the search query
            $search = mysqli_real_escape_string($conn, $_GET['search']);

            // Prepare and execute the SQL statement
            $stmt = mysqli_prepare($conn, "SELECT id, plant_name, scientific_name, family, IFNULL(varieties, '') AS varieties, image FROM crop_library WHERE plant_name LIKE ? OR scientific_name LIKE ? OR family LIKE ? OR varieties LIKE ?");
            mysqli_stmt_bind_param($stmt, "ssss", $searchParam, $searchParam, $searchParam, $searchParam);
            $searchParam = '%' . $search . '%';
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // Check for database errors
            if (!$result) {
                handleDatabaseError($conn, "Failed to fetch data from the database");
                exit();
            }
        } else {
            // Execute default SQL statement
            $result = mysqli_query($conn, "SELECT id, plant_name, scientific_name, family, IFNULL(varieties, '') AS varieties, image FROM crop_library");

            // Check for database errors
            if (!$result) {
                handleDatabaseError($conn, "Failed to fetch data from the database");
                exit();
            }
        }

        // Check if there are any records
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row of data
            while ($row = mysqli_fetch_assoc($result)) {
                // Output HTML structure for each crop
                echo '<div class="book">';
                echo '<div class="sub-book">';
                echo '<div class="image-area1">';
                // Check if image field is empty or null
                if (!empty($row['image'])) {
                    echo '<img src="database/plant_images/' . $row['image'] . '" alt="" />';
                } else {
                    // Display a default image if image field is empty or null
                    echo '<img src="database/plant_images/growth.gif" alt="" />';
                }
                echo '</div>';
                echo '<span class="name">' . $row['plant_name'] . '</span>';
                echo '</div>';
                echo '<div class="detail-container">';
                echo '<ul>';
                echo '<li><strong>Scientific Name:</strong> ' . $row['scientific_name'] . '</li>';
                echo '<li><strong>Family:</strong> ' . $row['family'] . '</li>';
                // Extract first 3 varieties from the list
                $varieties = explode(',', $row['varieties']);
                $varieties = array_slice($varieties, 0, 3); // Get first 3 elements
                echo '<li><strong>Variety:</strong> ' . implode(', ', $varieties) . '</li>';
                echo '</ul>';
                echo '</div>';
                echo '<div class="button">';
                // Pass the crop ID to the JavaScript function showViewSection() when the button is clicked
                echo '<button class="view-btn" onclick="showViewSection(' . $row['id'] . ')">view more</button>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "No crops found";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
    <!-- End crop library section -->

    <!-- Detailed view section -->
    <div class="overlay" id="overlay"></div>
    <div class="view-section-overlay" id="view-section-overlay"></div>
    <!-- End detailed view section -->

    <!-- Footer section -->
    <!-- Chat.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- Bootstrap.js -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- Owl Slider -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Custom JavaScript -->
    <script type="text/javascript" src="custom.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <!-- Google Map -->
</body>

</html>
