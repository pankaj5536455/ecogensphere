<?php
session_start();

// Include database configuration file
include 'config.php';

// Fetch regular users from the database
$users_query = "SELECT * FROM users WHERE role = 'user'";
$users_result = mysqli_query($conn, $users_query);

$users = array();
while($user_row = mysqli_fetch_assoc($users_result)) {
    $users[] = $user_row;
}

// Fetch admin users from the database
$admins_query = "SELECT * FROM users WHERE role = 'admin'";
$admins_result = mysqli_query($conn, $admins_query);

$admins = array();
while($admin_row = mysqli_fetch_assoc($admins_result)) {
    $admins[] = $admin_row;
}
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
  <link href="css/admin.css" rel="stylesheet" />
  
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">EcoGenSphere Admin</a> 
        <a class="nav-link" href="index.php">Home</a>
        <a class="btn btn-success mr-3" href="logout.php"><i class="fa fa-sign-in"></i>&nbsp;Log Out</a></div>
    </nav>
    <!-- Main Content Area -->
    <div class="side-menu">
      <a herf=""> </a>
    </div>

    
    <!-- User Management Table -->
    <div class="container mt-4">
        <h2>User Management</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['f_name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <a href='delete_user.php?id=<?php echo $user['id']; ?>'>Delete</a> | 
                            <a href='make_admin.php?id=<?php echo $user['id']; ?>'>Make Admin</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Admin Management Table -->
    <div class="container mt-4">
        <h2>Admin Management</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $admin): ?>
                    <tr>
                        <td><?php echo $admin['f_name']; ?></td>
                        <td><?php echo $admin['email']; ?></td>
                        <td>
                            <a href='remove_admin.php?id=<?php echo $admin['id']; ?>'>Remove as Admin</a> | 
                            <a href='delete_user.php?id=<?php echo $admin['id']; ?>'>Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table table-bordered">
                <h2> Crop Data Management</h2>
                <thead>
                    <tr>
                        <th>Crop Name</th>
                        <th>Scientific Name</th>
                        <th>Family</th>
                        <th>Varieties</th>
                        <?php
                        // Additional fields
                        $additionalFields = ['image','soil_and_climate', 'planting_material', 'field_preparation', 'irrigation', 'manures_and_fertilizers', 'after_cultivation', 'intercropping', 'harvest', 'yield', 'pest_management', 'planting', 'spacing', 'canopy_management', 'top_working', 'growth_regulators', 'off_season_crop_induction', 'Season_of_Planting', 'Application_of_Fertilizers', 'Aftercultivation', 'Micronutrients', 'Special_Practices'];
                        foreach ($additionalFields as $field) {
                            echo "<th>" . ucwords(str_replace('_', ' ', $field)) . "</th>";
                        }
                        ?>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include database configuration file
                    include 'config.php';

                    // Fetch crop data from the database
                    $query = "SELECT * FROM crop_library";
                    $result = mysqli_query($conn, $query);

                    // Check if there are any crops
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$row['plant_name']."</td>";
                            echo "<td>".$row['scientific_name']."</td>";
                            echo "<td>".$row['family']."</td>";
                            echo "<td>".$row['varieties']."</td>";
                            // Additional fields
                            foreach ($additionalFields as $field) {
                                echo "<td>".$row[$field]."</td>";
                            }
                            echo "<td>";
                            echo "<a href='update_crop.php?id=".$row['id']."' class='btn btn-primary'>Edit</a>";
                            echo "<a href='delete_crop.php?id=".$row['id']."' class='btn btn-danger ml-2' onclick='return confirm(\"Are you sure you want to delete this crop?\");'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='".(count($additionalFields)+5)."'>No crops found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
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
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>

</body>

</html>