<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";


$errors = array(); 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['reg_p'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $date = mysqli_real_escape_string($conn,$_POST['date']);
  $location = mysqli_real_escape_string($conn,$_POST['location']);
  $buyername = mysqli_real_escape_string($conn,$_POST['buyername']);
  $phone = mysqli_real_escape_string($conn,$_POST['phone']);
  // $email = mysqli_real_escape_string($conn,$_POST['email']);
  $service_name = $_POST['service_name'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $total = $_POST['total'];


 
 if(count($errors) == 0){
  $user_check_query = "SELECT * FROM buyers WHERE Cust_mobile ='$phone' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Cust_mobile'] === $phone) {
      array_push($errors, "Phone number already exists");
    }
  }
}

      if (count($errors) == 0){
            // Check connection
            if ($conn->connect_error) {
                    array_push($errors, $conn->connect_error);
            } 
      
            $sql = "INSERT INTO buyers (product_name, date, location, buyername ,Cust_mobile)
            VALUES ('$name','$date','$location', '$buyername' , '$phone')";
      
            if ($conn->query($sql) === TRUE) {
                $cust_id = $conn->insert_id;
      if (is_array($quantity)) {
    for ($i = 0; $i < count($quantity); $i++) {
        $sql = "INSERT INTO orders ( order_name, quantity, unit_price, cust_id) VALUES ( '$service_name[$i]', '$quantity[$i]', '$price[$i]', '$cust_id')";
        $conn->query($sql);
    }
    header("Location: service.php");
} else {
    $sql = "INSERT INTO  ( order_name, quantity, unit_price, cust_id) VALUES ( '$service_name', '$quantity', '$price', '$cust_id')";
    if ($conn->query($sql) === TRUE) {
        header("Location: service.php");
    } else {
        array_push($errors, $conn->error);
    }
}

              }
            } else {
                array_push($errors, $conn->error); 

            }
      }


$conn->close();
?>

<?php

$con = mysqli_connect("localhost","root","","users");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

?>