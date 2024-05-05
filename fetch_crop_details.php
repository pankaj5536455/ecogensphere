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
        ?>
        <div class="info-header">
            <h2 class="ttl2">planting information:</h2>
            <div class="close-btn" onclick="hideViewSection()"><i class="fa fa-times"></i></div>
        </div>
        <div class="image-frame">
            <?php
            // Check if the image URL exists and is not empty
            if (!empty($row['image'])) {
                // Use the image URL from the database
                echo '<img src="database/plant_images/' . htmlspecialchars($row['image']) . '" alt="Image of ' . htmlspecialchars($row['plant_name']) . '">';
            } else {
                // Default image if no URL is provided
                echo '<img src="database/plant_images/growth.gif" alt="Default growth image">';
            }
            ?>
        </div>

            <h1 style="display: flex; justify-content: center;"><?php echo $row['plant_name']; ?></h1>
            <h2>Scientific Name: <?php echo $row['scientific_name']; ?></h2>
            <h3>Family: <?php echo $row['family']; ?></h3>
            <h4>Varieties</h4>
            <ul>
                <?php
                // Output varieties
                $varieties = explode(',', $row['varieties']);
                foreach ($varieties as $variety) {
                    echo '<li>' . trim($variety) . '</li>';
                }
                ?>
            </ul>
            <div class="plant-info-bio">
                <div class="additional-info">
                    <h1><span>Additional Information</span> </h1>
                    <!-- Output additional crop information -->
                    <?php
                    $additionalFields = ['soil_and_climate', 'planting_material', 'field_preparation', 'irrigation', 'manures_and_fertilizers', 'after_cultivation', 'intercropping', 'harvest', 'yield', 'pest_management', 'planting', 'spacing', 'canopy_management', 'top_working', 'growth_regulators', 'off_season_crop_induction', 'Season_of_Planting', 'Application_of_Fertilizers', 'Aftercultivation', 'Micronutrients', 'Special_Practices'];
                    foreach ($additionalFields as $field) {
                        echo '<h2>' . ucwords(str_replace('_', ' ', $field)) . '</h2>';
                        echo '<p>' . $row[$field] . '</p>';
                    }
                    ?>
                </div>
            </div>
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
