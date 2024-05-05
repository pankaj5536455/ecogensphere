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
  <link href="css/crop.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  
  <style>
  /* Styles for the div */

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
      <span class="title">CROP CULTIVATION GUIDES</span>
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

<!-- Div to display tomato information -->
<?php
// Database connection parameters
$servername = "localhost";
$username = "username";
$password = "password";
$database = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data
$sql = "SELECT * FROM crop_cultivation";

// Execute query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Display each aspect of cultivation
        echo "<h2>Tomato Information</h2>";
        echo "<p>Tomatoes are a widely cultivated vegetable crop known for their juicy, flavorful fruits. They are rich in vitamins and minerals, particularly vitamin C and potassium. Here are some key points about growing tomatoes:</p>";
        if (!empty($row['image'])) {
          echo '<img src="database/growth/ ' . $row['image'] . '" alt="" width="850" height="533"/>';
      } else {
          // Display a default image if image field is empty or null
          echo '<img src="database/plant_images/growth.gif" alt="" />';
      }
        echo "<ul>";
        echo "<li><strong>Site Selection:</strong> " . $row["site_selection"] . "</li>";
        echo "<li><strong>Planting:</strong> " . $row["planting"] . "</li>";
        echo "<li><strong>Watering:</strong> " . $row["watering"] . "</li>";
        echo "<li><strong>Fertilization:</strong> " . $row["fertilization"] . "</li>";
        echo "<li><strong>Pest and Disease Management:</strong> " . $row["pest_and_disease_management"] . "</li>";
        echo "<li><strong>Harvesting:</strong> " . $row["harvesting"] . "</li>";
        echo "</ul>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>

<div class="crop-info">
  <!-- Content inside the div -->
  <div class="crop-info-content">
    <!-- Image -->
    <h2>Tomato Information</h2>
    <p>
      Tomatoes are a widely cultivated vegetable crop known for their juicy, flavorful fruits. They are rich in vitamins and minerals, particularly vitamin C and potassium. Here are some key points about growing tomatoes:
    </p>
    <img src="database/growth/tomato-growth.png" alt="Tomato" width="850" height="533">
    
    <ul>
      <li><strong>Site Selection:</strong> Choose a sunny location with well-drained soil.</li>
      <li><strong>Planting:</strong> Start tomato seeds indoors or plant seedlings outdoors after the last frost.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist, but avoid overwatering to prevent root rot.</li>
      <li><strong>Fertilization:</strong> Use a balanced fertilizer to provide essential nutrients for healthy growth.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor plants for pests and diseases, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest tomatoes when they are fully ripe for the best flavor and texture.</li>
    </ul>
  </div>
</div>

<!-- Mango Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Mango Information</h2>
    <p>
      Mango is a tropical fruit known for its sweet and juicy taste. It is rich in vitamins A and C, as well as dietary fiber. Here are some key points about growing mangoes:
    </p>
    <img src="database/growth/mango-growth.png" alt="Mango" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a sunny location with well-drained soil.</li>
      <li><strong>Planting:</strong> Plant mango trees in spring or early summer, allowing enough space for them to grow.</li>
      <li><strong>Watering:</strong> Keep soil evenly moist, especially during dry periods, but avoid overwatering.</li>
      <li><strong>Fertilization:</strong> Apply a balanced fertilizer annually to promote healthy growth and fruit production.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor trees for pests such as aphids and diseases such as anthracnose, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest mangoes when they are fully ripe but still firm to the touch.</li>
    </ul>
  </div>
</div>

<!-- Banana Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Banana Information</h2>
    <p>
      Banana is a popular fruit known for its energy-boosting properties and high potassium content. It grows on large herbaceous plants and is consumed worldwide. Here are some key points about growing bananas:
    </p>
    <img src="database/growth/banana-growth.png" alt="Banana" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a warm, humid location protected from strong winds.</li>
      <li><strong>Planting:</strong> Plant banana rhizomes in well-drained, fertile soil, spacing them about 5-10 feet apart.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist but not waterlogged, especially during dry periods.</li>
      <li><strong>Fertilization:</strong> Apply a balanced fertilizer regularly to promote healthy growth and fruit production.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor plants for pests such as banana aphids and diseases such as Panama disease, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest bananas when they are fully ripe, usually when the fruit turns yellow and the peel begins to develop brown spots.</li>
    </ul>
  </div>
