<?php
include "db.php";

// Get student ID from URL
$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Student</h2>
        
        <form action="" method="POST" class="card p-4 shadow-lg">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Age (Must be > 19):</label>
                <input type="number" name="age" value="<?= $row['age'] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Grade:</label>
                <input type="text" name="grade" value="<?= $row['grade'] ?>" class="form-control" required>
            </div>

            <button type="submit" name="update" class="btn btn-success w-100">Update Student</button>
            <a href="index.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];

    if ($age > 19) {
        $query = "UPDATE students SET name='$name', age='$age', grade='$grade' WHERE id=$id";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Student updated successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Failed to update student!');</script>";
        }
    } else {
        echo "<script>alert('Age must be greater than 19!');</script>";
    }
}
?>
