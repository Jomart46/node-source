<?php
session_start();

$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "users";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; 
    
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = '$role'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['role'] = $row['role'];

       
        switch ($_SESSION['role']) {
            case 'admin':
                header('Location: dashboard.php');
                break;
            case 'subadmin':
                header('Location: dashboard.php');
                break;
            case 'IGP':
                header('Location: /agrisystem/POS1/service.php');
                break;
            case 'inventorycustodian':
                header('Location: inventory_page.php');
                break;
            default:
                echo "Invalid role";
                break;
        }
    } else {
        $error_message = "Invalid account"; 
        header('Location: login.php?error=' . urlencode($error_message)); 
        exit; 
    }
}


$conn->close();
?>