</div>

<!-- Acid Lime Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Acid Lime Information</h2>
    <p>
      Acid lime, also known as key lime or Mexican lime, is a citrus fruit with a tart flavor. It is commonly used in cooking, beverages, and as a garnish. Here are some key points about growing acid limes:
    </p>
    <img src="database/growth/Acid_lime-growth.png" alt="Acid Lime" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a sunny location with well-drained, slightly acidic soil.</li>
      <li><strong>Planting:</strong> Plant acid lime trees in spring or early summer, ensuring proper spacing between trees.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist but not waterlogged, especially during the fruiting season.</li>
      <li><strong>Fertilization:</strong> Apply a balanced fertilizer regularly to promote healthy growth and fruit production.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor trees for pests such as citrus psyllids and diseases such as citrus canker, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest acid limes when they are fully ripe, usually when they turn yellow or yellow-green in color.</li>
    </ul>
  </div>
</div>

<!-- Coconut Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Coconut Information</h2>
    <p>
      Coconut is a tropical fruit known for its versatile uses in cooking, beverages, and cosmetics. It grows on tall palm trees and provides nutritious coconut water and meat. Here are some key points about growing coconuts:
    </p>
    <img src="database/growth/coconut-growth.png" alt="Coconut" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a coastal area with sandy, well-drained soil and plenty of sunlight.</li>
      <li><strong>Planting:</strong> Plant coconut palms in holes dug in the ground, spacing them about 20-30 feet apart.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist, especially during dry periods, to promote healthy growth.</li>
      <li><strong>Fertilization:</strong> Apply a balanced fertilizer containing nitrogen, phosphorus, and potassium to encourage fruit production.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor palms for pests such as coconut beetles and diseases such as lethal yellowing, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest coconuts when they are mature, usually after about 12 months, by climbing the palm and cutting down the fruit.</li>
    </ul>
  </div>
</div>

<!-- Apple Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Apple Information</h2>
    <p>
      Apple is a popular fruit known for its crisp texture and sweet or tart flavor. It grows on deciduous trees and comes in a variety of colors and flavors. Here are some key points about growing apples:
    </p>
    <img src="database/growth/Apple-Growth.png" alt="Apple" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a sunny location with well-drained soil and good air circulation.</li>
      <li><strong>Planting:</strong> Plant apple trees in late winter or early spring, ensuring proper spacing between trees.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist, especially during dry periods and the fruiting season.</li>
      <li><strong>Fertilization:</strong> Apply a balanced fertilizer containing nitrogen, phosphorus, and potassium in early spring to promote healthy growth and fruit production.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor trees for pests such as apple maggots and diseases such as apple scab, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest apples when they are fully ripe, usually when the fruit color develops fully and they are easily twistable from the tree.</li>
    </ul>
  </div>
</div>

<!-- Rice Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Rice Information</h2>
    <p>
      Rice is a staple food crop grown in flooded fields known as paddies. It is a major source of calories for billions of people worldwide. Here are some key points about growing rice:
    </p>
    <img src="database/growth/rice-growth.png" alt="Rice" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a flat area with access to water for flooding the fields.</li>
      <li><strong>Planting:</strong> Sow rice seeds directly into flooded fields or transplant seedlings from nurseries.</li>
      <li><strong>Watering:</strong> Maintain a constant water level in the fields throughout the growing season, draining the water before harvesting.</li>
      <li><strong>Fertilization:</strong> Apply nitrogen-based fertilizers to flooded fields to promote healthy growth and grain production.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor fields for pests such as rice blast and diseases such as sheath blight, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest rice when the grains are fully ripe and the plants have turned golden brown, usually about 5-6 months after planting.</li>
    </ul>
  </div>
</div>

<!-- Wheat Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Wheat Information</h2>
    <p>
      Wheat is a cereal grain widely cultivated for its nutritious seeds, which are used to make flour for bread, pasta, and other food products. Here are some key points about growing wheat:
    </p>
    <img src="database/growth/wheat-growth.png" alt="Wheat" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a well-drained area with fertile soil and plenty of sunlight.</li>
      <li><strong>Planting:</strong> Sow wheat seeds directly into prepared soil in the fall for winter wheat or in the spring for spring wheat.</li>
      <li><strong>Watering:</strong> Provide supplemental irrigation if necessary to maintain soil moisture during critical growth stages.</li>
      <li><strong>Fertilization:</strong> Apply nitrogen-based fertilizers at planting time to promote healthy growth and grain development.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor fields for pests such as aphids and diseases such as rust, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest wheat when the grains are fully ripe and the plants have turned golden brown, usually about 2-3 months after flowering.</li>
    </ul>
  </div>
