<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <link rel="stylesheet" href="dash1.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    
    .font-family-karla {
        font-family: 'Karla', sans-serif;
    }
    
    .bg-sidebar {
        background: linear-gradient(40deg, #647685, #65cc60) !important;
    }
    
    .cta-btn {
        color: #3d68ff;
    }
    
    .upgrade-btn {
        background: #3d68ff;
    }
    
    .upgrade-btn:hover {
        background: #0038fd;
    }
    
    .active-nav-link,
    .nav-item:hover {
        background: #3d68ff;
    }
    
    .account-link:hover {
        background: #ffffff;
        color: #3d68ff;
    }
    
    header {background: linear-gradient(40deg, #647685, #65cc60) !important;
    }
    
</style>
<link rel="stylesheet" href="styles.css">
    <header ></header>
</head>
<body class="bg-gray-100 font-family-karla flex">

<?php if ($_SESSION['role'] == 'admin') {?>

<?php }else { ?>



    <!-- adsdsadasdsaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd -->

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <img src="logo2.png" alt="Logo" class="w-40 h-40 mr-3">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-blue-300" style="text-align: center;">
              
                            Admin</a>

            <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button>
        </div>
       <nav class="text-white text-base font-semibold pt-3 h-64" >
  <a href="index.html" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
    <i class="fas fa-tachometer-alt mr-3"></i>
    Dashboard
  </a>

 
   <a href="crops.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
    <i class="fas fa-seedling mr-3"></i>
    crops
  </a>
  <a href="indexassets.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item btn btn-primary">
    <i class="fas fa-dollar-sign mr-3"></i>
    Assets
</a>
<a href="crops.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item btn btn-primary">
    <i class="fas fa-archive mr-3"></i>
    Inventory
</a>

<a href="/POS/service.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
    <i class="fas fa-align-left mr-3"></i>
    Sales
  </a>

  
</nav>

        
    </aside>
    <!-- adsdsadasdsaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd -->



    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-blue-500 py-2 px-6 hidden sm:flex">
    <div class="w-1/2" style="color: yellow; font-size: 27px;">AGRI-FARM ASSETS AND MONITORING SYSTEM</div>

    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
    <div class="text-white mr-4">
                <p>Harvest Date: July 30, 2023</p>
                <p>Location: Farm Field A</p>
            </div>

        <div class="relative">
            <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                <!-- Replace 'fa-bell' with the Font Awesome icon class you want to use -->
                <i class="fas fa-bell text-xl"></i>
            </button>
            <!-- Your notification badge or indicator can be added here if desired -->
        </div>
        <br>
        <!-- Log Out Button -->
        <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img src="logo.jpg" alt="Logo" class="w-10 h-10 mr-3">
        </button>


        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute w-32 bg-blue-500 rounded-lg shadow-lg py-2 mt-16">
            <a href="#" class="block px-4 py-2 account-link text-yellow-500 hover:text-white">Account</a>
            <a href="#" class="block px-4 py-2 account-link text-yellow-500 hover:text-white">Support</a>
            <a href="logout.php" class="block px-4 py-2 account-link text-yellow-500 hover:text-white">Sign Out</a>
        </div>
    </div>

     <!-- Notification Icon (on the right side) -->

</header>


<script>
        function checkHarvestDate() {
            // Replace these with the actual harvest date and location
            const harvestDate = new Date('2023-07-30');
            const location = 'Farm Field A';

            const currentDate = new Date();

            if (currentDate.toDateString() === harvestDate.toDateString()) {
                // Harvest day! Add your notification logic here.
                alert(`Today is the harvest day at ${location}!`);
            }
        }
    </script>


        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
  <div class="flex items-center justify-between">
    <div class="flex items-center">
      <img src="logo.jpg" alt="Logo" class="mr-3 h-8">
      <a href="index.html" class="text-white text-3x3 font-semibold uppercase hover:text-blue-300" style="text-align: center;">Admins</a>
    </div>
    <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
      <i x-show="!isOpen" class="fas fa-bars"></i>
      <i x-show="isOpen" class="fas fa-times"></i>
    </button>
  </div>

  <!-- Dropdown Nav -->
  <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4 h-20">

    <a href="index.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
      <i class="fas fa-tachometer-alt mr-3"></i>
      Dashboard
    </a>






        <h5 class="modal-title">Add Graduate</h5>


    <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
      <i class="fas fa-table mr-3"></i>
      Agricultural Product
    </a>






    <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
      <i class="fas fa-align-left mr-3"></i>
      Forms
    </a>
    <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
      <i class="fas fa-tablet-alt mr-3"></i>
      Tabbed Content
    </a>
    <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
      <i class="fas fa-calendar mr-3"></i>
      Calendar
    </a>
    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
      <i class="fas fa-cogs mr-3"></i>
      Support
    </a>
    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
      <i class="fas fa-user mr-3"></i>
      My Account
    </a>
    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
      <i class="fas fa-sign-out-alt mr-3"></i>
      Sign Out
    </a>
  </nav>
  <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
      <i class="fas fa-plus mr-3"></i> New Report
  </button> -->
</header>

   <div class="w-full border-t flex flex-col">
    <main class="w-full flex-grow p-6"> 

        <div class="flex flex-wrap -mx-4">
            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-4 mb-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="text-xl font-bold mb-4">Form 1</div>
                    <div class="text-3xl font-semibold text-blue-500">Total: 100</div>
                </div>
                
      
            </div>

            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-4 mb-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="text-xl font-bold mb-4">Form 2</div>
                    <div class="text-3xl font-semibold text-blue-500">Total: 200</div>
                </div>
            </div>

            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-4 mb-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="text-xl font-bold mb-4">Form 3</div>
                    <div class="text-3xl font-semibold text-blue-500">Total: 150</div>
                </div>
            </div>

            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-4 mb-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="text-xl font-bold mb-4">Form 4</div>
                    <div class="text-3xl font-semibold text-blue-500">Total: 120</div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    var grapsElements = document.querySelectorAll('.rounded-lg');
    grapsElements.forEach(function(element) {
        element.style.borderRadius = '10px';
    });
</script>

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div class="flex flex-wrap mt-6">
                    <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="fas fa-plus mr-3"></i> Monthly Reports
                        </p>
                        <div class="p-6 bg-white">
                            <canvas id="chartOne" width="450" height="250"></canvas>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="fas fa-check mr-3"></i> Resolved Reports
                        </p>
                        <div class="p-6 bg-white">
                            <canvas id="chartTwo" width="450" height="250"></canvas>
                        </div>
                    </div>
                </div>
        <div class="flex flex-wrap mt-6 justify-center">
            <div class="w-full lg:w-2/3 pr-0 lg:pr-2 h-96">
                <p class="text-xl pb-3 flex items-center">
                 <div class="w-full mt-12">
      <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Latest Reports
      </p>

      <div class="bg-white overflow-auto">
    
      

      </div>

      


      
    </div>
                </p>
                <div class="p-6 bg-white">
                    
            <!-- Example DataTables Card-->
            <div class="card mb-3">
               <div class="card-header">
                  <i class="fa fa-table"></i> User Table
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Buyerssss</th>
                              <th>Address</th>
                              <th>Mobile</th>
                              <th>Invoice</th>
                           </tr>
                        </thead>
                        
                        <?php
                           $servername = "localhost";
                           $username = "root";
                           $password = "";
                           $dbname = "pos";
                           
                           // Create connection
                           $conn = new mysqli($servername, $username, $password, $dbname);
                           
                           $sql = 'SELECT * from buyers';
                           if (mysqli_query($conn, $sql)) {
                           echo "";
                           } else {
                           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                           }
                           $count=1;
                           $result = mysqli_query($conn, $sql);
                           if (mysqli_num_rows($result) > 0) {
                           // output data of each row
                           while($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody>
                           <tr>
                              <th>
                                 <?php echo $row['Cust_id']; ?>
                              </th>
                              <td>
                                 <?php echo $row['Cust_name']; ?>
                              </td>
                              <td>
                                 <?php echo $row['Cust_add']; ?>
                              </td>
                              <td>
                                 <?php echo $row['Cust_mobile']; ?>
                              </td>
                             
                              <td>
                                 <a class="nav-link" href="invoice.php?cust_id=<?php echo $row['Cust_id']?>">
                                    <button class="btn btn-success btn-block" name="login_user">Print</button>
                                 </a>
                              </td>
                           </tr>
                        </tbody>
                        <?php
                           $count++;
                           }
                           } else {
                           echo '0 results';
                           }
                           ?>
                     </table>
                  </div>
               </div>
          </div>
         </div>
         <!-- /.container-fluid-->
                    <canvas id="chartOne" style="width: 50%; height: 200%;"></canvas>
                </div>
            </div>
        </div>
    </main>
</div>



  
  </main>
</div>


    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <script>
        var chartOne = document.getElementById('chartOne');
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'Agri-sales',
                    data: [50, 50, 50, 50, 50, 50],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var chartTwo = document.getElementById('chartTwo');
        var myLineChart = new Chart(chartTwo, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of sales',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    	<?php } ?>
</body>
</html>
<?php }else{
	header("Location: index.php");
} ?>