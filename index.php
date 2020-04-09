<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Employee Directory</title>
	<meta name="description" content="Employee Directory">
	<meta name="author" content="gabrielhsr">

	<link rel="stylesheet" href="style/default.css">

	<script src="scripts/library/jquery.min.js"></script>
	<script src="scripts/resize_iframe.js"></script>
</head>	
		
<body>	
	<?php include "resources/connect.php"; ?>
	
	<div id="top_bar">
		<div class="dropdown">
			<button class="dropdown_button">Department</button>
			<div class="dropdown_content">
				<?php 
					$sql 	= "SELECT department FROM employees GROUP BY department";
					$result = mysqli_query($connect, $sql); 
					while ($row = $result->fetch_assoc()){ ?>
						<a href="pages/department.php?department=<?php echo $row["department"] ?>" target="iframe_employees"><?php echo $row["department"] ?></a>
				<?php } ?>
			</div>
		</div>
	
		<div class="dropdown">
			<button class="dropdown_button">Location</button>
			<div class="dropdown_content">
				<?php 
					$sql 	= "SELECT location FROM employees GROUP BY location";
					$result = mysqli_query($connect, $sql);
					while ($row = $result->fetch_assoc()){ ?>				
						<a href="pages/location.php?location=<?php echo $row["location"] ?>" target="iframe_employees"><?php echo $row["location"] ?></a>
				<?php } ?>
			</div>
		</div>
	
		<a href="pages_editmode/index_editmode.php" class="top_bar_button">Edit Mode</a>
	</div>

	<iframe name="iframe_employees" id="iframe_employees" src="/pages/logo.html" width="100%"></iframe>
</body>
</html>