<?php
include "db.php";

if (isset($_POST['add'])) {
    $stmt = $conn->prepare(
        "INSERT INTO students (name, email, course) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss",
        $_POST['name'], $_POST['email'], $_POST['course']
    );
    $stmt->execute();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Add Student</h2>

    <form method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter student name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter student email" required>
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" id="course" name="course" placeholder="Enter course name" required>
        </div>
        <button type="submit" name="add" class="btn">+ Add Student</button>
    </form>

    <a href="index.php" class="btn-back">← Back to List</a>
</div>

</body>
</html>
