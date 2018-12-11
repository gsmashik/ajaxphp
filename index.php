<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>


<input type="text" name="id" id="id">
<input type="button" value="get data" id="get_data">
<div id="content">
	<div id="user_name"></div>
	<div id="user_email"></div>
</div>

	<script src="jquery.min.js"></script>
		
<script>
$(document).ready(function () {
	$("#get_data").click(function () {
	var id = $("#id").val();

	$.ajax({
		url:"process.php",
		type:"POST",
		data:{id:id},
		success: function (data) {
			var myObj = JSON.parse(data);
			$("#user_name").text(myObj.name);
			$("#user_email").text(myObj.email);
		}
	});
	});
});
</script>
</body>
</html>