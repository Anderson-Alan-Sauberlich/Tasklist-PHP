function updateTask($task_id) {
	var $title = $('#title').val();
	var $description = $('#description').val();
	var $finished_at = $('#finished_at').val();
	
	$.ajax({
		method: "POST",
		url: "/task/update/"+$task_id+"/",
		data: {
			title : $title,
			description : $description,
			finished_at : $finished_at
		}
	}).done(function(value) {
		var $value = JSON.parse(value);
		if ($value.errors.length > 0) {
			alert($value.errors);
		} else {
			window.location.replace("/");
		}
	});
}
function deleteTask($task_id) {
	$.ajax({
		method: "DELETE",
		url: "/task/delete/"+$task_id+"/"
	}).done(function(value) {
		var $value = JSON.parse(value);
		if ($value.errors.length > 0) {
			alert($value.errors);
		} else {
			window.location.replace("/");
		}
	});
}