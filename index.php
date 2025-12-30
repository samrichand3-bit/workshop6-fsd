<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Student List</h2>

    <a href="add.php" class="btn">+ Add Student</a>

    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Action</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM students");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['course'] ?></td>
            <td>
                <a class="edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a class="delete" href="delete.php?id=<?= $row['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