</div>

<!-- Sugarcane Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Sugarcane Information</h2>
    <p>
      Sugarcane is a tall, perennial grass cultivated for its sweet juice, which is used to produce sugar, ethanol, and other products. Here are some key points about growing sugarcane:
    </p>
    <img src="database/growth/sugarcane-growth.png" alt="Sugarcane" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a warm, tropical climate with well-drained soil and plenty of sunlight.</li>
      <li><strong>Planting:</strong> Plant sugarcane stalks or setts in rows, spacing them about 6-12 inches apart.</li>
      <li><strong>Watering:</strong> Maintain soil moisture during the growing season, especially during dry periods and the critical growth stages.</li>
      <li><strong>Fertilization:</strong> Apply nitrogen, phosphorus, and potassium fertilizers according to soil test recommendations to promote healthy growth and high sugar content.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor fields for pests such as sugarcane borers and diseases such as red rot, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest sugarcane when the stalks have reached maturity, usually about 12-18 months after planting, by cutting them close to the ground.</li>
    </ul>
  </div>
</div>

<!-- Potato Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Potato Information</h2>
    <p>
      Potato is a versatile root vegetable grown for its edible tubers, which are used in a wide variety of dishes. It is rich in carbohydrates, vitamins, and minerals. Here are some key points about growing potatoes:
    </p>
    <img src="database/growth/potato-growth.png" alt="Potato" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a well-drained, loose soil with plenty of sunlight.</li>
      <li><strong>Planting:</strong> Plant potato seed pieces or tubers in rows, spacing them about 12-18 inches apart.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist, especially during the critical growth stages and hot weather.</li>
      <li><strong>Fertilization:</strong> Apply a balanced fertilizer containing nitrogen, phosphorus, and potassium at planting time to promote healthy growth and tuber development.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor plants for pests such as potato beetles and diseases such as late blight, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest potatoes when the tops have died back and the tubers are mature, usually about 2-4 months after planting, by gently digging them out of the soil.</li>
    </ul>
  </div>
</div>

<!-- Onion Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Onion Information</h2>
    <p>
      Onion is a bulbous vegetable grown for its pungent flavor and culinary versatility. It is used in a wide range of dishes and cuisines worldwide. Here are some key points about growing onions:
    </p>
    <img src="database/growth/onion-growth.png" alt="Onion" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a sunny location with well-drained soil and good air circulation.</li>
      <li><strong>Planting:</strong> Plant onion sets or seedlings in rows, spacing them about 4-6 inches apart.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist, especially during the critical growth stages and dry periods.</li>
      <li><strong>Fertilization:</strong> Apply a balanced fertilizer containing nitrogen, phosphorus, and potassium at planting time to promote healthy growth and bulb development.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor plants for pests such as onion thrips and diseases such as onion downy mildew, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest onions when the tops have dried and fallen over, usually about 90-120 days after planting, by lifting them out of the soil and curing them in a dry, well-ventilated area.</li>
    </ul>
  </div>
</div>

<!-- Brinjal (Eggplant) Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Brinjal (Eggplant) Information</h2>
    <p>
      Brinjal, also known as eggplant or aubergine, is a warm-season vegetable grown for its edible fruits, which come in a variety of shapes, sizes, and colors. It is a staple ingredient in many cuisines worldwide. Here are some key points about growing brinjal:
    </p>
    <img src="database/growth/brinjal-growth.png" alt="Brinjal" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a sunny location with well-drained soil and good air circulation.</li>
      <li><strong>Planting:</strong> Plant brinjal seedlings in rows, spacing them about 18-24 inches apart.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist, especially during the critical growth stages and hot weather.</li>
      <li><strong>Fertilization:</strong> Apply a balanced fertilizer containing nitrogen, phosphorus, and potassium at planting time to promote healthy growth and fruit development.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor plants for pests such as eggplant flea beetles and diseases such as verticillium wilt, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest brinjal fruits when they are glossy and firm, usually about 60-80 days after planting, by cutting them from the plant with a sharp knife or pruners.</li>
    </ul>
  </div>
