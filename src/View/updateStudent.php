<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST">
    <label>Name</label>
    <input name = 'student-name' type = 'text' value = '<?php echo $student["student_name"]; ?>'>
    <label>Birthday</label>
    <input name = 'birthday' type = 'date' value = '<?php echo $student["birthday"]; ?>'>
    <button type="submit">Edit</button>
</form>
</body>
</html>