$(document).ready(function () {
	$("#submit").click(function (e) {
		e.preventDefault();

		var position = $("#position :selected").val();
		var registration = $("#registration").val();
		var name = $("#name").val();
		var employee_function = $("#function").val();
		var department = $("#department").val();
		var location = $("#location").val();
		var email = $("#email").val();
		var phone = $("#phone").val();
		var photo = $("#photo_input").get(0).files[0]

		var formData = new FormData();

		formData.append("position", position);
		formData.append("registration", registration);
		formData.append("name", name);
		formData.append("employee_function", employee_function);
		formData.append("department", department);
		formData.append("location", location);
		formData.append("email", email);
		formData.append("phone", phone);
		formData.append("photo", photo);

		$.ajax({
			type: "POST",
			url: "/resources/register/register_employee.php",
			data: formData,
			contentType: false,
			processData: false,
			cache: false,
			success: function (data) {
				if (data == "success") {
					alert("Employee registered with success!");
					window.top.location.reload();
				}

				if (data == "error") {
					alert("Error during data insertion in the database. Contact your support.");
				}

				if (data.indexOf("position_error") !== -1) {
					$("#warning_position").html("The position is required.");
					$("#warning_position").css("display", "block");

					$("#position").on("change", function () {
						$("#warning_position").css("display", "none");
					});
				} else {
					$("#warning_position").css("display", "none");
				}

				if (data.indexOf("registration_error") !== -1) {
					$("#warning_registration").html("The registration number is required.");
					$("#warning_registration").css("display", "block");

					$("#registration").on("input", function () {
						$("#warning_registration").css("display", "none");
					});
				} else {
					$("#warning_registrationnumber").css("display", "none");
				}

				if (data.indexOf("name_error") !== -1) {
					$("#warning_name").html("The name is required.");
					$("#warning_name").css("display", "block");

					$("#name").on("input", function () {
						$("#warning_name").css("display", "none");
					});
				} else {
					$("#warning_name").css("display", "none");
				}

				if (data.indexOf("function_error") !== -1) {
					$("#warning_function").html("The function is required.");
					$("#warning_function").css("display", "block");

					$("#function").on("input", function () {
						$("#warning_function").css("display", "none");
					});
				} else {
					$("#warning_function").css("display", "none");
				}

				if (data.indexOf("department_error") !== -1) {
					$("#warning_department").html("The department is required.");
					$("#warning_department").css("display", "block");

					$("#department").on("input", function () {
						$("#warning_department").css("display", "none");
					});
				} else {
					$("#warning_department").css("display", "none");
				}

				if (data.indexOf("location_error") !== -1) {
					$("#warning_location").html("The location is required.");
					$("#warning_location").css("display", "block");

					$("#location").on("input", function () {
						$("#warning_location").css("display", "none");
					});
				} else {
					$("#warning_location").css("display", "none");
				}

				if (data.indexOf("email_error") !== -1) {
					$("#warning_email").html("The email is required.");
					$("#warning_email").css("display", "block");

					$("#email").on("input", function () {
						$("#warning_email").css("display", "none");
					});
				} else {
					$("#warning_email").css("display", "none");
				}

				if (data.indexOf("email_invalid_error") !== -1) {
					$("#warning_invalid_email").html("Wrong format. Must contain @ and .com.");
					$("#warning_invalid_email").css("display", "block");

					$("#email").on("input", function () {
						$("#warning_invalid_email").css("display", "none");
					});
				} else {
					$("#warning_invalid_email").css("display", "none");
				}

				if (data.indexOf("phone_error") !== -1) {
					$("#warning_phone").html("The phone is required.");
					$("#warning_phone").css("display", "block");

					$("#phone").on("input", function () {
						$("#warning_phone").css("display", "none");
					});
				} else {
					$("#warning_phone").css("display", "none");
				}

				if (data.indexOf("extension_error") !== -1) {
					$("#warning_photo").html("The file must be GIF, BMP, PNG, JPG or JPEG.");
					$("#warning_photo").css("display", "block");
				} else {
					if (data.indexOf("dimension_error") !== -1) {
						$("#warning_photo").html("The file must be less than or equal to 500x500px.");
						$("#warning_photo").css("display", "block");
					} else {
						if (data.indexOf("size_error") !== -1) {
							$("#warning_photo").html("The file must be less than or equal to 5MB");
							$("#warning_photo").css("display", "block");
						}
					}
				}
			}
		});
	});
});