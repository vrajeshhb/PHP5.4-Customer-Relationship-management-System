<?php
session_start();
include("../connect.php");
if(isset($_SESSION['email']))
{
?>
<!DOCTYPE html>
<html>
<head>
	
<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}
window.onload=function(){
	altRows('alternatecolor');
}
</script>

<style type="text/css">	
	td {
					height:25px
					vertical-align: bottom;	
				    
			    }


table.altrowstable {
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
}

table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
.style1 {}
</style>

<style>
input{
 border: 0.1px solid #CCCCCC;
    border-radius: 15px;
	height:50px;
	width:250px;
}


</style>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>CRM | ACTIVITIES</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
</head>
<body class="">
<?php include("header.php");?>
<div class="page-container row-fluid">	
	<?php include("leftbar.php");?>
	<div class="clearfix"></div>
  </div>
  </div>
  <a href="#" class="scrollup">Scroll</a>
   <div class="footer-widget">		
	<div class="progress transparent progress-small no-radius no-margin">
		<div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>		
	</div>
	<div class="pull-right">
	</div>
  </div>
  <div class="page-content"> 
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">  
		<div class="page-title">
		
		</div>
		<h1 align="center"><b> YOUR ACTIVITIES : </b></h1>	<br />
	<form action="act.php" method="post" >
		<table align="center" width="500" class="altrowstable" id="alternatecolor">
			<tr> 
					<td><b>SERVICES :</b> <?php //echo $_SESSION['org']; ?></td>
					<td> <select name="ser" >
					<?php
						$ser = mysql_query("select * from jobs where created_by = '".$_SESSION['org']."' ");
						while($res=mysql_fetch_array($ser))
						{
					?>
					<option value="<?php echo $res[0]; ?>"> <?php echo $res[1]; ?></option>
					<?php
						}
					?>
					</select>
					</td>
			</tr>
			<tr>
					<td colspan="2" align="center"> <input style="background-color:#0099FF; color:#FFFFFF;" type="submit" name="submit" value="ADD SELL" /></td>
			</tr>
		</table>
		</form>
		<a href="sale.php" style="color:#FF0000; padding-left:470px;">To Add SELL Click Here! </a>
		<br>
	<?php //echo $_SESSION['id']; ?>	--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<?php
if(isset($_POST['submit']))
{
	$act = mysql_query("select * from sells where emp_id = '".$_SESSION['id']."' and job_id = '".$_POST['ser']."' ");
	while($d=mysql_fetch_array($act))
	{
		$job_q = mysql_query("select * from jobs where job_id = '".$_POST['ser']."' ");	
		$job_row = mysql_fetch_row($job_q);
		$target = $job_row[8];
		$job_name = $job_row[1];
		$sell_q = mysql_query("select * from sells where emp_id = '".$_SESSION['id']."' ");
		$done = 0;
		while($sell_data = mysql_fetch_array($sell_q))
		{
			$done = $done + $sell_data[5];
		}
		$pending = $target - $done;
		$done_by_other = 0;
		$other = mysql_query("select * from sells where job_id = '".$_POST['ser']."' ");
		while($sell_all = mysql_fetch_array($other))
		{
			$done_by_other = $done_by_other + $sell_all[5];
		}
		$done_by_other = $done_by_other - $done; 
		$pending = $pending - $done_by_other;
?>
	
<div align="center"	 id="piechart"></div>

<script type="text/javascript" src="loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['DONE BY YOU', <?php echo $done ?>],
  ['PENDING', <?php echo $pending ?>],
  ['DONE BY OTHER', <?php echo $done_by_other; ?>],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'<?php echo $job_name; ?>', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>


<?php
	}
}
?>
</h4>
    </div>
  </div>
  
  
  
  
<!-- BEGIN CHAT --> 
<div class="chat-window-wrapper">
	<div id="main-chat-wrapper" class="inner-content">
     
          
            <div class="side-widget fadeIn">
               <div class="side-widget-title">Chat Panel</div>
             <div><?php //include("chat.php");?></div>
            </div>
        </div>

       
    </div>
</div>
 </div>
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/js/core.js" type="text/javascript"></script> 
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script> 

</body>
</html>
<?php
}
else
{
header("location:../index.php");
}
?>