</div>

<!-- Cabbage Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Cabbage Information</h2>
    <p>
      Cabbage is a leafy vegetable grown for its dense, round heads of leaves. It is a versatile ingredient used in salads, coleslaw, stir-fries, and soups. Here are some key points about growing cabbage:
    </p>
    <img src="database/growth/cabbage-growth.png" alt="Cabbage" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a sunny location with well-drained, fertile soil.</li>
      <li><strong>Planting:</strong> Start cabbage seeds indoors or plant seedlings outdoors in early spring or late summer.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist, especially during the critical growth stages and hot weather.</li>
      <li><strong>Fertilization:</strong> Apply a balanced fertilizer containing nitrogen, phosphorus, and potassium at planting time to promote healthy growth and head formation.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor plants for pests such as cabbage worms and diseases such as black rot, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest cabbage heads when they are firm and solid, usually about 70-120 days after planting, by cutting them from the plant with a sharp knife or pruners.</li>
    </ul>
  </div>
</div>

<!-- Cauliflower Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Cauliflower Information</h2>
    <p>
      Cauliflower is a cool-season vegetable closely related to cabbage and broccoli. It is grown for its compact heads of undeveloped flower buds. Here are some key points about growing cauliflower:
    </p>
    <img src="database/growth/cauliflower-growth.png" alt="Cauliflower" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a sunny location with well-drained, fertile soil.</li>
      <li><strong>Planting:</strong> Start cauliflower seeds indoors or plant seedlings outdoors in early spring or late summer.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist, especially during the critical growth stages and hot weather.</li>
      <li><strong>Fertilization:</strong> Apply a balanced fertilizer containing nitrogen, phosphorus, and potassium at planting time to promote healthy growth and head formation.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor plants for pests such as cabbage loopers and diseases such as downy mildew, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest cauliflower heads when they are firm and compact, usually about 50-100 days after planting, by cutting them from the plant with a sharp knife or pruners.</li>
    </ul>
  </div>
</div>

<!-- Carrot Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Carrot Information</h2>
    <p>
      Carrot is a root vegetable grown for its sweet, crunchy taproot. It is rich in vitamins, especially vitamin A, and is used in salads, soups, and as a raw snack. Here are some key points about growing carrots:
    </p>
    <img src="database/growth/carrot-growth.png" alt="Carrot" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a sunny location with loose, well-drained soil free from rocks and debris.</li>
      <li><strong>Planting:</strong> Sow carrot seeds directly into prepared soil in early spring or late summer.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist, especially during the critical growth stages, to prevent the roots from becoming tough or woody.</li>
      <li><strong>Fertilization:</strong> Avoid using excessive nitrogen fertilizer, as it can cause forked or hairy roots.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor plants for pests such as carrot rust flies and diseases such as carrot leaf blight, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest carrots when they have reached the desired size and color, usually about 60-80 days after planting, by gently pulling them from the soil.</li>
    </ul>
  </div>
</div>

<!-- Spinach Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Spinach Information</h2>
    <p>
      Spinach is a leafy green vegetable known for its nutritional value and versatility in cooking. It is rich in vitamins, minerals, and antioxidants. Here are some key points about growing spinach:
    </p>
    <img src="database/growth/spinach-growth.png" alt="Spinach" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a partially shaded to sunny location with well-drained, fertile soil.</li>
      <li><strong>Planting:</strong> Sow spinach seeds directly into the soil in early spring or late summer, spacing them about 6 inches apart.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist, especially during the critical growth stages, to prevent the leaves from becoming bitter.</li>
      <li><strong>Fertilization:</strong> Apply a balanced fertilizer containing nitrogen, phosphorus, and potassium at planting time to promote healthy leaf growth.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor plants for pests such as leaf miners and diseases such as downy mildew, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest spinach leaves when they are young and tender, usually about 4-6 weeks after planting, by cutting them from the plant near the base.</li>
    </ul>
  </div>
</div>

