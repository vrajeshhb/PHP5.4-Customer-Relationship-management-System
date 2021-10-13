<?php
session_start();
include("../connect.php");
if(isset($_SESSION['email']))
{
if(isset($_POST['upload']))
{
}
?>
<!DOCTYPE html>
<html>
<head>
<script >
function validateForm() {
}
</script>
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
<title>CRM | CREATE TASK </title>
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
	<?php
	if(isset($_POST['upload']))
	{	$today = date('y-m-d');
		$query = "INSERT INTO `crm`.`jobs` (`job_id`, `Job_name`, `created_by`, `category`, `type`, `uploaded_date`, `deadline`, `price`, `target`) VALUES (NULL, '".$_POST['name']."', '".$_SESSION['org']."', '".$_POST['cat']."', '".$_POST['type']."', '".$today."', '".$_POST['d']."', '".$_POST['p']."', '".$_POST['t']."');";
		$sql=mysql_query($query,$link);
		if($sql){
		echo '<script language="javascript">';
		echo 'alert("DATA UPLOADED! NOW ITS VISIBLE TO YOUR EMPLOYEES..."); ';
		echo '</script>';}
		else
		{echo '<script language="javascript">';
		echo 'alert("ERROR TRY AGAIN!"); ';
		echo '</script>';}
	}
	?>
		<div class="page-title">
		<h1><u>UPLOAD TASK FOR EMPLOYEES :</u></h1>
		<h4 style="color:#FF0000;">*( HERE YOU (MANAGER) HAVE TO UPLOAD A PRODUCT OR SERIVES WHICH YOUR EMPLOYEES WILL SELL AND ACCORDINGLY CREATE HISTORY OF SELLS AND CUSTORMER WHO BOUGHT IT.)</h4>
		<h4 style="color:#FF0000;">*(EVEN YOUR COUSTORMER WILL BE SORTED IN SYSTEM FOR BACSIS REFFRENCE WHICH YOU CAN REFFER FOR YOUR UPCOMMING ITEMS.)</h4>
		<br />
		<h3>
		<form action="task.php" method="post" onSubmit="return validateForm();" name="frm">
		<table align="" style="padding-top:50px; width:700px">
	 <tr>
		<td style="padding-bottom:30px;">NAME OF YOUR<br /> SERVICE / PRODUCT :</td>
		<td style="padding-bottom:30px;"><input type="text" name="name" id="name" value="" required/></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">TYPE :</td>
		<td style="padding-bottom:30px;"><input style="height:15px; width:15px; margin:3%;" type="radio" name="type" value="service"/>SERVICES <input style="height:15px; width:15px; margin:3%;" type="radio" name="type" value="Product"/>PRODUCT</td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">CATEGORY :</td>
		<td style="padding-bottom:30px;"><input type="text" name="cat" id="cat" value="" required/></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">PRICE :</td>
		<td style="padding-bottom:30px;"><input type="text" name="p" id="p" value="" required/></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">TARGET :</td>
		<td style="padding-bottom:30px;"><input type="text" name="t" id="t" value="" required/></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">DEADLINE :</td>
		<td style="padding-bottom:30px;"><input type="date" name="d" id="d" value="" required/></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px; " colspan="2" align="center" ><input style="background-color:#FC2912; color:#FFFFFF;" type="submit" name="upload" value="UPLOAD" style=""/></td>
	</tr>
</table>
		</form>
		</h3>
		</div>
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
else{
	header("location:../index.php");
}
?>