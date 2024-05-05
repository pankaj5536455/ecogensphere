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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

<!-- fonts style -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

<!--owl slider stylesheet -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

<!-- font awesome style -->
<link href="css/font-awesome.min.css" rel="stylesheet" />

<!-- Custom styles for this template -->
<link href="css/admin1.css" rel="stylesheet" />

<!-- responsive style -->
<link href="css/responsive.css" rel="stylesheet" />
    <title>Admin Dashboard</title>
 </head>

<body>
    <div class="navbar">
        <button class="openbtn" onclick="openNav()">☰ Open Sidebar</button>
    </div>
    <div class="sidebar" id="mySidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#" onclick="toggleSection('dashboard')">Dashboard</a>
        <a href="#" onclick="toggleSection('user')">User</a>
        <a href="#" onclick="toggleSection('admin')">Admin</a>
        <a href="#" onclick="toggleSection('home')">Home</a>
        <a href="#" onclick="toggleSection('about')">About</a>
        <a href="#" onclick="toggleSection('why')">Why</a>
        <a href="#" onclick="toggleSection('services'); toggleServices()">Services</a>
        <div id="servicesSubmenu" class="submenu" style="padding-left: 20px; display: none;">
            <a href="#" onclick="toggleSection('crop_library');">Crop Library</a>
            <a href="#"onclick="toggleSection('my_garden');">My Garden</a>
            <a href="#"onclick="toggleSection('garden_planner');">Garden Planner</a>
            <a href="#"onclick="toggleSection('pest_management');">Pest Management</a>
            <a href="#"onclick="toggleSection('soil_analysis');">Soil Management</a>
            <a href="#"onclick="toggleSection('Weather_monitoring');">Weather Management</a>
            <a href="#"onclick="toggleSection('crop_cultivation_guide');">Crop Culti. Management</a>
            <!-- Add more sub-section links as needed -->
        </div>
        <!-- Add more sections and sub-sections as needed -->
    </div>
    <div class="main-content" id="main">
        <div id="dashboardSection" style="display: none;">
            <h2>Dashboard</h2>
            <p>This is the dashboard section content.</p>
        </div>
        <div id="userSection" style="display: none;">
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

            
        </div>
        <div id="adminSection" style="display: none;">
            
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

        </div>
        <div id="homeSection" style="display: none;">
            <h2>Home</h2>
            <p>This is the home section content.</p>
        </div>
        <div id="aboutSection" style="display: none;">
            <h2>About</h2>
            <p>This is the about section content.</p>
        </div>
        <div id="whySection" style="display: none;">
            <h2>Why</h2>
            <p>This is the why section content.</p>
        </div>
        <div id="crop_library" style="display: none;">
        <div class="container mt-4">
    <h2>Crop Data Management</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Crop Name</th>
                    <th>Scientific Name</th>
                    <th>Family</th>
                    <th>Varieties</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch crop data from the database
                $query = "SELECT * FROM crop_library";
                $result = mysqli_query($conn, $query);

                // Check if there are any crops
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['plant_name'] . "</td>";
                        echo "<td>" . $row['scientific_name'] . "</td>";
                        echo "<td>" . $row['family'] . "</td>";
                        echo "<td>" . $row['varieties'] . "</td>";
                        // Additional fields
                        
                        echo "<td>";
                        echo "<td class='action-buttons'>";
                        echo "<a href='update_crop.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a>";
                        echo "<a href='delete_crop.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this crop?\");'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='" . (count($additionalFields) + 4) . "'>No crops found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

        </div>
        <div id="my_garden" style="display: none;">
            <h2>Home</h2>
            <p>my_garden</p>
        </div>
        <div id="pest_management" style="display: none;">
            <h2>Home</h2>
            <p>pest_management</p>
        </div>
        <div id="weather_monitoring" style="display: none;">
            <h2>Home</h2>
            <p>weather_monitoring</p>
        </div>
        <div id="soil_analysis" style="display: none;">
            <h2>Home</h2>
            <p>soil_analysis.</p>
        </div>
        <div id="crop_cultivation_guide" style="display: none;">
            <h2>Home</h2>
            <p>crop crop_cultivation_guide</p>
        </div>
        <div id="garden_planner" style="display: none;">
            <h2>Home</h2>
            <p>garden_planner</p>
        </div>
        <!-- Add more sections as needed -->
    </div>
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }
        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
        function toggleSection(sectionName) {
            // Hide previous section
            var previousSection = document.querySelector(".main-content > div[id$='Section']:not([style='display: none;'])");
            if (previousSection) {
                previousSection.style.display = "none";
            }

            // Show or hide selected section
            var section = document.getElementById(sectionName + "Section");
            if (section) {
                section.style.display = section.style.display === "none" ? "block" : "none";
            }

            // Hide submenus of other sections
            var submenus = document.querySelectorAll(".submenu");
            submenus.forEach(function(submenu) {
                if (submenu.id !== sectionName + "Submenu") {
                    submenu.style.display = "none";
                }
            });
        }

        function toggleServices() {
            var servicesSubmenu = document.getElementById("servicesSubmenu");
            if (servicesSubmenu) {
                servicesSubmenu.style.display = servicesSubmenu.style.display === "none" ? "block" : "none";
            }
        }
    </script>
</body>
</html>
