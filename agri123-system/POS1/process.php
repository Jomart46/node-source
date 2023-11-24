<?php
require_once('config.php');
?>

<?php
if(isset($_POST['crop_name']) && isset($_POST['crop_type']) && isset($_POST['planting_date']) && isset($_POST['harvest_date']) && isset($_POST['quantity']) && isset($_POST['unit_of_measure']) && isset($_POST['location']) && isset($_POST['current_value'])){
    $crop_name       = $_POST['crop_name'];
    $crop_type       = $_POST['crop_type'];
    $planting_date   = $_POST['planting_date'];
    $harvest_date    = $_POST['harvest_date'];
    $quantity        = $_POST['quantity'];
    $unit_of_measure = $_POST['unit_of_measure'];
    $location        = $_POST['location'];
    $current_value   = $_POST['current_value'];

    // rest of the code remains the same


    $sql = "INSERT INTO agri_farm_crops (crop_name, crop_type, planting_date, harvest_date, quantity, unit_of_measure, location, current_value) 
    VALUES(?,?,?,?,?,?,?,?)";

    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$crop_name, $crop_type, $planting_date, $harvest_date, $quantity, $unit_of_measure, $location, $current_value]);

    if($result){
        echo 'Successfully saved.';
    } else {
        echo 'There were errors while saving the data.';
    }
} else {
    //echo 'No data';
}
?>

<?php
if(isset($_POST['livestock_name']) && isset($_POST['livestock_type']) && isset($_POST['date_of_birth']) && isset($_POST['date_of_purchase']) && isset($_POST['quantity']) && isset($_POST['unit_of_measure']) && isset($_POST['location']) && isset($_POST['current_value'])){
    $livestock_name    = $_POST['livestock_name'];
    $livestock_type    = $_POST['livestock_type'];
    $date_of_birth     = $_POST['date_of_birth'];
    $date_of_purchase  = $_POST['date_of_purchase'];
    $quantity          = $_POST['quantity'];
    $unit_of_measure   = $_POST['unit_of_measure'];
    $location          = $_POST['location'];
    $current_value     = $_POST['current_value'];
    $date_of_harvest   = NULL; // define the variable with a default value

    $stmtinsert = $db->prepare("INSERT INTO agri_farm_livestock (livestock_name, livestock_type, date_of_birth, date_of_purchase,  quantity, unit_of_measure, location, current_value) 
        
            VALUES(\"$livestock_name\", \"$livestock_type\", \"$date_of_birth\", \"$date_of_purchase\", \"$quantity\", \"$unit_of_measure\", \"$location\", \"$current_value\")");

    $result = $stmtinsert->execute();

    if($result){
        echo 'Successfully saved.';
    } else {
        echo 'There were errors while saving the data.';
    }
} else {
    //echo 'No data';
}

?>

<?php
require_once('config.php');

if (isset($_POST['productType']) && isset($_POST['priceInput']) && isset($_POST['quantityInput'])) {
    $productType = $_POST['productType'];
    $price = $_POST['priceInput'];
    $quantity = $_POST['quantityInput'];
    $totalQuantity = $price * $quantity;

    // Save the data to the database
    $stmt = $db->prepare("INSERT INTO product_sales (product_type, price, quantity, total_quantity) VALUES (?, ?, ?, ?)");
    $result = $stmt->execute([$productType, $price, $quantity, $totalQuantity]);

    if ($result) {
        echo 'Quantity saved to the database!';
    } else {
        echo 'There were errors while saving the data.';
    }
} else {
    //echo 'No data received.';
}
?>
<?php
session_start();
require 'config.php';

// Initialize error message variable
$message = '';

if (isset($_GET['id'])) {
    $product_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM product WHERE id='$product_id' ";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $product = mysqli_fetch_array($query_run);

        // Check if the form is submitted
        if (isset($_POST['update_product'])) {
            // Retrieve form data
            $product_type = mysqli_real_escape_string($con, $_POST['product_type']);
            $price = mysqli_real_escape_string($con, $_POST['price']);
            $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
            $total = mysqli_real_escape_string($con, $_POST['total']);
            $date = mysqli_real_escape_string($con, $_POST['date']);

            // Check if required fields are empty
            if (empty($product_type) || empty($price) || empty($quantity) || empty($total) || empty($date)) {
                $message = 'One or more fields are empty. Please fill in all the required fields.';
            } else {
                // Perform the update operation here
                $update_query = "UPDATE product SET product_type='$product_type', price='$price', quantity='$quantity', total='$total', date='$date' WHERE id='$product_id'";
                $update_query_run = mysqli_query($con, $update_query);

                if ($update_query_run) {
                    $message = 'Product updated successfully.';
                } else {
                    $message = 'Error occurred while updating the product.';
                }
            }
        }
    }
}

// Check if delete button is clicked
if (isset($_POST['delete_product'])) {
    if (isset($_GET['id'])) {
        $product_id = mysqli_real_escape_string($con, $_GET['id']);
        // Perform the delete operation here
        $delete_query = "DELETE FROM product WHERE id='$product_id'";
        $delete_query_run = mysqli_query($con, $delete_query);

        if ($delete_query_run) {
            // Redirect to another page or display success message
            header("Location: index.php"); // Assuming "products.php" is the page where you want to redirect after successful deletion
            exit();
        } else {
            $message = 'Error occurred while deleting the product.';
        }
    }
}
?>

