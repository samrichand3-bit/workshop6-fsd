<?php
include "db.php";

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $stmt = $conn->prepare(
        "UPDATE students SET name=?, email=?, course=? WHERE id=?"
    );
    $stmt->bind_param("sssi",
        $_POST['name'], $_POST['email'], $_POST['course'], $id
    );
    $stmt->execute();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Edit Student</h2>

    <form method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?= $row['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= $row['email'] ?>" required>
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" id="course" name="course" value="<?= $row['course'] ?>" required>
        </div>
        <button type="submit" name="update" class="btn">✓ Update Student</button>
    </form>

    <a href="index.php" class="btn-back">← Back to List</a>
</div>

</body>
</html>
