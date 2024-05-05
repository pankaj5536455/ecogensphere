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

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="css/auth.css" rel="stylesheet" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

</head>

<body background="images/bg.png">
    <div class="wrapper">
        <img class="disp" src="images/plaent2.png" alt="side-img" />
        <span class="icon-close">
            <img id="closeButton" src='images/cross-small.png' alt="close" onclick="closeAndRedirect()" />
        </span>
        <div class="form-box register">
            <h2>Register</h2>
            <?php
            // Check if form data is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Database connection parameters
                require_once 'config.php'; // Include database configuration file

                // Retrieve form data
                $full_name = $_POST['full_name'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Split full name into first name and last name
                $name_parts = explode(' ', $full_name);
                $f_name = $name_parts[0];
                $l_name = isset($name_parts[1]) ? $name_parts[1] : ''; // Check if last name exists

                // SQL query to insert user data into the database
                $sql = "INSERT INTO users (f_name, l_name, email, password) VALUES ('$f_name', '$l_name', '$email', '$password')";

                if ($conn->query($sql) === TRUE) {
                    // Registration successful, display the success message
                    echo "<script>console.log('Registration successful');</script>";
                    echo "<script>displaySuccessMessage();</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // Close the database connection
                $conn->close();
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="input-box">
                    <span class="icon">
                        <img src='images/user.png' alt="user" />
                    </span>
                    <input type="text" name="full_name" required />
                    <label>Full Name</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <img src='images/envelope.png' alt="mail" />
                    </span>
                    <input type="email" name="email" required />
                    <label id="email">Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <img src='images/lock.png' alt="lock" />
                    </span>
                    <input type="password" name="password" required />
                    <label id="password">Password </label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" required> I agree to the Terms & Conditions</label>
                </div>
                <button type="submit" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an account?
                        <a href='login.php' class="login-link">login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <!-- popup -->
    <div class="root-286">
        <div id="message" class="modal">
            <div class="success-message">
                Thank you for registering! Your account has been created successfully.
            </div>
        </div>
    </div>
    <!-- jQery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- custom js -->
    <script type="text/javascript" src="js/custom.js"></script>
    <!-- Google Map -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
</body>

</html>
