$(document).ready(function(){
	$(".edit_icon").click(function(){
		var employee_id = $(this).data("id");

		$.ajax({
			url: "/resources/edit/edit_form.php",
			type: "POST",
			data: {employee_id: employee_id},
			success: function(response){ 
				$("#modal_body").html(response); 
				$("#modal").css("display", "block");
			}
		});
	});
});