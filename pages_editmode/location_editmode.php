<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Location Edit Mode</title>
	<meta name="description" content="Employee Directory - Department Edit Mode">
	<meta name="author" content="gabrielhsr">
	
	<link rel="stylesheet" href="/style/default.css">

	<script src="/scripts/library/jquery.min.js"></script>
</head>

<body>
	<?php
		include "../resources/connect.php";

		$location = $_GET["location"];
		$sql = "SELECT * FROM employees WHERE location='$location' ORDER BY position ASC";
		$result = mysqli_query($connect, $sql); 

		if($result) {
			while ($row = mysqli_fetch_assoc($result)) { 
				$rows[] = $row; 
			}
	?>
	
	<div id="title">
		<?php echo $location; ?>
	</div>
	
	<?php foreach($rows as $row) { ?>
		<div class="employee_container">
			<a href="/resources/delete/delete_location.php?delete=<?php echo $row["id"] ?>&location=<?php echo $row["location"]; ?>" target="iframe_employees" onClick="javascript:return confirm('Do you want to delete the register of <?php echo $row["name"];?>?');">
				<img class="delete_icon" src="/img/delete.png">
			</a>

			<button class="edit_icon" data-id="<?php echo $row["id"] ?>" onclick="show_modal(this);"></button>

			<div class="employee_container_sidebar">
				<img class="employee_photo" src="/pages/employee_photos/<?php echo $row["photo"]; ?>">
				<div class="employee_name_container">
					<p class="employee_name"><?php echo $row["name"]; ?></p>
				</div>
				<p class="employee_function"><?php echo $row["function"]; ?></p>
			</div>
			<div class="employee_info_container">
				<img class="info_icon" src="/img/sector.png"><p class="info_text"><?php echo $row["department"]; ?></p>
				<img class="info_icon" src="/img/location.png"><p class="info_text"><?php echo $row["location"]; ?></p>
				<img class="info_icon" src="/img/mail.png"><p class="info_text_link"><a href="mailto:<?php echo $row["mail"]; ?>"><?php echo $row["mail"]; ?></a></p>
				<img class="info_icon" src="/img/phone.png"><p class="info_text"><?php echo $row["phone"]; ?></p>
				<img class="info_icon" src="/img/skype.png"><p class="info_text_link"><a href="sip:<?php echo $row["mail"]; ?>">Skype for Business</a></p>
			</div>
		</div>

		<!-- Modal Code -->

		<div id="modal">
			<div id="modal_content">
				<span id="modal_close">&times;</span>
				<div id="modal_body"></div>
			</div>
		</div>
	<?php } } ?>

	<script src="/scripts/edit_mode/edit_modal.js"></script>
	<script src="/scripts/modal.js"></script>
</body>
</html>