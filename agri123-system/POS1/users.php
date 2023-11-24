<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Agri-POS</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="styless.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

   <body class="fixed-nav sticky-footer bg-dark" id="page-top">

 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">Agri-Product</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/dash/dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="service.php">
            <i class="fa fa-check-square" style="font-size:20px"></i>
            <span class="nav-link-text" style="color: white;  font-size: 20px;">New entry</span>
          </a>
        </li>

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="invoice.php?id=1"> 
           <a class="nav-link" href="users.php">
            <i class="fa fas fa-user" style=" font-size:20px"></i>
            <span class="nav-link-text" style="color: white;  font-size:20px">All Users</span>
          </a>
        </li>
      </ul>       
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item"> 
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      </ul> 
    </div>
  </nav> 

      <div class="content-wrapper">
         <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="index.html">Dashboard</a>
               </li>
            </ol>




            
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
                           $dbname = "users";
                           
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
                                 <?php echo $row['product_name']; ?>
                              </td>
                              <td>
                                 <?php echo $row['location']; ?>
                              </td>
                              <td>
                                 <?php echo $row['Cust_mobile']; ?>
                              </td>
                             
                              <td>
                                 <a class="nav-link" href="invoice.php?cust_id=<?php echo $row['Cust_id']?>">
                                    <button class="btn btn-success btn-block" name="login_user">View</button>
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
         
         <!-- /.content-wrapper-->
        
         <!-- Scroll to Top Button-->
         <a class="scroll-to-top rounded" href="#page-top">
         <i class="fa fa-angle-up"></i>
         </a>
         <!-- Logout Modal-->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                  </div>
               </div>
            </div>
         </div>
         <!-- Bootstrap core JavaScript-->
         <script src="vendor/jquery/jquery.min.js"></script>
         <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
         <!-- Core plugin JavaScript-->
         <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
         <!-- Custom scripts for all pages-->
         <script src="js/sb-admin.min.js"></script>
      </div>
   </body>
</html>

