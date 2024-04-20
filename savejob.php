<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Save Form</title>
</head>
<body>
	<h1>Add New Job</h1>
	<form action="jobs.php" method="POST">
		<label for="company">Company:</label>
		<input type="text" id="company" name="company"><br><br>

		<label for="title">Job Title:</label>
		<input type="text" id="title" name="title"><br><br>

		<label for="country">Country:</label>
		<input type="text" id="country" name="country"><br><br>

		<label for="location">Location:</label>
		<select id="location" name="location">
			<option value="">Select Location</option>
			<option value="On site">On site</option>
			<option value="Remote">Remote</option>
			<option value="Hybrid">Hybrid</option>
		</select><br><br>

		<label for="description">Description:</label>
		<textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

		<label for="skills">Skills:</label>
		<textarea id="skills" name="skills" rows="4" cols="50"></textarea><br><br>

		<label for="salary">Salary:</label>
		<input type="number" id="salary" name="salary"><br><br>

		<input type="submit" value="Save">
	</form>
</body>
</html>
