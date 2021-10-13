
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
      <li><a href="change-password.php"><span class="fa fa-file-text-o"></span> Change Password</a></li>
      <li><a href="profile.php"><span class="fa fa-user"></span> Profile</a></li>
       <li> <a href="add_emp.php?action="><span class="fa fa-ticket"></span>Add Employee</a></li>
	  <li><a href="task.php"> <span class="fa fa-tasks"></span> Create Task</a></li>
	  <li><a href="act.php"><span class="fa fa-ticket"></span>Activites</a></li>
      <li><a href="sell.php"><span class="fa fa-ticket"></span> Sales</a></li>
      <li ><a href="price.php"><span class="fa fa-ticket"></span> price Book</a></li>
	  <li ><a href="client.php"><span class="fa fa-ticket"></span> Clients</a></li>
	  <li ><a href="leads.php"><span class="fa fa-ticket"></span> Leads</a></li>
	  <li ><a href="query.php"><span class="fa fa-ticket"></span> View query</a></li>

	  
	  														
</ul>
	
	