<!-- Lettuce Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Lettuce Information</h2>
    <p>
      Lettuce is a leafy vegetable commonly used in salads, sandwiches, and wraps. It comes in various forms, including crisphead, romaine, and leaf lettuce. Here are some key points about growing lettuce:
    </p>
    <img src="database/growth/lettuce-growth.png" alt="Lettuce" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a partially shaded to sunny location with well-drained, fertile soil.</li>
      <li><strong>Planting:</strong> Sow lettuce seeds directly into the soil in early spring or late summer, spacing them according to the variety's recommendations.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist, especially during the critical growth stages, to prevent the leaves from becoming bitter or developing bolting.</li>
      <li><strong>Fertilization:</strong> Apply a balanced fertilizer containing nitrogen, phosphorus, and potassium at planting time to promote healthy leaf growth.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor plants for pests such as aphids and diseases such as lettuce mosaic virus, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest lettuce leaves when they reach the desired size and texture, usually about 4-6 weeks after planting, by cutting them from the plant near the base.</li>
    </ul>
  </div>
</div>

<!-- Radish Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Radish Information</h2>
    <p>
      Radish is a root vegetable known for its crisp texture and peppery flavor. It comes in various shapes, sizes, and colors. Here are some key points about growing radish:
    </p>
    <img src="database/growth/radish-growth.png" alt="Radish" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a sunny location with loose, well-drained soil.</li>
      <li><strong>Planting:</strong> Sow radish seeds directly into the soil in early spring or late summer, spacing them about 1-2 inches apart.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist, especially during the critical growth stages, to promote rapid root development.</li>
      <li><strong>Fertilization:</strong> Avoid using excessive nitrogen fertilizer, as it can cause radishes to develop lush foliage at the expense of root growth.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor plants for pests such as flea beetles and diseases such as damping-off, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest radishes when they reach the desired size and color, usually about 3-4 weeks after planting, by gently pulling them from the soil.</li>
    </ul>
  </div>
</div>

<!-- Broccoli Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Broccoli Information</h2>
    <p>
      Broccoli is a nutritious vegetable known for its dense, flowering heads and tender stalks. It belongs to the cabbage family and is rich in vitamins and minerals. Here are some key points about growing broccoli:
    </p>
    <img src="database/growth/broccoli-growth.png" alt="Broccoli" width="850" height="533">
    <ul>
      <li><strong>Site Selection:</strong> Choose a sunny location with well-drained, fertile soil.</li>
      <li><strong>Planting:</strong> Start broccoli seeds indoors or plant seedlings outdoors in early spring or late summer.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist, especially during the critical growth stages, to promote head formation.</li>
      <li><strong>Fertilization:</strong> Apply a balanced fertilizer containing nitrogen, phosphorus, and potassium at planting time to promote healthy growth and head development.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor plants for pests such as cabbage worms and diseases such as clubroot, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest broccoli heads when they are firm and tight, usually before the individual buds start to open, by cutting them from the plant with a sharp knife.</li>
    </ul>
  </div>
</div>

<!-- Chilli Information -->
<div class="crop-info">
  <div class="crop-info-content">
    <h2>Chilli Information</h2>
    <p>
      Chilli, also known as pepper or capsicum, is a spicy fruit used as a flavoring agent in various cuisines worldwide. It comes in different shapes, sizes, colors, and levels of spiciness. Here are some key points about growing chilli:
    </p>
    <img src="database/growth/chilli-growth.png" alt="Chilli" width="850" height="533">
    
    <ul>
      <li><strong>Site Selection:</strong> Choose a sunny location with well-drained, fertile soil.</li>
      <li><strong>Planting:</strong> Start chilli seeds indoors in early spring or late winter, or plant seedlings outdoors after the last frost date.</li>
      <li><strong>Watering:</strong> Keep soil consistently moist, especially during the flowering and fruiting stages, to prevent blossom drop.</li>
      <li><strong>Fertilization:</strong> Apply a balanced fertilizer containing nitrogen, phosphorus, and potassium at planting time to promote healthy growth and fruit production.</li>
      <li><strong>Pest and Disease Management:</strong> Monitor plants for pests such as aphids and diseases such as blossom end rot, and use appropriate control measures as needed.</li>
      <li><strong>Harvesting:</strong> Harvest chillies when they have reached the desired size and color, usually about 60-90 days after planting, by cutting them from the plant with scissors or pruning shears.</li>
    </ul>
  </div>
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

</html>