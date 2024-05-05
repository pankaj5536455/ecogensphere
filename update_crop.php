<?php
// Include database configuration file
include 'config.php';

// Check if the ID parameter is set
if(isset($_GET['id'])) {
    // Sanitize the input
    $cropId = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch data from the database for detailed view
    $sql = "SELECT * FROM crop_library WHERE id = '$cropId'";
    $result = mysqli_query($conn, $sql);

    // Check if there are any records
    if (mysqli_num_rows($result) > 0) {
        // Fetch the data for the first row
        $row = mysqli_fetch_assoc($result);

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Update the database with the submitted data
            $updateData = [];
            foreach ($_POST as $key => $value) {
                $value = mysqli_real_escape_string($conn, $value);
                $updateData[] = "$key = '$value'";
            }
            $updateQuery = "UPDATE crop_library SET " . implode(', ', $updateData) . " WHERE id = '$cropId'";
            if(mysqli_query($conn, $updateQuery)) {
                // Redirect to the admin panel after successful update
                header("Location: admin.php");
                exit();
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Crop Details</title>
            <!-- Bootstrap core CSS -->
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="css/font-awesome.min.css">
            <!-- Your custom CSS styles -->
            <link rel="stylesheet" href="css/styles.css">
            <link rel="shortcut icon" href="images/favicon.ico" type="">
            <style>/* Reset default margin and padding */
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }

                /* Body styles */
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    color: #333;
                }

                /* Container styles */
                .container {
                    width: 90%;
                    margin: auto;
                    padding: 20px;
                }

                /* Heading styles */
                h1, h2, h3, h4, h5, h6 {
                    margin-bottom: 10px;
                }

                /* Form styles */
                form {
                    margin-top: 20px;
                }

                /* Form group styles */
                .form-group {
                    margin-bottom: 15px;
                }

                /* Label styles */
                label {
                    font-weight: bold;
                    display: block;
                    margin-bottom: 5px;
                }

                /* Input styles */
                input[type="text"],
                textarea {
                    width: 100%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }

                /* Button styles */
                button[type="submit"],
                a.btn {
                    display: inline-block;
                    padding: 10px 20px;
                    margin-right: 10px;
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    text-decoration: none;
                }

                /* Secondary button styles */
                a.btn-secondary {
                    background-color: #6c757d;
                }

                /* Button hover styles */
                button[type="submit"]:hover,
                a.btn:hover {
                    background-color: #0056b3;
                }

                /* Secondary button hover styles */
                a.btn-secondary:hover {
                    background-color: #545b62;
                }
            </style>
        </head>
        <body>

        <div class="container mt-4">
            <h2>Edit Crop Details</h2>
            <form action="" method="post">
                <?php
                // Loop through additional fields
                $additionalFields = [
                    'plant_name' => 'Plant Name',
                    'scientific_name' => 'Scientific Name',
                    'family' => 'Family',
                    'varieties' => 'Varieties',
                    'image' =>  'image',
                    'soil_and_climate' => 'Soil and Climate',
                    'planting_material' => 'Planting Material',
                    'field_preparation' => 'Field Preparation',
                    'irrigation' => 'Irrigation',
                    'manures_and_fertilizers' => 'Manures and Fertilizers',
                    'after_cultivation' => 'After Cultivation',
                    'intercropping' => 'Intercropping',
                    'harvest' => 'Harvest',
                    'yield' => 'Yield',
                    'pest_management' => 'Pest Management',
                    'planting' => 'Planting',
                    'spacing' => 'Spacing',
                    'canopy_management' => 'Canopy Management',
                    'top_working' => 'Top Working',
                    'growth_regulators' => 'Growth Regulators',
                    'off_season_crop_induction' => 'Off Season Crop Induction',
                    'Season_of_Planting' => 'Season of Planting',
                    'Application_of_Fertilizers' => 'Application of Fertilizers',
                    'Aftercultivation' => 'Aftercultivation',
                    'Micronutrients' => 'Micronutrients',
                    'Special_Practices' => 'Special Practices'
                ];
                // Loop through additional fields
                foreach ($additionalFields as $fieldName => $fieldLabel) {
                    echo '<div class="form-group">';
                    echo '<label for="' . $fieldName . '">' . $fieldLabel . ':</label>';
                    echo '<input type="text" class="form-control" id="' . $fieldName . '" name="' . $fieldName . '" value="' . $row[$fieldName] . '">';
                    echo '</div>';
                }
                ?>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="admin.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        </body>
        </html>
        <?php
    } else {
        echo "No data found";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "No ID provided";
}
?>
