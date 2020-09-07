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
<a href="index.php?page=addStudent">Add</a>
<table>
    <tbody>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Birthday</th>
        <th>Action</th>
    </tr>
    <?php foreach ($students as $key => $student) : ?>
    <tr>
        <td><?php echo $student->getStudentId(); ?></td>
        <td><?php echo $student->getStudentName(); ?></td>
        <td><?php echo $student->getBirthday(); ?></td>
        <td colspan="2">
            <button><a href="index.php?page=edit&id=<?php echo $student->getStudentId(); ?>">Edit</a></button>
            <button><a href="index.php?page=delete&id=<?php echo $student->getStudentId(); ?>">Delete</a></button>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

