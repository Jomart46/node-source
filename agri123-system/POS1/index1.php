

    <?php
    require_once('dbcon.php');

    if (isset($_GET['id'])) {
        $product_id = mysqli_real_escape_string($con, $_GET['id']);

        // Perform the DELETE query
        $delete_query = "DELETE FROM product WHERE product_id = '$product_id'";
        $delete_result = mysqli_query($con, $delete_query);

        if ($delete_result) {
            header("Location: index.php"); // Redirect back to the product list
            exit();
        } else {
            echo "Error deleting product: " . mysqli_error($con);
        }
    }
    ?>


    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Quantity Calculator</title>
        <style>
            
        </style>
        <link rel="stylesheet" href="style.css"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h4>Agri Farm Assets and Monitoring System</h4>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Main</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="invoice1.php">Print</a>
                    </li>
                    <!-- Add more navigation links as needed -->
                </ul>
            </div>
        </nav>
        <div>
            <?php
            
            ?>  
        </div>
        <main>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Fertilizer Type</h3>
                            </div>
                            <div class="card-body">
                                <form id="sale-product" action="code.php" method="POST">
                                    <input type="text" id="productType" name="productType" placeholder="Fertilizer Type">
                                    <label for="productType">Fertilizer Type</label>
                                    <br>
                                    <input type="text" id="priceInput" name="priceInput" placeholder="Price">
                                    <label for="priceInput">Price</label>
                                    <br>
                                    
                                    <label for="quantityInput"></label><input type="text" id="quantityInput" name="quantityInput" placeholder="Quantity">
                                    <select id="unitSelect" name="unitSelect">
                                    <option value="pcs">pcs</option>
                                    <option value="box">box</option>
                                    <option value="kilo">kilo</option>
                                    <option value="sacks">sacks</option>
                                    </select>
                                    <label for="priceInput">Quantity</label>
                                    <br>
                                    <input type="date" id="dateInput" name="dateInput">
                                    <label for="dateInput">Date</label>
                                    <br>
                                    <button type="submit" name="save_product">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </main>
        <div id="myModal" class="modal">
            
            
        </div>

        <script>
        function openModal() {
            document.getElementById("myModal").style.display = "block";
            calculateTotal();
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        function calculateTotal() {
        var productType = document.getElementById("productType").value;
        var priceInput = document.getElementById("priceInput");
        var quantityInput = document.getElementById("quantityInput");
        var unitSelect = document.getElementById("unitSelect"); // Get the unit select element

        var price = parseFloat(priceInput.value);
        var quantity = parseInt(quantityInput.value);
        var unit = unitSelect.value; // Get the selected unit
        var totalQuantity = price * quantity;

        var totalText = "Total: " + totalQuantity + " " + unit + " for " + productType;
        document.getElementById("totalQuantity").innerHTML = totalText;
    }


        function saveToDatabase() {
        var productType = document.getElementById("productType").value;
        var priceInput = document.getElementById("priceInput");
        var quantityInput = document.getElementById("quantityInput");
        var dateInput = document.getElementById("dateInput");

        var price = parseFloat(priceInput.value);
        var quantity = parseInt(quantityInput.value);
        var totalQuantity = price * quantity;

        // Determine the unit based on the quantity value
        var unit = quantity === 1 ? "pc" : "pcs"; // You can adjust this logic based on your needs

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
                closeModal();
            }
        };
        xhttp.open("POST","code.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(
            "productType=" + productType +
            "&priceInput=" + price +
            "&quantityInput=" + quantity +
            "&unit=" + unit + // Send the unit to the server
            "&dateInput=" + dateInput.value
        );
    }
    </script>

    </html>



    <?php
        
        require  ('dbcon.php');
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Student CRUD</title>
    </head>
    <body>
    
        <div class="container mt-4">

            <!-- <?php include('message.php'); ?> -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="row">
        <div class="col-md-6">
            <div class="input-group mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search by product type">
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const tableRows = document.querySelectorAll(".product-row");

        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.toLowerCase();

            tableRows.forEach(row => {
                const productType = row.querySelector(".product-type").textContent.toLowerCase();
                row.style.display = productType.includes(searchTerm) ? "" : "none";
            });
        });
    });
    </script>
        <div class="table-header">
                    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>product_type</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>total</th>
                    <th>date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require_once('dbcon.php'); // Include the database connection

                    if (isset($_GET['delete_id'])) {
                        $delete_id = mysqli_real_escape_string($con, $_GET['delete_id']);

                        // Perform the DELETE query
                        $delete_query = "DELETE FROM fertilizer WHERE id = '$delete_id'";
                        $delete_result = mysqli_query($con, $delete_query);

                    
                    }

                    $query = "SELECT * FROM fertilizer";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $product)
                        {
                            ?>
                            <tr class="product-row">
                                <td><?= $product['id']; ?></td>
                                <td class="product-type"><?= $product['product_type']; ?></td>
                                <td><?= $product['price']; ?></td>
                                <td><?= $product['quantity'] . ' ' . $product['unit']; ?></td>
                                <td><?= $product['total']; ?></td>
                                <td><?= $product['date']; ?></td>
                                <td>
                                    <a href="?delete_id=<?= $product['id']; ?>" class="btn btn-danger">Delete</a>
                                    <!-- Add any other action buttons here -->
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        echo "<tr><td colspan='7'><h5> No Record Found </h5></td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
        </div>

                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
    </html>
