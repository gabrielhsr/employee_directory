<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Employee Directory</title>
	<meta name="description" content="Employee Directory - Edit Mode">
	<meta name="author" content="gabrielhsr">

	<link rel="stylesheet" href="/style/default.css">

	<script src="/scripts/library/jquery.min.js"></script>
	<script src="/scripts/resize_iframe.js"></script>
</head>	
		
<body>
	<?php include "../resources/connect.php"; ?>

	<div id="top_bar">
		<div class="dropdown">
			<button class="dropdown_button">Department</button>
			<div class="dropdown_content">
				<?php 
					$sql 	= "SELECT department FROM employees GROUP BY department";
					$result = mysqli_query($connect, $sql); 
					while ($row = $result->fetch_assoc()){ ?>
						<a href="department_editmode.php?department=<?php echo $row["department"] ?>" target="iframe_employees"><?php echo $row["department"] ?></a>
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
						<a href="location_editmode.php?location=<?php echo $row["location"] ?>" target="iframe_employees"><?php echo $row["location"] ?></a>
				<?php } ?>
			</div>
		</div>

		<a href="/index.php" class="top_bar_button">Exit edit mode</a>

		<button class="top_bar_button" onclick="show_modal(this);">Register employee</button>
	</div>

	<iframe name="iframe_employees" id="iframe_employees" src="/pages/logo.html" width="100%"></iframe>

	<!-- Modal Code -->

	<div id="modal">
		<div id="modal_content">
			<span id="modal_close">&times;</span>
			<iframe id="iframe_register" src="/resources/register/register_form.html"></iframe>
		</div>
	</div>

	<script src="/scripts/modal.js"></script>
</body>
</html>