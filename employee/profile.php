<?php
session_start();
include("../connect.php");
if(isset($_SESSION['email']))
{
$e = $_SESSION['email'];
//$q1 = "SELECT * FROM `employee` WHERE email = '$e' ";
	// code for fecth data for post & branch from faculty_full and set session variable..
$result = mysql_query("SELECT * FROM `employee` WHERE email = '$e' ");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($result);
$org_q = mysql_query("select * from org where org_id = '".$row[10]."' ");
$orow = mysql_fetch_row($org_q);

$fname = $row[3];
$lname = $row[4];
$org =  $orow[1];
$dec = $orow[2];
$org_id = $row[10];
$add = $row[7];
$con = $row[8];

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
<title>CRM | PROFILE </title>
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
		<?php
			if(isset($_POST['submit']))
			{
				//update image code...
				$done = "";
				if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
				{
					echo '<script> alert("Please Select an Image."); </script>';
				}
				else
				{
					$image = addslashes($_FILES['image']['tmp_name']);
					$name = addslashes($_FILES['image']['name']);
					$image = file_get_contents($image);
					$image = base64_encode($image);
					
					$qry= "update employee set image = '$image' where email = '".$_SESSION['email']."' ";
					$result = mysql_query($qry,$link);
					
					if($result)
					{
						$done .= "Image";
					}	
					else
					{
						echo '<script> alert("Image Not uploaded"); </script>';
					}		
				}
				$up_org = mysql_query("update org set name = '".$_POST['org']."', des = '".$_POST['dec']."' where org_id = '".$org_id."' ");
				
				$sql = "update employee set email = '".$_POST['email']."', name = '".$_POST['fname']."' , lastname = '".$_POST['lname']."',  address = '".$_POST['add']."' ,  contact = '".$_POST['con']."'  where emp_id = '".$_SESSION['id']."'  ";
				/*
				 , lastname = '".$_POST['lname']."', email = '".$_POST['email']."', org = '".$_POST['org']."', dec = '".$_POST['dec']."', address = '".$_POST['add']."',contact = '".$_POST['con']."' where emp_id = '".$_SESSION['id']."' "; */
				$r = mysql_query($sql,$link);
					
					if($r)
					{
						$done .= " And Information are updated";
						$_SESSION['email'] = $_POST['email'];
						$_SESSION["name"] = $_POST['fname'];
						$_SESSION["lname"] = $_POST['lname'];
						//$_SESSION["org_id"]= $_POST['org'];
						//$_SESSION["dec"]=$_POST['dec']; 
						$con = $_POST['con'];
						$add = $_POST['add'];
					}	
					else
					{
						echo '<script> alert("information Not uploaded"); </script>';
					}		
				
				
				echo '<script> alert("'.$done.'"); </script>';
				//header("location:profile.php");		
			}
		?>
		<h1><u>YOUR PROFILE :</u></h1>
		<br />
		<form action="profile.php" enctype="multipart/form-data" method="post" onSubmit="return validateForm();" name="frm">
		<table align="" style="padding-top:50px; width:600px">
	 
	<tr>
		<td style="padding-bottom:30px;">FIRST NAME :</td>
		<td style="padding-bottom:30px;"><input type="text" name="fname" value="<?php echo $fname; ?>" required/><br /></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">LAST NAME :</td>
		<td style="padding-bottom:30px;"><input type="text" name="lname" value="<?php echo $lname; ?> "required/></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">E-MAIL ADDRESS :</td>
		<td style="padding-bottom:30px;"><input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" required/></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">ORGANIZATION NAME :</td>
		<td style="padding-bottom:30px;"><input type="text" name="org" value="<?php echo $org; ?>" required/></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">DESCRIPTION :</td>
		<td style="padding-bottom:30px;"><textarea name="dec" value="<?php echo $dec; ?>" style="resize:none;" rows="6" cols="30" required><?php echo $dec; ?></textarea></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">Contact :</td>
		<td style="padding-bottom:30px;"><input type="text" name="con" value="<?php echo $con; ?>" required/></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">Address :</td>
		<td style="padding-bottom:30px;"><textarea name="add" value="<?php echo $add; ?>" style="resize:none;" rows="6" cols="30" required ><?php echo $add; ?></textarea></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px;">Profile Picture :</td>
		<td style="padding-bottom:30px;"><input type="file" name="image" required/></td>
	</tr>
	<tr>
		<td style="padding-bottom:30px; " colspan="2" align="center" ><input style="background-color:#FC2912; color:#FFFFFF;" type="submit" name="submit" value="UPDATE" style=""/></td>
	</tr>
</table>
		</form>
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