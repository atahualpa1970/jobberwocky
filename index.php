<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Jobs</title>
</head>
<body>
    <h1>Filter Jobs</h1>
    <form action="/jobs.php" method="GET">
        <label for="title">Job:</label>
        <input type="text" id="title" name="title"><br><br>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country"><br><br>

        <label for="salary_min">Minimum Salary:</label>
        <input type="number" id="salary_min" name="salary_min"><br><br>

        <label for="salary_max">Maximum Salary:</label>
        <input type="number" id="salary_max" name="salary_max"><br><br>

        <label for="location">Location:</label>
        <select id="location" name="location">
            <option value="">Select Location</option>
            <option value="On site">On site</option>
            <option value="Remote">Remote</option>
            <option value="Hybrid">Hybrid</option>
        </select><br><br>

        <label for="country">Skills:</label>
        <input type="text" id="skills" name="skills"><br><br>

        <input type="submit" value="Filters">
    </form>
</body>
</html>
