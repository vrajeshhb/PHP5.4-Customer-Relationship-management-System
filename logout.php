<?php
	session_start();
	session_destroy();
	?>
	<html>
	<head>
	</head>
	<body>
<script language="javascript">
alert("Log Out successfully.")
</script>
	</body>
	</html>
	
	<?php
	header("location:index.php");
?>