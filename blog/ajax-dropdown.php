<?php include('db-connect.php'); ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Simple AJAX dropdown with jquery + php</title>
		<link href="ajax-style.css" rel="stylesheet" type="text/css">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	</head>
	<body>
		<h1>Read Posts by Author:</h1>
		<?php 
			$query = "	SELECT username, user_id
						FROM users";
			$result = $db->query($query);
			if($result->num_rows >= 1){ ?>
			<select class="picker">
				<option>Choose an Author</option>
			<?php while($row = $result->fetch_assoc()){ ?>
				<option value="<?php echo $row['user_id']; ?>"><?php echo $row['username']; ?></option>
			<?php } ?>
		</select>
		<?php } ?>
		<div id="display-area">
			Choose an author to see their posts here
		</div>
			<script>
				//when the user changes the dropdown, trigger the AJAX request
				$(".picker").change(function(){
					//which user did they choose? ('this' refers to the select.picker)
					var user_id = this.value;
					//create ajax request
					$.ajax({
						type: 		"GET",
						url:		"ajax-display.php",
						data: 		{"user_id": user_id}, //send the user ID with the request
						dataType:	"html",
						success: function(response){
							$("#display-area").html(response);
						}
					});
				});
				
				//user feedback
				$(document).on({
					ajaxStart: function(){ $("body").addClass("loading") },
					ajaxStop: function(){ $("body").removeClass("loading") }
				});
			</script>
		</body>
</html>