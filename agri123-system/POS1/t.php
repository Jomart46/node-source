<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>fertilizer Management</title>
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
                    <a class="nav-link" href="/agrisystem/dash/dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="service.php">Main</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="invoice1.php">Print</a>
                </li>
                <!-- Add more navigation links as needed -->
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Fertilizer Expenses Report</h3>
                    </div>
                    <div class="card-body">
                        <form id="sale-fertilizer" action="code.php" method="POST">
                            <div class="mb-3" style="align-items: center;">
                                <input type="text" id="fertilizerType" name="fertilizerType" class="form-control" placeholder="Fertilizer Type">
                                <label for="fertilizerType">Fertilizer Type</label>
                            </div>
                            <div class="mb-3">
                                <input type="text" id="priceInput" name="priceInput" class="form-control" placeholder="Price">
                                <label for="priceInput">Price</label>
                            </div>
                            <div class="mb-3">
                                <input type="text" id="quantityInput" name="quantityInput" class="form-control" placeholder="Quantity">
                                <label for="quantityInput">Quantity</label>
                            </div>
                            <div class="mb-3">
                                <select id="unitSelect" name="unitSelect" class="form-select">
                                    <option value="pcs">pcs</option>
                                    <option value="box">box</option>
                                    <option value="kilo">kilo</option>
                                    <option value="sacks">sacks</option>
                                </select>
                                <label for="unitSelect">Unit</label>
                            </div>
                            <div class="mb-3">
                                <input type="date" id="dateInput" name="dateInput" class="form-control">
                                <label for="dateInput">Date</label>
                            </div>
                            <button type="submit" name="save_fertiizer" class="btn btn-primary" style="background: linear-gradient(40deg, #647685, #65cc60) !important;">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                <div class="col-md-6">
            <div class="input-group mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search by fertilizert type">
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const tableRows = document.querySelectorAll(".fertilizer-row");

        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.toLowerCase();

            tableRows.forEach(row => {
                const fertilizerType = row.querySelector(".fertilizer-type").textContent.toLowerCase();
                row.style.display = fertilizerType.includes(searchTerm) ? "" : "none";
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
                                        <th>Fertilizer Type</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Date</th>
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
                                        foreach($query_run as $fertilizer)
                                        {
                                            ?>
                                            <tr class="fertilizer-row">
                                                <td><?= $fertilizer['id']; ?></td>
                                                <td class="fertilizer-type"><?= $fertilizer['fertilizer_type']; ?></td>
                                                <td><?= $fertilizer['price']; ?></td>
                                                <td><?= $fertilizer['quantity'] . ' ' . $fertilizer['unit']; ?></td>
                                                <td><?= $fertilizer['total']; ?></td>
                                                <td><?= $fertilizer['date']; ?></td>
                                                <td>
                                                    <a href="?delete_id=<?= $fertilizer['id']; ?>" class="btn btn-danger">Delete</a>
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

    <div id="myModal" class="modal">
        <!-- Modal content here -->
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
        var fertilizerType = document.getElementById("fertilizerType").value;
        var priceInput = document.getElementById("priceInput");
        var quantityInput = document.getElementById("quantityInput");
        var unitSelect = document.getElementById("unitSelect"); // Get the unit select element

        var price = parseFloat(priceInput.value);
        var quantity = parseInt(quantityInput.value);
        var unit = unitSelect.value; // Get the selected unit
        var totalQuantity = price * quantity;

        var totalText = "Total: " + totalQuantity + " " + unit + " for " + fertilizerType;
        document.getElementById("totalQuantity").innerHTML = totalText;
    }


        function saveToDatabase() {
        var fertilizerType = document.getElementById("fertilizerType").value;
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
            "fertilizerType=" + fertilizerType +
            "&priceInput=" + price +
            "&quantityInput=" + quantity +
            "&unit=" + unit + // Send the unit to the server
            "&dateInput=" + dateInput.value
        );
    }
    </script>
</body>
</html>
