<?php	
include "../connect.php";

$delete = $_GET["delete"];
$department = $_GET["department"];

$sql = "DELETE FROM employees WHERE id='$delete'";
$result = mysqli_query($connect, $sql); 

$sql_count = "SELECT * FROM employees WHERE department='$department'";
$result_count = mysqli_query($connect, $sql_count); 

if($result_count) {
	while ($rows[] = mysqli_fetch_array($result_count));
}

$count = count($rows);

if ($count == 1) {
	if ($result || $sql) {
		echo "<script>alert('Register deleted with success!')</script>";
		echo "<script>window.top.location.reload();</script>";
	} else { 
		echo "<script>alert('It was not possible to delete record number $delete. Please, contact your support.')</script>";
	}
} else {
	if ($result || $sql) {
		echo "<script>alert('Register deleted with success!')</script>";
		echo "<script>window.location.replace('/pages_editmode/department_editmode.php?department=$department')</script>";
	} else { 
		echo "<script>alert('It was not possible to delete record number $delete. Please, contact your support.')</script>";
	}
}

?>