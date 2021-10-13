
   <?php $ret=mysql_query("select * from employee");
	  while($row=mysql_fetch_array($ret))
	  {
	  $ut=$row['role'];
	  }?>
	  
	<?php
		$q="SELECT * FROM  `employee` where emp_id = '".$_SESSION['id']."' ";
		$sql=mysql_query($q);
		$res = mysql_fetch_row($sql);
		
	?>
	   <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar" id="main-menu">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
      <div class="user-info-wrapper">
        <div class="profile-wrapper"> 
		<img src="<?php echo 'data:image;base64,'.$res[6].' '; ?>"  alt="" data-src="<?php echo 'data:image;base64,'.$res[6].' '; ?>" data-src-retina="<?php echo 'data:image;base64,'.$res[6].' '; ?>" width="69" height="69" /> </div>
        <div class="user-info">
          <div class="greeting" style="font-size:14px;">Welcome</div>
          <div class="username" style="font-size:12px;"><?php echo $_SESSION['email'];?></div>
          <div class="status" style="font-size:10px;"><?php if($ut== "manager")
{
echo "Manager";	
}
if($ut=="employee")
{
echo "employee";	
}
?><a href="#">
            <div class="status-icon green"></div>
            Online</a></div>
        </div>
      </div>
      <!-- END MINI-PROFILE -->
      <!-- BEGIN SIDEBAR MENU -->
      <p class="menu-title">BROWSE <span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p>
   
<?php 
?>
    <ul>
      <li class="start"> <a href="index.php"> <i class="icon-custom-home"></i> <span class="title">Dashboard</span> <span class="selected"></span>  </a>  </li>
       <li ><a href="add_c.php"><span class="fa fa-ticket"></span>Add Client</a></li>
	  <li><a href="rec.php"><span class="fa fa-ticket"></span>My Records</a></li>
        <li><a href="follow.php"><span class="fa fa-user"></span>Todays Update</a></li>
	  <li><a href="sale.php"><span class="fa fa-ticket"></span> Sales</a></li>
	  <li><a href="act.php"><span class="fa fa-ticket"></span> Activities</a></li>
	  <li ><a href="contact.php"><span class="fa fa-ticket"></span> contacts</a></li>
	  <li ><a href="post_q.php"><span class="fa fa-ticket"></span> Send query</a></li>
      <li><a href="change-password.php"><span class="fa fa-file-text-o"></span> Change Password</a></li>
      <li><a href="profile.php"><span class="fa fa-user"></span> Profile</a></li>



	  
	  														
</ul>
	
	