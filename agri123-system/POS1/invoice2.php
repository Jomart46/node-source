<html>

<head>
<title>
POS
</title>
 <link href="css/bootstrap.css" rel="stylesheet">
 <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="print.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="tcal.css">
    <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="tcal.css" />
    <script type="text/javascript" src="tcal.js"></script>
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Inside the <style> tag in your <head> section -->
<style type="text/css">
    /* ... Your existing styles ... */
    body {
        display: flex;
        justify-content: center;
      
    }
    .content {
        max-width: 600px; /* Adjust this width as needed */
        padding: 50px; /* Adjust the padding to control the spacing inside */
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        text-align: center; /* Center the content inside the container */
        margin-right: 300px;
    }
 
    table#resultTable {
        width: 100%; /* Set the table width to 100% of its container */
    }
    table#resultTable th,
    table#resultTable td {
        white-space: nowrap; /* Prevent line breaks within cells */
    }
</style>


      
    </style>
    <link rel="stylesheet" href="print.css"> 

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="tcal.css">

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>


 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<h3>fsdffsdfsdf</h3>
 Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>
</head>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
<body>
<div class="button-container">
        <button style="background: linear-gradient(40deg, #647685, #65cc60); border: none; border-radius: 5px;">
            <a href="javascript:Clickheretoprint()" style="display: block; padding: 10px 30px; font-size: 16px; color: white; text-decoration: none;">
                <i class="fa fa-print" style="margin-right: 8px;"></i> Print
            </a>
        </button>
        <button class="btn btn-primary" onclick="window.location.href='t.php'" style="margin-right: 100px; padding: 10px 20px; font-size: 16px;  background: linear-gradient(40deg, #647685, #65cc60); color: white; border: none; border-radius: 5px; cursor: pointer;">
            <i class="fa fa-home" style="margin-right: 8px;"></i> Go to Index
        </button>
    </div>
    
<?php include('navfixed.php');?>

				
	

   <div style="margin-top: -19px; margin-bottom: 21px;">
</header>



</div>
<!-- <form action="salesreport.php" method="get">
<center><strong>From : <input type="text" style="width: 223px; padding:14px;" name="d1" class="tcal" value="" /> To: <input type="text" style="width: 223px; padding:14px;" name="d2" class="tcal" value="" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form> -->
<br>
<br>
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
<!-- Sales Report from&nbsp;<?php echo $_GET['d1'] ?>&nbsp;to&nbsp;<?php echo $_GET['d2'] ?> -->
</div>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
<?php
// Make sure to establish a database connection first
$host = 'localhost';  // Replace with your database host
$dbName = 'users';     // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

try {
    $db = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

// Fetch data from the "product" table
$query = "SELECT * FROM orders";
$stmt = $db->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Your HTML code -->
<header style="text-align: center; padding: -100px; background: linear-gradient(40deg, #647685, #65cc60)!important; color: white; font-size: 20px; font-weight: bold;">
<h1>Pangasinan State University</h1>
<h5>College of Agriculture</h5>
<h4> Fertilizer Expenses Report<h4>
</header>

<thead>
    <tr>
        <th style="width: 20%;">ID</th>
        <th style="width: 35%;">Type of orders</th>
        <th style="width: 30%;">Price</th>
        <th style="width: 10%;">Quantity</th>

    </tr>
</thead>

<tbody>
    <?php foreach ($products as $row) : ?>
        <tr class="record">
            <td><?php echo $row['order_id']; ?></td>
            <td><?php echo $row['order_name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['unit_price']; ?></td>
           
        </tr>
    <?php endforeach; ?>
</tbody>

		<tr> <th colspan="4" style="border-top:1px solid #999999; background: linear-gradient(40deg, #647685, #65cc60) !important;"></th> <th colspan="4" style="border-top:1px solid #999999; background: linear-gradient(40deg, #647685, #65cc60) !important;">

			</th>
				<th colspan="1" style="border-top:1px solid #999999">
			<!-- <?php 
				$resultia = $db->prepare("SELECT sum(profit) FROM sales WHERE date BETWEEN :c AND :d");
				$resultia->bindParam(':c', $d1);
				$resultia->bindParam(':d', $d2);
				$resultia->execute();
				for($i=0; $cxz = $resultia->fetch(); $i++){
				$zxc=$cxz['sum(profit)'];
		
				}
				?>
		 -->
				</th>
		</tr>
	</thead>
</table>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>

</body>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesales.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
<?php include('footer.php');?>
</html>