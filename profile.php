<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit;
}

// Include your database connection file
include 'config.php';

// Fetch user data from the database based on their email
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, fetch and display their data
    $user = $result->fetch_assoc();
} else {
    // User not found, handle error
    echo "User not found.";
    exit;
}

// Function to update user's name in the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateName'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    // Update user's name in the database
    $updateSql = "UPDATE users SET f_name = '$firstName', l_name = '$lastName' WHERE email = '$email'";
    if ($conn->query($updateSql) === TRUE) {
        // Name updated successfully, reload the page
        header("Location: profile.php");
        exit;
    } else {
        echo "Error updating name: " . $conn->error;
    }
}

// Function to update user's profile photo in the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updatePhoto'])) {
    // Check if a file was uploaded
    if ($_FILES['file']['error'] === 0) {
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        // Check file type
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileExt, $allowedExtensions)) {
            // Generate a unique name for the file to prevent overwriting existing files
            $newFileName = uniqid('', true) . '.' . $fileExt;
            $fileDestination = 'uploads/' . $newFileName;

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                // Update user's profile image in the database
                $updateSql = "UPDATE users SET profile_image = '$fileDestination' WHERE email = '$email'";
                if ($conn->query($updateSql) === TRUE) {
                    // Image updated successfully, reload the page
                    header("Location: profile.php");
                    exit;
                } else {
                    echo "Error updating profile image: " . $conn->error;
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file type. Allowed extensions are jpg, jpeg, png, gif.";
        }
    } else {
        echo "Error uploading file.";
    }
}
// Check if a file was uploaded
if (isset($_FILES['photo'])) {
    $file = $_FILES['photo'];

    // Check if there was no error during the file upload
    if ($file['error'] === UPLOAD_ERR_OK) {
        // Define the directory where you want to save the uploaded images
        $uploadDirectory = 'uploads/';

        // Move the uploaded file to the specified directory
        $destination = $uploadDirectory . $file['name'];
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            // Image saved successfully
            echo 'Image saved successfully.';
        } else {
            // Error moving file
            echo 'Error moving file.';
        }
    } else {
        // Error during file upload
        echo 'Error during file upload: ' . $file['error'];
    }
}

// Close the database connection
$conn->close();
?>


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
  <link href="css/profile.css" rel="stylesheet" />

  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>
