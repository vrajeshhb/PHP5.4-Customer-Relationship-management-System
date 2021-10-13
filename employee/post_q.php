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
<title>CRM | Send Query To Manager </title>
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
<?php

if(isset($_POST['submit']))
{
	$q = mysql_query("INSERT INTO `crm`.`query` (`query_id`, `emp_id`, `org_id`, `subject`, `query`) VALUES (NULL, '".$_SESSION['id']."', '".$_SESSION['org']."', '".$_POST['sub']."', '".$_POST['des']."');");
	
	
	if(!$q)
	{
		echo '<script language="javascript">';
		echo 'alert("ERROR! TRY AGAIN."); ';
		echo '</script>';
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("QUERY ENTERED SUCCESSFULLY!"); ';
		echo '</script>';
	}
}
	
?>
		<h1><b>POST QUERY : </b></h1>	<br />
	<form action="post_q.php" method="post" >
		<table width="500" class="altrowstable" id="alternatecolor">
			<tr> 
					<td><b>SUBJECT :</b> <?php //echo $_SESSION['org']; ?></td>
					<td><input type="text" name="sub" required/></td>
			</tr>
			<tr>
					<td ><b>YOUR QUERY :</b></td>
					<td> <textarea name="des" style="resize:none" cols="30" rows="5" required > </textarea>	</td>
			</tr>
			
			<tr>
					<td colspan="2" align="center"> <input style="background-color:#FE423D; color:#FFFFFF;" type="submit" name="submit" value="POST" /></td>
			</tr>
		</table>
		</form>

		<br>
</h4>
<hr style="color:#000000; background-color:#000000; height:2px" />
<h1><b>Your Posted Query : </b></h1>
<?php
if(isset($_POST['del']))
{
	$del =mysql_query("delete from query where query_id = '".$_POST['foo']."' ");
	if(!$del)
	{
		echo '<script language="javascript">';
		echo 'alert("ERROR! TRY AGAIN."); ';
		echo '</script>';
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("QUERY DELETED SUCCESSFULLY!"); ';
		echo '</script>';
	}
}
?>
<form action="post_q.php" method="post" name="frm" >

<h4>
<table width="1000" class="altrowstable" id="alternatecolor">
			<tr> 
					<td width="200"><b>SR.NO</b> </td>
					<td width="800"><b>SUBJECT</b></td> 
					<td width="1400"><b>QUERY</b> </td>	
					<td width="400"><b>ACTION</b></td>
					 
			</tr>
			<?php
$q=mysql_query("SELECT * FROM QUERY WHERE emp_id = '".$_SESSION['id']."' ORDER BY  `query`.`query_id` DESC ");
$no=0;
while($res=mysql_fetch_array($q))
{
$no=$no+1;
?>

			<tr>
					<td><?php echo $no; ?> </td>
					<td><?php echo $res[3];?></td> 
					<td><?php echo $res[4];?> </td>
					<input type="hidden" name="foo" value="<?php echo $res[0]; ?>"/>
					<td align="center"><input type="submit" name="del" value="DELETE" style="background-color:#FE423D; color:#FFFFFF; width:80px"/></td>

			</tr>
<?php 
}
?>			
	</table>
</form>

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