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
<title>CRM | MY RECORDS </title>
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
	
		<h1><b>MY RECORDS : </b></h1>	<br />
<?php
if(isset($_POST['up']))
{
	$x = date('y-m-d', strtotime( $_POST['da'] ));
	//$query = "UPDATE  `crm`.`client` SET  `Follow_Update` =  '$x' WHERE  `client`.`client_id` = '".$_POST['foo']."' ";
	
	$query ="UPDATE  `crm`.`client` SET  `Follow_Update` =  '$x' WHERE  `client`.`client_id` ='".$_POST['foo']."';";
	$r=mysql_query($query,$link);

/*	if (!$sql) {
    echo '<script language="javascript">';
	echo 'alert("SORRY SOMTHING WENT WRRONG"); ';
	echo '</script>';
    
	}
	else
	{
	echo '<script language="javascript">';
	echo 'alert("FOLLOW UP SET ..."); ';
	echo '</script>';  
	}*/
}

if(isset($_POST['submit']))
{
	/*echo '<script language="javascript">';
	echo 'alert("'.$_POST['foo'].'"); ';
	echo '</script>';*/
?>
<form action="rec.php" method="post">
<input type="hidden" name="foo" value="<?php echo $_POST['foo'] ?>" />
<input type="date" name="da" required />
<input style="background-color:#0099FF; color:#FFFFFF; width:100px; height:40px" type="submit" name="up" value="SET" />
</form>
<?php
}
?>
		

<h4>
<table width="1000" class="altrowstable" id="alternatecolor">
			<tr> 
					<td width="1400"><b>NAME</b> </td>
					<td width="600"><b>PHONE</b></td> 
					<td width="800"><b>EMAIL</b> </td>	
					<td width="400"><b>FOLLOW-UP</b></td>
					<td width="600"><b>ADD DATE</b></td>
					<td width="800"> </td>
			</tr>
			<?php
$sql = "select * from client where Assigned_By =  '".$_SESSION['id']."' ORDER BY  `client`.`client_id` DESC  ";
$q=mysql_query($sql);
$no=0;
while($res=mysql_fetch_array($q))
{
$no=$no+1;
//echo $sql;
?>
<form action="rec.php" method="post" name="frm" >
			<tr>
					<td><?php echo $res[1].' '.$res[2]; ?> </td>
					<td><?php echo $res[3];?></td> 
					<td><?php echo $res[4];?> </td>	
					<td><?php echo $res[11];?>  </td>
					<td><?php echo $res[13];?> </td>
					<input type="hidden" name="foo" value="<?php echo $res[0]; ?>"/>
					<td><input style="background-color:#0099FF; color:#FFFFFF; width:150px" align="center" type="submit" name="submit" value="UPDATE FOLLOW" /></td>
			</tr>
</form>
<?php 
}
?>			
	</table>

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