<body class="sub_page">
  <div class="overlay">    
    <!-- header section start -->
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
                  <a class="nav-link" href="index.php">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.php">Services</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="profile.php">profile<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                  </li>
              </ul>
            </div>
          </nav>
        </div>
    </header>
      <!-- header section end -->
      <!-- profile photo section -->
      <div class="title-section">
        <div class="title-header">
          <span class="title">Your Info</span>
          <span class="change-pw">Change password</span>
        </div>
      </div>
                  
        <div class="profile-section">
            <div class="top-section">
            <div class="image-area">
                  <?php
                  // Assuming $user['profile_photo'] contains the filename of the user's profile photo
                  $profileImage = !empty($user['profile_photo']) ? 'database/profile_photo/' . $user['profile_photo'] : 'images/default-user-photo.jpg';
                  ?>
                  <img src="<?php echo $profileImage; ?>" alt="Profile Picture" class="profile-picture">
              </div>
                <div class="profile-text">
                    <span>Personalize your account with a photo. Your profile photo will appear on apps and devices that use your Microsoft account.</span>
                    <button class="change-photo-button" onclick="displayModal()">Change photo</button>
                </div>
            </div>
            <div class="bottom-section">
                <label> Name</label>
                <?php
                if (!empty($user['f_name']) && !empty($user['l_name'])) {
                    echo '<span>' . $user['f_name'] . ' ' . $user['l_name'] . '</span>';
                }
                ?>
                <span> </span>
           <!--     <span class="edit-info" onclick="displayEdit()">Edit name</span>-->
            </div>
        </div>
              <!-- profile info section -->
              <div class="profile-section">
                <div class="info-header">
                    <span class="title">Profile Info</span>
             <!--       <span class="edit-info" onclick="displayprofileinfoform()">Edit profile Info</span>-->
                </div>
                <div class="info-item">
                    <label>Date of birth</label>
                    <span><?php echo $user['dob']; ?></span>
                    <p>Your date of birth is used for account safety settings.</p>
                </div>
                <div class="info-item">
                    <label>Country or region</label>
                    <span><?php echo $user['country']; ?></span>
                    <p>Your country and region are used for privacy settings</p>
                </div>
                <div class="info-item">
                    <label>Language</label>
                    <span><?php echo $user['language']; ?></span>
                    <p>Ask me before translating</p>
                </div>
                <div class="info-item">
                    <label>Regional Format</label>
                    <span><?php echo $user['regional_format']; ?></span>
                    <p>Indian standard time</p>
                </div>  
            </div>

      <!-- Account info section -->
          <div class="profile-section">
          <div class="info-header">
              <span class="title">Account Info</span>
  <!--            <span class="edit-info">Edit account Info</span> -->
          </div>
          <div class="info-item">
              <label>Email</label>
              <span><?php echo $user['email']; ?></span>
          </div>
          <div class="info-item">
              <label>Phone Number</label>
              <span><?php echo $user['phone_no']; ?></span>
          </div>
      </div>

            <!-- other account section -->
          <div class="profile-section">
            <div class="info-header">
              <span class="title">Other Linked Account</span>
          <!--    <span class="edit-info">Edit linked account</span>-->
            </div>
            <img src="#" alt="">
            <label>social media name</label>
           </div>
          </div>
      
          <div class="root-286">
              <div id="photoModal" class="modal">
                  <div class="info-header">
                      <h2 class="ttl1">Change photo</h2>
                      <div class="close-btn" onclick="hideForm()"><i class="fa fa-times"></i></div>
                  </div>
                  <div class="picker">
                      <div class="photo-container">
                          <img id="previewImage" src="images/default-user-photo.jpg" alt="User photo" class="user-photo">
                      </div>
                  </div>
                  <div class="info-render">
                      <div class="image_editor">
                          <input type="file" id="fileInput" name="photo" accept="image/*" onchange="previewImage(event)">
                          <button class="remove-button" onclick="removeImage()">Remove photo</button>
                      </div>
                  </div>
                  <div class="actions-right">
                      <button class="save-button" onclick="saveImage()">Save</button>
                      <button class="cancel-button" onclick="hideForm()">Cancel</button>
                  </div>
              </div>
          </div>

          <div class="root-286">
              <div id="editName" class="modal">
                  <div class="info-header">
                      <h2 class="ttl1">Edit Name</h2>
                      <div class="close-btn" onclick="hideeditform()"><i class="fa fa-times"></i></div>
                  </div>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <label class="text-label" for="firstName">First Name:</label><br/>
                      <input class="text-box" type="text" id="firstName" name="firstName" value="<?php echo $user['f_name']; ?>" required><br/>
                      <label class="text-label" for="lastName">Last Name:</label><br/>
                      <input class="text-box" type="text" id="lastName" name="lastName" value="<?php echo $user['l_name']; ?>"><br/>
                      <div class="actions-right">
                          <button class="save-button" type="submit" name="updateName">Save</button>
                          <button class="cancel-button" onclick="hideForm()">Cancel</button>
                      </div>
                  </form>
                </div>
            </div>

          <div class="root-286">
            <div id="editprofileinfo" class="modal">
              <div class="info-header">
                  <h2 class="ttl1">Edit profile info</h2>
                  <div class="close-btn" onclick="hideprofileinfoform()"><i class="fa fa-times"></i></div>
              </div>
              <form action="#" method="post">
                <div class="input-group">
                  <label for="date">Date of Birth</label>
                  <div class="date-input"> 
                    <select id="month" name="month" onchange="updateDays()"></select>
                    <select id="day" name="day"></select>
                    <select id="year" name="year"></select>
                  </div>
                </div>
                <div class="input-group">
                  <label for="country">Country or Region</label>
                  <div  class="country-input">
                  <select id="country" name="country">
                    <option value="" disabled selected>Select your country or region</option>
                    <option value="USA">United States</option>
                    <option value="UK">United Kingdom</option>
                    <option value="CA">Canada</option>
                    <!-- Add more options as needed -->
                  </select>
                  </div>
                </div>
                <div class="actions-right">
                  <button class="save-button" onclick="saveImage()">Save</button>
                  <button class="cancel-button" onclick="hideForm()">Cancel</button>
                </div>
              </form>
            </div>
          </div>
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

</body>
</html>