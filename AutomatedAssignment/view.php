<?php 
	require_once "../config.php";
	$id=$_REQUEST['id'];
	$sql=sprintf("SELECT * from facultyInfo where faculty_id='%d'",$id);
	$retval=mysql_query($sql);
	$row=mysql_fetch_array($retval,MYSQL_ASSOC);
?>
<html>

	<head>
		<title>AutomatedAssignment</title>
		<link rel="stylesheet" href="bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto+Slab" rel="stylesheet">
		<style>
		*{
			margin:0px;
			padding:0px;
			border-radius:0px;
			font-family: 'Roboto Slab', serif;
		}
		table{
			width:85%;
		}
		.navbar-brand {
		  padding: 0px;
		}
		.navbar-brand>img {
		  height: 100%;
		  padding: 5px;
		  width: auto;
		}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	
	<body>
	<div class="container-fluid">
	  <nav class="navbar navbar-default">
		<div class="container-fluid">
		  <div class="navbar-header">
			<a class="navbar-brand" href="index.php"><img src="img/logo.png">
			</a>
		  </div>
		</div>
	  </nav>
	</div>
	
	<div class="container-fluid">
	<h1><?php echo $row['faculty_name']; ?> | Job Assignment</h1><br>
	<h3>Examiner Responsibilities</h3><hr>
	<?php 
		$q1=sprintf("SELECT subject_code FROM facultyAssignment WHERE examiner='%d'",$id);
		$r1=mysql_query($q1);
		if(mysql_num_rows($r1)==0)
			echo "No Responsibility to Display.";
		while($row1=mysql_fetch_array($r1,MYSQL_ASSOC)){
			echo $row1['subject_code']." | ";
		}		
	?><br><br>
	<h3>Moderator Responsibilities</h3><hr>
	<?php 
		$q1=sprintf("SELECT subject_code FROM facultyAssignment WHERE moderator='%d'",$id);
		$r1=mysql_query($q1);
		if(mysql_num_rows($r1)==0)
			echo "No Responsibility to Display.";
		while($row1=mysql_fetch_array($r1,MYSQL_ASSOC)){
			echo $row1['subject_code']." | ";
		}		
	?><br><br>
	<h3>Review-Examiner Responsibilities</h3><hr>
	<?php 
		$q1=sprintf("SELECT subject_code FROM facultyAssignment WHERE review_examiner='%d'",$id);
		$r1=mysql_query($q1);
		if(mysql_num_rows($r1)==0)
			echo "No Responsibility to Display.";
		while($row1=mysql_fetch_array($r1,MYSQL_ASSOC)){
			echo $row1['subject_code']." | ";
		}		
	?>
	</div>
	</body>
</html>	