<?php 
	require_once "../config.php";
	$sql=sprintf("SELECT * from facultyInfo");
	$retval=mysql_query($sql);
	$max=mysql_num_rows($retval);
?>
<html>

	<head>
		<title>AutomatedAssignment</title>
		<link rel="stylesheet" href="bootstrap.min.css">
		<style>
		*{
			margin:0px;
			padding:0px;
			border-radius:0px;
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
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="Dispute Bills">
			</a>
		  </div>
		  <div id="navbar1" class="navbar-collapse collapse">
			<?php 
				echo '<a type="button" href="generateAll.php?max='.$max.'" class="btn btn-danger navbar-btn navbar-right">Generate Report</a>';
			?>
		  </div>
		</div>
	  </nav>
	</div>
	
	<div class="container-fluid">
	<table class="table table-striped">
    <thead>
      <tr>
        <th>Faculty Name</th>
        <th>View</th>
        <th>Generate Assignment</th>
      </tr>
    </thead>
    <tbody>
	<?php
	$sql=sprintf("SELECT * from facultyInfo");
	$retval=mysql_query($sql);
	while($row=mysql_fetch_array($retval,MYSQL_ASSOC))
	{
		echo '<tr>
				<td>'.$row['faculty_name'].'</td>
				<td><a href="view.php?id='.$row['faculty_id'].'" class="btn btn-primary">View</a></td>
				<td><a href="generate.php?id='.$row['faculty_id'].'" class="btn btn-success">Download</a></td>
			</tr>';
		if($max<$row['faculty_id'])
			$max=$row['faculty_id'];	
	}	
	?>
	
	</tbody>
	</div>
	</body>

</html>