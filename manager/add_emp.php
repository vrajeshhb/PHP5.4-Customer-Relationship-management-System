<?php
session_start();
include("../connect.php");
if(isset($_SESSION['email']))
{

if(isset($_POST['view']))
	{
		echo '<script> alert("ID FOR EMAIL SELECTED IS =  '.$_POST['select'].' "); </script>';
	}
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
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
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
<title>CRM | Add Employee </title>
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
<?php include("header.php");
	?>
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
		<table>	
		<tr>
			<td style="padding-right:50px;">
				<a href="add_emp.php?action="> <img src="assets/add_user.png" width="100px" height="100px" /> </a>
			</td>
			<td style="padding-right:50px;">
				<a href="add_emp.php?action=d"> <img src="assets/delete_user.jpg" width="100px" height="100px" /></a>
			</td>
			<td style="padding-right:50px;">
				<a href="add_emp.php?action=u"> <img src="assets/update_user.jpg" width="100px" height="100px" /> </a>
			</td>
			
		</tr>
		<tr>
			<td>
				<h4>Add Employee</h4>
			</td>
			<td>
				<h4>DISABLE USER</h4>
			</td>
			<td>
				<h4>Update Employee</h4>
			</td>
		</tr>
		<tr>
		</tr>				
		</table>
		<br /><br />
		
		
		</div>
		<?php
		if($_GET['action'] == 'u' )
		{
			if(isset($_POST['update']))
			{
				$id = $_POST['id'];
				$query = "UPDATE  `crm`.`employee` SET  `role` =  'manager' WHERE  `employee`.`emp_id` = $id;";
				$sql=mysql_query($query,$link);
				if($sql){
				echo '<script language="javascript">';
				echo 'alert("EMPLOYEE UPDATED TO MANAGER SUCCESFULLY!"); ';
				echo '</script>';}
			}
		?>
			
			<h1><u>UPDATE TO MANAGER</u></h1>
			<br />
			<form action="add_emp.php?action=u" method="post" name="f1" onSubmit="return check();">
							<h4>ENTER EMPLOYEE ID : <br><br>
				<input type="text" name="id" id="id" placeholder="" /> <br /><br />
				<input style="background-color:#FF342F; color:#FFFFFF" type="submit" name="update" value="MAKE MANAGER"/>
			</form>
			<br><br>	--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			<br><br><br>
			<form action="add_emp.php?action=u" method="post">
	<h4 align="center" style="color:">VIEW ID: 
<select align="center" name="select">
<?php
	$s = "SELECT * FROM employee where status = '1' and org_id = '".$_SESSION['org']."' " ;			
	$q=mysql_query($s);
	$no=0;
	while($res=mysql_fetch_array($q))
	{
	?>
	
	<option value="<?php echo $res[0]; ?>">  <?php echo $res[1]; ?> </option>
	
	<?php
	}
?>
</select>

<input style="background-color:#FF342F; color:#FFFFFF; height:5%; width:10%;" type="submit" name="view" value="View ID"/>

</form>
			
		<?php
		}
		else if($_GET['action'] == 'd')
		{
		if(isset($_POST['disable']))
			{
				$id = $_POST['id'];
				$query = "UPDATE  `crm`.`employee` SET  `status` =  '0' WHERE  `employee`.`emp_id` = $id;";
				$sql=mysql_query($query,$link);
				if($sql){
				echo '<script language="javascript">';
				echo 'alert("EMPLOYEE DIABLED SUCCESFULLY!"); ';
				echo '</script>';}
			}
		?>
			<h1><u>DISABLE EMPLOYEE</u></h1>
			<br />
			<form action="add_emp.php?action=d" method="post" name="f2" onSubmit="return check1();">
				<h4>ENTER EMPLOYEE ID : <br><br>
				<input type="text" name="id" id="id" placeholder="" /> <br /><br />
				<input style="background-color:#FF342F; color:#FFFFFF" type="submit" name="disable" value="DISABLE EMPLOYEE"/>
			</form>
			
		<br><br>	--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			<br><br><br>
			<form action="add_emp.php?action=d" method="post">
	<h4 align="center" style="color:">VIEW ID: 
<select align="center" name="select">
<?php
	$s = "SELECT * FROM employee where status = '1' and org_id = '".$_SESSION['org']."' " ;			
	$q=mysql_query($s);
	$no=0;
	while($res=mysql_fetch_array($q))
	{
	?>
	
	<option value="<?php echo $res[0]; ?>">  <?php echo $res[1]; ?> </option>
	
	<?php
	}
?>
</select>

<input style="background-color:#FF342F; color:#FFFFFF; height:5%; width:10%;" type="submit" name="view" value="View ID"/>

</form>

			
			
			
						
		<?php
		}
		else
		{
		?>
		<h1><u>Add New Employee : <u></h1><?php //echo $_SESSION['org'] ?>	<br />
		<form action="add_emp.php?action=" method="post" name="frm" onSubmit="return validateForm();">
<?php
if(isset($_POST['submit']))
{

$se = "select email from employee";
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
		echo '<h1 align="center" style="color:red"><br> EMAIL ADDRESS ALREADY REGISTERED ....... Try Again</h1>';
	}
	else
	{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$org = $_SESSION['org'];
	//$dec = $_SESSION['dec'];;
	$query = "INSERT INTO `crm`.`employee` (`emp_id`, `email`, `password`, `name`, `lastname`, `role`, `status`,`org_id`) VALUES (NULL, '$email', '$pass', '$fname', '$lname', 'employee','1' , '".$_SESSION['org']."')";
	
	$sql=mysql_query($query,$link);
	echo '<script language="javascript">';
	echo 'alert("EMPLOYEE REGISTERED SUCCESFULLY!"); ';
	echo '</script>';
	//echo '<h1 align="center"><br>EMPLOYEE REGISTERED SUCCESFULLY!</h1>';
	}
}
?>
<h4>
<table align="" style="padding-top:50px; width:600px">
	 
	<tr>
		<td style="padding-bottom:30px;">FIRST NAME :</td>
		<td style="padding-bottom:30px;"><input type="text" name="fname" placeholder="First Name"/><br /></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">LAST NAME :</td>
		<td style="padding-bottom:30px;"><input type="text" name="lname" placeholder="Last Name"/></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">E-MAIL ADDRESS :</td>
		<td style="padding-bottom:30px;"><input type="text" name="email" placeholder="abc@mail.com"/></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">PASSWORD :</td>
		<td style="padding-bottom:30px;"><input type="password" name="password" placeholder="PASSWORD"/></td>
	</tr>
	
	<tr>
		<td style="padding-bottom:30px;" colspan="2" align="center" ><input type="submit" name="submit" value="ADD EMPLOYEE" style=""/></td>
	</tr>
</table>
</form>
</h4>
<?php
}
?>
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