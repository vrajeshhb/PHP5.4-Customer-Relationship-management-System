<?php
	session_start();
	include("../connect.php");
	
	if(isset($_POST['submit']))
	{
	$sql="SELECT * FROM  `employee` where email='".$_POST['username']."' and password ='".$_POST['password']."' and role='employee' and status ='1' ";
	$res=mysql_query($sql);
	$no=mysql_num_rows($res);
	
	// code for fecth data for post & branch from faculty_full and set session variable..
$result = mysql_query("SELECT name,lastname,emp_id,org_id FROM employee WHERE email = '".$_POST['username']."' ");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($result);

$name = $row[0]; // shows post form faculty_full.
$lname = $row[1]; // shows branch from faculty_full
$org =$row[3];
$id = $row[2];


	if($no >0 )
	{ 
		$_SESSION['email']= $_POST['username'];
		$_SESSION["name"] = $name;
		$_SESSION["lname"] = $lname;
		$_SESSION["org"]= $org;
		$_SESSION["id"] = $id;
			header("location:index.php");
	 }
	else
	{
		header("location:login.php?msg=err");
	}
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Slick Login</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
<form id="slick-login" method="post" action="login.php">
<?php

	if(isset($_GET['msg'])=="err")
	{  ?>
		<p>Invalid User name or password</p>
<?php  } ?>
<!--<select name="u"> <option value="pro">Professor</option> <option value="hod">HOD </option> <option value="pri">Principal </option> </select> -->
<label for="username">E-Mail</label><input type="text" name="username" class="placeholder" placeholder="E-Mail">
<label for="password">Password</label><input type="password" name="password" class="placeholder" placeholder="Password">
<input type="submit" value="Log In" name="submit">
</form>
</body>
</html>