
<?php
session_start();
if (!isset($_SESSION['role'])) {
    header('Location: /agrisystem/dash/login.php');
    exit;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: /agrisystem/POS1/login.php');
    exit;
}

   include('pservice.php'); 
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Agri-POS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
  <link href="styless.css" rel="stylesheet">
  <style>
    h2{
    color: white;
    text-align: center;

    }
    .logo{
     height: 250px;
     padding: 30px;
    }
  </style>
</head>


   <body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <header class="navbar navbar-expand-lg navbar-dark bg-green fixed-top" id="mainNav">
  <h3 style="color: white; font-size: 1.5rem;">Agri-Farm Point of Sales</h3>
  <!-- <ul>
 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="service.php">
            <i class="fa fa-check-square"></i>
            <span class="nav-link-text">New entrysssss</span>
          </a>
  </li>
</ul> -->
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
      <!-- <a class="nav-link" href="service.php">
          go to
        </a> -->
      </li>


      <img src="logo2.png" alt="Logo" class="logo" >
      <h2>Point of Sale</h2>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
        <a class="nav-link" href="service.php">
          <i class="fa fa-check-square" style="font-size:20px;"></i>
          <span class="nav-link-text" style="color: white; font-size:20px;">New entry</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
        <a class="nav-link" href="users.php">
          <i class="fa fa-shopping-cart" style="font-size:20px;"></i>
          <span class="nav-link-text" style="color: white; font-size: 20px;">All Product</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
        <a class="nav-link" href="t.php">
          <i class="fa fa-shopping-cart" style="font-size:20px;"></i>
          <span class="nav-link-text" style="color: white; font-size: 20px;">Fertilizer Expenses</span>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav sidenav-toggler">
    </ul>
  </div>
</header>



      <div class="content-wrapper">

         <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="/agrisystem/dash/dashboard.php">Dashboard</a>
               </li>
               <li class="breadcrumb-item active">Product Page</li>
            </ol>


          <form method="post" action="service.php">

           <?php include('errors.php'); ?>
           
            <div class="row">
               <div class="col-12">
               </div>
               <div class="col-md-8">
                
  <div class="form-group row">
    <label for="inputType" class="col-sm-3 col-form-label"><strong>Type of Agricultural Products:</strong></label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputType" name="name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputLocation" class="col-sm-3 col-form-label"><strong>Date of Harvest:</strong></label>
    <div class="col-sm-9">
      <input type="date" class="form-control" id="inputDate" name="date">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="inputLocation" class="col-sm-3 col-form-label"><strong>Location:</strong></label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputLocation" name="location">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="inputBuyers" class="col-sm-3 col-form-label"><strong>Name of Buyers:</strong></label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputBuyers" name="buyername">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="inputMobile" class="col-sm-3 col-form-label"><strong>Mobile # of Buyers:</strong></label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputMobile" name="phone">
    </div>
  </div>
  <br>
  
  <!-- <div class="form-group row">
    <label for="inputQuantity" class="col-sm-3 col-form-label"><strong>Estimated Quantity of Product:</strong></label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputQuantity" name="email">
    </div>
  </div> -->
</div>
<br>
<div class="container">
  <div class="row clearfix">
    <div class="col-md-12">
    <div class="d-flex justify-content-center mb-2" style="align-items: center;">
  <button type="submit" class="btn btn-success btn-lg" name="reg_p">Submit</button>
</div>
<table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center">#</th>
          
            <th class="text-center">Product</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Price</th>
            <th class="text-center">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>1</td>
            <!-- <td><input type="text" name='order_date[]' class="form-control order_date" /></td> -->
            <td><input type="text" name='service_name[]' placeholder='Enter Product' class="form-control" /></td>
            <td><input type="number" name='quantity[]' placeholder='Enter quantity' class="form-control quantity" step="0" min="0" /></td>
            <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0" /></td>
            <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly /></td>
          </tr>
          <tr id='addr1'></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>




              <div class="row clearfix">
                <div class="col-md-12">
                  <a id="add_row" class="btn btn-default pull-left">Add Row</a>
                  <a  id='delete_row' class="pull-right btn btn-default">Delete Row</a>
                </div>
              </div>
              <div class="row clearfix" style="margin-top:20px">
                <div class="pull-right col-md-4">
                  <table class="table table-bordered table-hover" id="tab_logic_total">
                    <tbody>
                      <tr style="display: none;" >
                        <th class="text-center">Sub Total</th>
                        <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
                      </tr>
                      <tr style="display: none;" >
                        <th class="text-center">CGST</th>
                        <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                            <input type="number" class="form-control" id="tax" placeholder="0">
                            <div class="input-group-addon">%</div>
                          </div></td>
                      </tr>
                      <tr style="display: none;" >
                        <th class="text-center">CGST Tax Amount</th>
                        <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
                      </tr>
                      <tr >
                        <th class="text-center">Grand Total</th>
                        <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          
        </form>

         </div>
         <!-- /.container-fluid-->
         
         <!-- /.content-wrapper-->
         <footer class="sticky-footer">
            <div class="container">
               <div class="text-center">
               </div>
            </div>
         </footer>
         <!-- Scroll to Top Button-->
         <a class="scroll-to-top rounded" href="#page-top">
         <i class="fa fa-angle-up"></i>
         </a>
         <!-- Logout Modal-->
         <!-- Bootstrap core JavaScript-->
         <script src="vendor/jquery/jquery.min.js"></script>
         <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
         <!-- Core plugin JavaScript-->
         <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
         <!-- Custom scripts for all pages-->
         <script src="js/sb-admin.min.js"></script>
         <script type="text/javascript">
           $(document).ready(function(){
    var i=1;
    $("#add_row").click(function(){b=i-1;
        $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
        i++; 
    });
    $("#delete_row").click(function(){
      if(i>1){
    $("#addr"+(i-1)).html('');
    i--;
    }
    calc();
  });
  
  $('#tab_logic tbody').on('keyup change',function(){
    calc();
  });
  $('#tax').on('keyup change',function(){
    calc_total();
  });
  

});

function calc()
{
  $('#tab_logic tbody tr').each(function(i, element) {
    var html = $(this).html();
    if(html!='')
    {
      var quantity = $(this).find('.quantity').val();
      var price = $(this).find('.price').val();
      $(this).find('.total').val(quantity*price);
      
      calc_total();
    }
    });
}

function calc_total()
{
  total=0;
  $('.total').each(function() {
        total += parseInt($(this).val());
    });
  $('#sub_total').val(total.toFixed(2));
  tax_sum=total/100*$('#tax').val();
  $('#tax_amount').val(tax_sum.toFixed(2));
  $('#total_amount').val((tax_sum+total).toFixed(2));
}
         </script>
      </div>
   </body>
</html>

