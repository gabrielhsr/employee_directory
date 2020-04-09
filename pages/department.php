<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Department</title>
	<meta name="description" content="Employee Directory - Departments">
	<meta name="author" content="gabrielhsr">
	
	<link rel="stylesheet" href="/style/default.css">
</head>

<body>
	<?php
		include "../resources/connect.php";

		$department = $_GET["department"];
		$sql		= "SELECT * FROM employees WHERE department='$department' ORDER BY position ASC";
		$result		= mysqli_query($connect, $sql); 

		if($result) {
			while ($row = mysqli_fetch_assoc($result)) { 
				$rows[] = $row; 
			}
	?>
	
	<div id="title">
		<?php echo $department; ?>
	</div>
	
	<?php foreach($rows as $row) { ?>
		<div class="employee_container">
			<div class="employee_container_sidebar">
				<img class="employee_photo" src="employee_photos/<?php echo $row['photo']; ?>" />
				<div class="employee_name_container">
					<p class="employee_name"><?php echo $row['name']; ?></p>
				</div>
				<p class="employee_function"><?php echo $row['function']; ?></p>
			</div>
			<div class="employee_info_container">
				<img class="info_icon" src="/img/sector.png" /><p class="info_text"><?php echo $row['department']; ?></p>
				<img class="info_icon" src="/img/location.png" /><p class="info_text"><?php echo $row['location']; ?></p>
				<img class="info_icon" src="/img/mail.png" /><p class="info_text_link"><a href="mailto:<?php echo $row['mail']; ?>"><?php echo $row['mail']; ?></a></p>
				<img class="info_icon" src="/img/phone.png" /><p class="info_text"><?php echo $row['phone']; ?></p>
				<img class="info_icon" src="/img/skype.png" /><p class="info_text_link"><a href="sip:<?php echo $row['mail']; ?>">Skype for Business</a></p>
			</div>
		</div>
	<?php } } ?>
</body>
</html>