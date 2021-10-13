<?php
/* session_start();
	include("../connect.php");
	
	if(isset($_POST['submit']))
	{
	echo $sql="select * from faculty_full where user_name='".$_POST['username']."' and password ='".$_POST['password']."' and post ='pri' ";
	$res=mysql_query($sql);
	$no=mysql_num_rows($res);
	
	// code for fecth data for post & branch from faculty_full and set session variable..
$result = mysql_query("SELECT post,branch FROM faculty_full WHERE user_name = '".$_POST['username']."' ");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($result);



$pos = $row[0]; // shows post form faculty_full.
$bran = $row[1]; // shows branch from faculty_full



	if($no >0 )
	{ 
		$_SESSION['user']= $_POST['username'];
		$_SESSION["post"] = $pos;
		$_SESSION["branch"] = $bran;
			header("location:index.php");
	 }
	else
	{
		header("location:login.php?msg=err");
	}
}*/
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
/*
	if(isset($_GET['msg'])=="err")
	{ */ ?>
		<!--<p>Invalid User name or password</p>-->
<?php /* } */?>
<!--<select name="u"> <option value="pro">Professor</option> <option value="hod">HOD </option> <option value="pri">Principal </option> </select> -->
<label for="username">E-Mail</label><input type="text" name="username" class="placeholder" placeholder="E-Mail">
<label for="password">Password</label><input type="password" name="password" class="placeholder" placeholder="Password">
<input type="submit" value="Log In" name="submit">
</form>
</body>
</html>