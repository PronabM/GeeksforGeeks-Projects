<!DOCTYPE html>
<html>
  <head>
    <title>ProGeeks Cup 2.0</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
	 .inline{
		 display: inline-block;
		 float: right;
		 margin: 20px 0px;
	 }
	 
	 input,button{
		 height: 34px;
	 }
	</style>
  </head>
  <body>
  <?php
    require_once "connection.php";

    $limit = 10;  
	if (isset($_GET["page"])) { 
	  $pn  = $_GET["page"]; 
	} 
	else { 
	  $pn=1; 
	};  

    $start_from = ($pn-1) * $limit;  

	$sql = "SELECT * FROM table1 LIMIT $start_from, $limit";  
	$rs_result = mysql_query ($sql); 

  ?>
  <div class="container">
    <br>
    <div>
      <h1>ProGeeks Cup 2.0</h1>
      <p>This page is just for demonstration of Basic Pagination using PHP.</p>
      <table class="table table-striped table-condensed table-bordered">
        <thead>
		<tr>
		  <th width="10%">Rank</th>
		  <th>Name</th>
		  <th>College</th>
		  <th>Score</th>
		</tr>
        </thead>
        <tbody>
		<?php  
		  while ($row = mysql_fetch_array($rs_result,MYSQL_ASSOC)) {  
		?>  
		<tr>  
		  <td><?php echo $row["rank"]; ?></td>  
		  <td><?php echo $row["name"]; ?></td>
		  <td><?php echo $row["college"]; ?></td>
		  <td><?php echo $row["score"]; ?></td>										
		</tr>  
		<?php  
		};  
		?>  
        </tbody>
      </table>
	  <div>
      <ul class="pagination">
	  <?php  
		$sql = "SELECT COUNT(*) FROM table1";  
		$rs_result = mysql_query($sql);  
		$row = mysql_fetch_row($rs_result);  
		$total_records = $row[0];  
		$total_pages = ceil($total_records / $limit);
        $k = (($pn+4>$total_pages)?$total_pages-4:(($pn-4<1)?5:$pn));		
		$pagLink = "";
        if($pn>=2){
			echo "<li><a href='index.php?page=1'> &lt;&lt; </a></li>";
			echo "<li><a href='index.php?page=".($pn-1)."'> &lt; </a></li>";
		}
		for ($i=-4; $i<=4; $i++) {
		  if($k+$i==$pn)
		    $pagLink .= "<li class='active'><a href='index.php?page=".($k+$i)."'>".($k+$i)."</a></li>";
		  else
		    $pagLink .= "<li><a href='index.php?page=".($k+$i)."'>".($k+$i)."</a></li>";  
		};  
		echo $pagLink;
		if($pn<$total_pages){
			echo "<li><a href='index.php?page=".($pn+1)."'> &gt; </a></li>";
			echo "<li><a href='index.php?page=".$total_pages."'> &gt;&gt; </a></li>";
		}	
	  ?>
      </ul>
	  <div class="inline">
	  <input id="pn" type="number" min="1" max="<?php echo $total_pages?>" 
	  placeholder="<?php echo $pn."/".$total_pages; ?>" required>
	  <button onclick="go2Page();">Go</button>
	  </div>
	 </div> 
    </div>
  </div>
  <script>
	function go2Page()
	{
		var pn = document.getElementById("pn").value;
		pn = ((pn><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((pn<1)?1:pn));
		window.location.href = 'index.php?page='+pn;
	}
  </script>
  </body>
</html>