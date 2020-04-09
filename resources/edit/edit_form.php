<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit</title>
	<meta name="description" content="Employee Directory - Edit Employee">
	<meta name="author" content="gabrielhsr">
	
	<link rel="stylesheet" href="/style/default.css">

	<script src="/scripts/library/jquery.min.js"></script>
	<script src="/scripts/preview_photo.js"></script> 
</head>

<body>
	<?php
		include "../connect.php";

		$employee_id = $_POST["employee_id"];
		$sql		 = "SELECT * FROM employees WHERE id='$employee_id'";
		$result		 = mysqli_query($connect, $sql); 

		while ($row = mysqli_fetch_array($result)) {
			$level = $row["position"];
	 ?>

	<form role="form">
		<div id="register_container">
			<div class="register_input">
				<div id="warning_position" class="warning_bubble"></div>
				<label>Position</label>
				<select id="position">
					<option value="1" <?=($level == "1")?"selected":""?> >Director</option>
					<option value="2" <?=($level == "2")?"selected":""?> >Manager</option>
					<option value="3" <?=($level == "3")?"selected":""?> >Coordinator</option>
					<option value="4" <?=($level == "4")?"selected":""?> >Analyst</option>
					<option value="5" <?=($level == "5")?"selected":""?> >Technician</option>
					<option value="6" <?=($level == "6")?"selected":""?> >Assistant</option>
					<option value="7" <?=($level == "7")?"selected":""?> >Apprentice</option>
					<option value="8" <?=($level == "8")?"selected":""?> >Intern</option>>
				</select>
			</div>				
			<div class="register_input">
				<div id="warning_registration" class="warning_bubble"></div>
				<label>Registration Number</label><input type="text" id="registration" value="<?php echo $row["registration"]; ?>">
			</div>
			<div class="register_input"> 
				<div id="warning_name" class="warning_bubble"></div>
				<label>Employee Name</label><input type="text" id="name" value="<?php echo $row["name"]; ?>">
			</div>
			<div class="register_input"> 
				<div id="warning_function" class="warning_bubble"></div>
				<label>Function</label><input type="text" id="function" value="<?php echo $row["function"]; ?>">
			</div>
			<div class="register_input"> 
				<div id="warning_department" class="warning_bubble"></div>
				<label>Department</label><input type="text" id="department" value="<?php echo $row["department"]; ?>">
			</div>
			<div class="register_input"> 
				<div id="warning_location" class="warning_bubble"></div>
				<label>Location</label><input type="text" id="location" value="<?php echo $row["location"]; ?>">
			</div>
			<div class="register_input"> 
				<div id="warning_invalid_email" class="warning_bubble"></div>
				<div id="warning_email" class="warning_bubble"></div>
				<label>Email</label><input type="email" id="email" value="<?php echo $row["mail"]; ?>">
			</div>
			<div class="register_input"> 
				<div id="warning_phone" class="warning_bubble"></div>
				<label>Phone Extension</label><input type="text" id="phone" value="<?php echo $row["phone"]; ?>">
			</div>
				<input type="hidden" name="id" id="id" value="<?php echo $row["id"]; ?>">
		</div>

		<div id="photo_upload">
			<div id="photo_label">Employee Photo</div>
			<img id="photo_preview" src="/pages/employee_photos/<?php echo $row["photo"]; ?>" />
			<input type="file" name="photo" id="photo_input" onchange="readURL(this);" />
			<div id="warning_photo" class="warning_bubble_photo"></div>
		</div>

		<div id="register_button_container">
			<button type="submit" id="submit">Update Register</button>
		</div>
		<?php } ?>
	</form>

	<script src="/scripts/edit_mode/edit.js"></script>
</body>
</html>