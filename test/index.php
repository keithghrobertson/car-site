<?php
$con = mysqli_connect("localhost","sixtysix_cars","s69146cd","sixtysix_carstats");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<title>Untitled Document</title>
</head>

<body>

<style type="text/css">
	select{
		width:150px;	
		clear:both;
	}
</style>

<?php 

$con = mysqli_connect("localhost","sixtysix_cars","s69146cd","sixtysix_carstats");

$query="SELECT * FROM carstats GROUP BY year ORDER BY year DESC";

$result = mysqli_query($con, $query);

?>

 <select id="yearlist" name="yearlist">
 	<option>SELECT YEAR</option>
	<?php 
		while ($row=mysqli_fetch_array($result)){
	  		echo "<option>" . $row['year']. "</option>";
		}
	?>
</select>

<div class="makeResult">
	<select id="makelist" name="makelist" disabled="disabled">
    	<option>SELECT MAKE</option>
    </select>
</div>

<div class="modelResult">
	<select id="modellist" name="modellist" disabled="disabled">
    	<option>SELECT MODEL</option>
    </select>
</div>

<div class="trimResult">
	<select id="trimlist" name="trimlist" disabled="disabled">
    	<option>SELECT TRIM</option>
    </select>
</div>

<div class="finalResult">
</div>

</body>
</html>