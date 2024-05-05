<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the index.php page (or any other appropriate page)
header("Location: index.php");
exit();
?>
