<?php
// Include config.php to establish database connection
include 'config.php';

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if email and password are empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
    }
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($email_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM users WHERE email = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if email exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $email, $stored_password);
                    if ($stmt->fetch()) {
                        if ($password === $stored_password) {
                            // Password is correct, so start a new session and save the email to the session
                            session_start();
                            $_SESSION["email"] = $email;
                            $_SESSION["id"] = $id;
                            header("location: index.php");
                            exit();
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered is not valid.";
                        }
                    }
                } else {
                    // Display an error message if email doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
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
    <meta name="author" content="pankaj kumar" />
    <link rel="shortcut icon" href="images/favicon.ico" type="">

    <title> EcoGenSphere </title>
    <!-- fonts style -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <link href="css/auth.css" rel="stylesheet" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

</head>
<!-- body part start-->

<body background="images/bg.png">
    <div class="wrapper">
        <img class="disp" src="images/plaent2.png" alt="sid-img" />
        <span class="icon-close">
            <input type="image" src="images/cross-small.png" alt="cross" onclick="closeAndRedirect()" />
        </span>
        <div class="form-box login">
            <h2>Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="input-box">
                    <span class="icon">
                        <img src='images/envelope.png' alt="mail" />
                    </span>
                    <input type="email" id="email" name="email" required />
                    <label id="email">Email</label>
                    <span class="help-block"><?php echo $email_err; ?></span>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <img src='images/lock.png' alt="lock" />
                    </span>
                    <input type="password" id="password" name="password" required />
                    <label id="password">Password </label>
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="remember-forgot">
                    <label><input id="remember" type="checkbox">remember me</label>
                    <a href="Forget-password">Forget Password?</a>
                </div>
                <button type="submit" id="login" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account?
                        <a href='register.php' class="register-link">Register</a>
                    </p>
                </div>
                <div class="social-media-buttons">
                    <a href="#" class="facebook"><img src="images/facebook.png" alt="Facebook"></a>
                    <a href="#" class="google"><img src="images/google.png" alt="Google"></a>
                    <a href="#" class="twitter"><img src="images/twitter.png" alt="Twitter"></a>
                </div>
            </form>
        </div>
    </div>
    <!-- Popup -->
    <div class="root-286" id="popup">
        <div id="message" class="modal">
            <div class="success-message">
                <?php echo $email_err . " " . $password_err; ?>
            </div>
        </div>
    </div>
    <!-- jQery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- custom js -->
    <script type="text/javascript" src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
</body>

</html>
