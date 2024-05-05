<?php
// Include database configuration file
include 'config.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $plant_name = mysqli_real_escape_string($conn, $_POST['plant_name']);
    $scientific_name = mysqli_real_escape_string($conn, $_POST['scientific_name']);
    $family = mysqli_real_escape_string($conn, $_POST['family']);
    $varieties = mysqli_real_escape_string($conn, $_POST['varieties']);
    // Sanitize and validate additional fields
    $additionalFields = [
        'image', 'soil_and_climate', 'planting_material', 'field_preparation', 'irrigation',
        'manures_and_fertilizers', 'after_cultivation', 'intercropping', 'harvest', 'yield',
        'pest_management', 'planting', 'spacing', 'canopy_management', 'top_working', 'growth_regulators',
        'off_season_crop_induction', 'Season_of_Planting', 'Application_of_Fertilizers', 'Aftercultivation',
        'Micronutrients', 'Special_Practices'
    ];
    $additionalData = [];
    foreach ($additionalFields as $fieldName) {
        if (isset($_POST[$fieldName])) {
            $additionalData[$fieldName] = mysqli_real_escape_string($conn, $_POST[$fieldName]);
        }
    }

    // Insert data into the database
    $insertQuery = "INSERT INTO crop_library (plant_name, scientific_name, family, varieties";
    $insertValues = "VALUES ('$plant_name', '$scientific_name', '$family', '$varieties'";
    foreach ($additionalData as $fieldName => $fieldValue) {
        $insertQuery .= ", $fieldName";
        $insertValues .= ", '$fieldValue'";
    }
    $insertQuery .= ") " . $insertValues . ")";
    
    if(mysqli_query($conn, $insertQuery)) {
        // Redirect to the admin panel after successful insert
        header("Location: admin.php");
        exit();
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Crop Data</title>
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
        <h2>Add New Crop Data</h2>
        <form action="" method="post">
            <!-- Input fields for new crop data -->
            <div class="form-group">
                <label for="plant_name">Crop Name:</label>
                <input type="text" class="form-control" id="plant_name" name="plant_name" required>
            </div>
            <div class="form-group">
                <label for="scientific_name">Scientific Name:</label>
                <input type="text" class="form-control" id="scientific_name" name="scientific_name" required>
            </div>
            <div class="form-group">
                <label for="family">Family:</label>
                <input type="text" class="form-control" id="family" name="family" required>
            </div>
            <div class="form-group">
                <label for="varieties">Varieties:</label>
                <input type="text" class="form-control" id="varieties" name="varieties" required>
            </div>
            <!-- Additional fields -->
            <?php foreach ($additionalFields as $fieldName => $fieldLabel) : ?>
                <div class="form-group">
                    <label for="<?php echo $fieldName; ?>"><?php echo $fieldLabel; ?>:</label>
                    <input type="text" class="form-control" id="<?php echo $fieldName; ?>" name="<?php echo $fieldName; ?>" required>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
