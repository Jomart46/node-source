<?php

require_once('dbcon.php');
// Retrieve the form data
$fertilizerType = isset($_POST['fertilizerType']) ? $_POST['fertilizerType'] : '';
$price = isset($_POST['priceInput']) ? floatval($_POST['priceInput']) : 0;
$quantity = isset($_POST['quantityInput']) ? intval($_POST['quantityInput']) : 0; // Convert quantity to integer
$unit = isset($_POST['unitSelect']) ? $_POST['unitSelect'] : ''; // Get the selected unit
$date = isset($_POST['dateInput']) ? $_POST['dateInput'] : '';

// Calculate the total quantity
$totalQuantity = $price * $quantity;

// Save the data to the database
if (!empty($fertilizerType) && $price != 0 && $quantity != 0 && !empty($date) && !empty($unit)) {
    $sql = "INSERT INTO fertilizer (fertilizer_type, price, quantity, unit, total, date) 
            VALUES ('$fertilizerType', '$price', '$quantity', '$unit', '$totalQuantity', '$date')";

    if (mysqli_query($con, $sql)) {
        mysqli_close($con);  // Close the database connection
        header("Location: t.php"); // Redirect to index page
        exit(); // Make sure to exit to prevent further execution
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);



?>
