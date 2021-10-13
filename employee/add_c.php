<?php
session_start();
include("../connect.php");
if(isset($_SESSION['email']))
{
?>
<!DOCTYPE html>
<html>
<head>
<style>
input{
 border: 0.1px solid #CCCCCC;
    border-radius: 15px;
	height:50px;
	width:250px;
}


</style>

<script >
function check() {
if (!isNaN(document.f1.id.value)) {
				return true;                
    }
	else
	{
		alert('It must be Numeric');
				document.frm.fname.value = "";
				return false;

	}
}
function check1() {
if (!isNaN(document.f2.id.value)) {
				return true;                
    }
	else
	{
		alert('It must be Numeric');
				document.frm.fname.value = "";
				return false;

	}
}
function validateForm() {

	
	if (!isNaN(document.frm.fname.value)) {
                alert('Your First name Can Not be Numeric');
				document.frm.fname.value = "";
    }
	if (!isNaN(document.frm.lname.value)) {
				alert('Your Last name Can Not be Numeric');
				document.frm.lname.value = "";
    }
	
	
	if(document.frm.lname.value != "" && document.frm.fname.value != "")
	{
		var mailformat = /^\w+([\.-]?\w+)<span style="color:#F20000">*</span>@\w+([\.-]?\w+)<span style="color:#F20000">*</span>(\.\w{2,3})+$/;
		if(document.frm.email.value.match(mailformat))
		{		
			return true;
		}
		else
		{
			alert("You have entered an invalid email address!");
			return false;
		}
	}
	else
	{
		return false;	
	}
	
		
}
</script>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>CRM | Add CLIENT </title>
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
	
		<h1><b>Add New Client : </b></h1>	<br />
		<form action="add_c.php" method="post" name="frm" onSubmit="return validateForm();">
<?php
if(isset($_POST['submit']))
{

$se = "select email from client";
	$q=mysql_query($se);
	$no_mail=0;
	while($res=mysql_fetch_array($q))
	{
		if($res[0] == $_POST['email'])
		{
			$no_mail++;
		}
	}
	
	
	
	if($no_mail>0)
	{
		echo '<h1 align="center" style="color:red"><br> WE ALREADY HAVE CLIENT WITH THIS EMAIL... </h1>';
	}
	else
	{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$phone = $_POST['phone'];
	$add = $_POST['add'];	
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$coun = $_POST['country'];
	$occ = $_POST['occ'];
	$follow = date('y-m-d', strtotime( $_POST['follow'] ));
	$note = $_POST['note'];
	$d = date("y-m-d");
	$query = "INSERT INTO `crm`.`client` (`client_id`, `First_Name`, `Last_name`, `Phone`, `Email`, `Password`, `Address1`, `State`, `Zip_Code`, `Country`, `Occupation`, `Follow_Update`, `Notes`, `Added_Date`, `Assigned_By`, `image` , `org_id`) VALUES (NULL, '$fname', '$lname', '$phone', '$email', '$pass', '$add', '$state', '$zip', '$coun', '$occ', '$follow', '$note', '$d', '".$_SESSION["id"]."', NULL , '".$_SESSION['org']."');";
	
	$sql=mysql_query($query,$link);
	echo '<script language="javascript">';
	echo 'alert("CLIENT REGISTERED SUCCESFULLY!"); ';
	echo '</script>';
	//echo '<h1 align="center"><br>EMPLOYEE REGISTERED SUCCESFULLY!</h1>';
	}
}
?>
<h4>
<table align="" style="padding-top:50px; width:900px">
	 
	<tr>
		<td style="padding-bottom:30px;"><span style="color:#F20000"><span style="color:#F20000">*</span></span> FIRST NAME : </td>
		<td style="padding-bottom:30px;"><input type="text" name="fname" placeholder="First Name"/><br /></td>
		<td style="padding-bottom:30px;"><span style="color:#F20000"><span style="color:#F20000">*</span></span> LAST NAME :</td>
		<td style="padding-bottom:30px;"><input type="text" name="lname" placeholder="Last Name"/></td>
	</tr>
	
	<tr>
		<td style="padding-bottom:30px;"><span style="color:#F20000">*</span> Phone Number :</td>
		<td style="padding-bottom:30px;"><input type="text" name="phone" placeholder="99999 99999"/></td>
		<td style="padding-bottom:30px;"><span style="color:#F20000">*</span> E-MAIL ADDRESS :</td>
		<td style="padding-bottom:30px;"><input type="text" name="email" placeholder="abc@mail.com"/></td>
	
	</tr>

	<tr>
		<td style="padding-bottom:30px;"><span style="color:#F20000">*</span> PASSWORD :</td>
		<td style="padding-bottom:30px;"><input type="password" name="password" placeholder="PASSWORD"/></td>
		<td style="padding-bottom:30px;">Address :</td>
		<td style="padding-bottom:30px;"><input type="text" name="add" placeholder="Address"/></td>
	</tr>
	
	<tr>
		<td style="padding-bottom:30px;">State</td>
		<td style="padding-bottom:30px;"><input type="text" name="state" placeholder="State"/></td>
		<td style="padding-bottom:30px;">Zip COde :</td>
		<td style="padding-bottom:30px;"><input type="text" name="zip" placeholder="Zip Code"/></td>

	</tr>
	
	<tr>
		<td style="padding-bottom:30px;">Country :</td>
		<td style="padding-bottom:30px;"><input type="text" name="country" placeholder="Country"/></td>
		<td style="padding-bottom:30px;">Occupaction :</td>
		<td style="padding-bottom:30px;"><input type="text" name="occ" placeholder="Occupation"/></td>

	</tr>
	<tr>
		<td style="padding-bottom:30px;"><span style="color:#F20000">*</span> Follow Up :</td>
		<td style="padding-bottom:30px;"><input type="date" name="follow" placeholder=""/></td>
		<td style="padding-bottom:30px;">Note :</td>
		<td style="padding-bottom:30px;"><textarea name="note" cols="30" rows="3" style="resize:none;"> </textarea></td>

	</tr>
	
	<tr>
	<br><br>
		<td style="padding-bottom:30px; " colspan="4" align="center" ><input style="background-color:#0099FF; color:#FFFFFF;" type="submit" name="submit" value="ADD CLIENT" /></td>
	</tr>
</table>
</form>
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