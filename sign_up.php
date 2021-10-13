<?php /*
INSERT INTO `crm`.`employee` (`emp_id`, `email`, `password`, `name`, `lastname`, `role`, `org`, `des`, `image`, `status`) VALUES (NULL, 'vrajesh@mail.com', '123456', 'Vrajesh', 'Bhimajiani', 'manager', 'Vrajesh overseas', 'we deals overseas marketing and sell of production in india', img, '1');*/
include("connect.php");

?>
<!DOCTYPE html>
<html lang="">
<head>
<title>CUSTORMER RELATION MANAGEMENT | SIGN UP</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style>
input{
 border: 0.1px solid #CCCCCC;
    border-radius: 15px;
	height:50px;
	width:250px;
}
td{
padding: 10px 10px 10px 10px;
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


</head>
<body id="top">
<div class="bgded" style="background-image:url('images/bb.jpg');"> 

  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 

      <div id="logo" class="fl_left">
        <h1><a href="index.php">OPEN CRM</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#">OUR FEEDBACKS</a>
          <li><a href="#">CONTACT-US</a></li>
         <li><a class="drop" href="login.php">LOGIN</a>
		  	 <ul>
              <li><a href="client/login.php">Client Login</a></li>
              <li><a href="manager/login.php">Manager Login</a></li>
              <li><a href="employee/login.php">Employee Login</a></li>
			  </ul>
		  </li>
        </ul>
      </nav>
     
    </header>
  </div>
 </div>
<div class="wrapper row3">
<form action="sign_up.php" method="post" name="frm" onSubmit="return validateForm();">
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
	$org = $_POST['org'];
	$dec = $_POST['dec'];
	//organitaion entered into the system
	$org = "INSERT INTO `crm`.`org` (`org_id`, `name`, `des`, `address`, `contact`) VALUES (NULL, '$org', '$dec', NULL, NULL);";
	$sql_org = mysql_query($org);
	//searching for recent org forn db
	$vb = mysql_query("select * from org ORDER BY  `org`.`org_id` DESC  LIMIT 0 , 1");
	if (!$vb) {
    echo 'Could not run query: ' . mysql_error();
    exit;
	}
	$vv = mysql_fetch_row($vb);
	//print_r($vv);
	$or = $vv[0];
	//now the manager who siged up setails are going to db
	$query = "INSERT INTO `crm`.`employee` (`emp_id`, `email`, `password`, `name`, `lastname`, `role`, `status`, `org_id`) VALUES (NULL, '$email', '$pass', '$fname', '$lname', 'manager','1', '$or')";
	$sql=mysql_query($query,$link);
	if (!$sql) {
    echo 'Could not run query: ' . mysql_error();
    exit;
	}
	echo '<h1 align="center"><br>YOU ARE REGISTERED SUCCESFULLY!</h1>';
	}
}
?>
<table align="center" style="padding-top:50px; width:600px">
	<tr>
		<td align="center" colspan="2"><h1>REGISTER YOUR DETAILS.</h1></td>
	</tr>
	<tr>
		<td>FIRST NAME :<font color="#FF0000" size="-2"> (*)</font></td>
		<td><input type="text" name="fname" id="fname" placeholder="First Name" maxlength="20" required/></td>
	</tr>
	<tr>
		<td>LAST NAME : <font color="#FF0000" size="-2"> (*)</font></td>
		<td><input type="text" name="lname" id="lname" placeholder="Last Name" maxlength="25" required/></td>
	</tr>
	<tr>
		<td>E-MAIL ADDRESS :<font color="#FF0000" size="-2"> (*)</font></td>
		<td><input type="text" name="email" id="email" placeholder="abc@mail.com" maxlength="35" required/></td>
	</tr>
	<tr>
		<td>PASSWORD :<font color="#FF0000" size="-2"> (*)</font></td>
		<td><input type="password" name="password" id="password" placeholder="PASSWORD" required/></td>
	</tr>
	<tr>
		<td>ORGANIZATION :<font color="#FF0000" size="-2"> (*)</font></td>
		<td><input type="text" name="org" id="org" placeholder="ORGANIZATION NAME" maxlength="30" required/></td>
	</tr>
	<tr>
		<td>DESCRIPTION :<font color="#FF0000" size="-2"> (*)</font></td>
		<td><textarea name="dec" id="dec" style="resize:none; width:250px; height:100px;" placeholder="DESCRIPTION" min="10" maxlength="100" required></textarea></td>
	</tr>
	<tr>
		<td colspan="2" align="center" ><input type="submit" name="submit" value="REGISTER" style="background-color:#FFAEAE;" required/></td>
	</tr>
</table>
</form>

</div>
    
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved<br><a href="index.php">OPEN SOURCE CRM</a></p>
    <p class="fl_right"><a href="#">DEVELOPED BY : <br>VRAJESH BHIMAJIANI &<br> RUCHA VADODARIA</a></p>
    
  </div>
</div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>