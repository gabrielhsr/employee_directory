<?php
	include "../connect.php";
	 
	$error_check = "";
	$id = $_POST["id"];

	if (empty($_POST["position"])) {
		$error_check .= "position_error";
	} else {
		$position = $_POST["position"];
	}

	if (empty($_POST["registration"])) {
		$error_check .= "registration_error";
	} else {
		$registration = $_POST["registration"];
	}

	if (empty($_POST["name"])) {
		$error_check .= "name_error";
	} else {
		$name = $_POST["name"];
	}

	if (empty($_POST["employee_function"])) {
		$error_check .= "function_error";
	} else {
		$employee_function = $_POST["employee_function"];
	}

	if (empty($_POST["department"])) {
		$error_check .= "department_error";
	} else {
		$department = $_POST["department"];
	}

	if (empty($_POST["location"])) {
		$error_check .= "location_error";
	} else {
		$location = $_POST["location"];
	}

	if (empty($_POST["email"])) {
		$error_check .= "email_error";
	} else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$error_check .= "email_invalid_error";
	} else {
		$email = $_POST["email"];
	}

	if (empty($_POST["phone"])) {
		$error_check .= "phone_error";
	} else {
		$phone = $_POST["phone"];
	}

	if(empty($error_check)) {
		if (empty($_FILES["photo"])) {
			$query_withoutphoto = "UPDATE employees SET position='$position', registration='$registration', name='$name', function='$employee_function', department='$department', location='$location', mail='$email', phone='$phone' WHERE id='$id'";
			$sql = mysqli_query($connect, $query_withoutphoto);

			if ($sql) {
				echo "success";
			} else {
				echo "error";
			}
		} else {
			$photo = $_FILES["photo"];
			$photo_check = "";

			$max_width = 500;
			$max_height = 500;
			$max_size = 5000000;

			if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $photo["type"])){
     			$photo_check .= "extension_error";
   			} 

			$dimensions = getimagesize($photo["tmp_name"]);

			if($dimensions[0] > $max_width || $dimensions[1] > $max_height) {
				$photo_check .= "dimension_error";
			}

			$max_size_convert = $max_size / 1000000;

			if($photo["size"] > $max_size) {
   				$photo_check .= "size_error";
			}

			if(empty($photo_check)) {
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $photo["name"], $ext);

				$photo_name = md5(uniqid(time())) . "." . $ext[1];
				$photo_path = "../../pages/employee_photos/" . $photo_name;
 
				move_uploaded_file($photo["tmp_name"], $photo_path);
			
				$query = "UPDATE employees SET position='$position', registration='$registration', name='$name', function='$employee_function', department='$department', location='$location', mail='$email', phone='$phone', photo='$photo_name' WHERE id='$id'";
				$sql = mysqli_query($connect, $query);

				if ($sql) {
					echo "success";
				} else {
					echo "error";
				}
			} else {
				echo $photo_check;
			}
		}
	} else {
		echo $error_check;
	}
?>