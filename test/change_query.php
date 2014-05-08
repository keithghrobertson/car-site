<?php
	$con = mysqli_connect("localhost","sixtysix_cars","s69146cd","sixtysix_carstats");

	//these are grabbed from the JS file
	$level = $_GET["level"];
	$year = $_GET["selectedYear"];
	$make = $_GET["selectedMake"];
	$model = $_GET["selectedModel"];
	$trim = $_GET["selectedTrim"];

	$query="";


switch ($level) {
    case 1:
        $query = "SELECT * FROM carstats WHERE year='".$year."' GROUP BY make ORDER BY make";
        break;
    case 2:
        $query = "SELECT * FROM carstats WHERE year='".$year."' AND make= '".$make."' GROUP BY model ORDER BY model";
        break;
    case 3:
        $query = "SELECT * FROM carstats WHERE year='".$year."' AND make='".$make."' AND model='".$model."' GROUP BY trim ORDER BY trim";
        break;
	case 4:
		$query = "SELECT * FROM carstats WHERE year='".$year."' AND make='".$make."' AND model='".$model."' GROUP BY trim ORDER BY trim";
		break;
}


	$result = mysqli_query($con, $query);

?>

<?php
if(!$result){
	printf("Error: %s\n", mysqli_error($con));
    exit();
}

switch ($level) {
	case 1:
        $query = "SELECT * FROM carstats WHERE year='".$year."' GROUP BY make ORDER BY make";
        echo '<select id="makelist" name="makelist">';
		echo 	'<option>SELECT MAKE</option>';
		while ($row=mysqli_fetch_array($result)){
            echo "<option>" . $row['make']. "</option>";
        }
		echo '</select>';
		break;
    case 2:
        $query = "SELECT * FROM carstats WHERE year='".$year."' AND make='".$make."' GROUP BY model ORDER BY model";
		echo '<select id="modellist" name="modellist">';
		echo 	'<option>SELECT MODEL</option>';
		while ($row=mysqli_fetch_array($result)){
            echo "<option>" . $row['model']. "</option>";
        }
		echo '</select>';
        break;
    case 3:
        $query = "SELECT * FROM carstats WHERE year='".$year." AND make='".$make."' AND model='".$model."' GROUP BY trim ORDER BY trim";
		echo '<select id="trimlist" name="trimlist">';
		echo 	'<option>SELECT TRIM</option>';
		while ($row=mysqli_fetch_array($result)){
            echo "<option>" . $row['trim']. "</option>";
        }
		echo '</select>';
        break;
	case 4:
		$my_car = $year ." ". $model ." ". $make ." ". $trim;
		echo ($my_car);
		break;
}

?>


