<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include 'config.php';

    // Fetch form data
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $language = $_POST['language'];
    $country = $_POST['country'];

    // Handle file upload for profile photo
    $targetDir = "uploads/";
    $profilePhoto = basename($_FILES["profilePhoto"]["name"]);
    $targetFilePath = $targetDir . $profilePhoto;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profilePhoto"]["tmp_name"]);
    if($check !== false) {
        // Check file size
        if ($_FILES["profilePhoto"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        } else {
            // Allow certain file formats
            if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            } else {
                // Upload file to server
                if (move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $targetFilePath)) {
                    // Insert data into database
                    $sql = "INSERT INTO users (f_name, l_name, email, password, dob, phone_no, profile_photo, language, country) VALUES ('$firstName', '$lastName', '$email', '$password', '$dob', '$phone', '$profilePhoto', '$language', '$country')";
                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully.";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    } else {
        echo "File is not an image.";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Floating Popup</title>
<style>
/* Popup container */
.popup {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
}

/* Popup content */
.popup-content {
  background-color: #fefefe;
  margin: 10% auto; /* 10% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* Close button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* Style the form fields */
form {
  margin-top: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="date"],
input[type="tel"],
textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type="file"] {
  margin-top: 10px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}
</style>
</head>
<body>

<!-- The popup container -->
<div id="popup" class="popup">
  <!-- Popup content -->
  <div class="popup-content">
    <span class="close">&times;</span>
    <h2>User Registration</h2>
    <form action="submit.php" method="post" enctype="multipart/form-data" onsubmit="return checkForm()">
      <label for="fname">First Name:</label>
      <input type="text" id="fname" name="fname" required>

      <label for="lname">Last Name:</label>
      <input type="text" id="lname" name="lname" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="dob" required>

      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" required>

      <label for="profilePhoto">Profile Photo:</label>
      <input type="file" id="profilePhoto" name="profilePhoto" accept="image/*" required>

      <label for="language">Language:</label>
      <input type="text" id="language" name="language" required>

      <label for="country">Country:</label>
      <input type="text" id="country" name="country" required>

      <input type="submit" value="Submit">
    </form>
  </div>
</div>

<!-- Button to open the popup -->
<button id="openPopup">Open Popup</button>

<script>
// Get the popup
var popup = document.getElementById('popup');

// Get the button that opens the popup
var btn = document.getElementById("openPopup");

// Get the <span> element that closes the popup
var closeBtn = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the popup
btn.onclick = function() {
  popup.style.display = "block";
}

// When the user clicks on <span> (x), close the popup
closeBtn.onclick = function() {
  popup.style.display = "none";
}

// When the user clicks anywhere outside of the popup, close it
window.onclick = function(event) {
  if (event.target == popup) {
    popup.style.display = "none";
  }
}

// Function to check if any required field is empty
function checkForm() {
    var requiredFields = document.querySelectorAll('input[required], select[required]');
    var missingFields = [];

    requiredFields.forEach(function(field) {
        if (!field.value.trim()) {
            missingFields.push(field.previousElementSibling.textContent.replace(':', ''));
        }
    });

    if (missingFields.length > 0) {
        alert("Some required information is missing:\n" + missingFields.join('\n') + "\n\nPlease fill in all the required fields.");
        return false; // Cancel form submission
    }

    return true; // Proceed with form submission
}
</script>

</body>
</html>
