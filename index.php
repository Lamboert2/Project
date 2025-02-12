<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Student Management System</h2>

        <!-- Form to Add a Student -->
        <form action="process.php" method="POST" class="mb-4">
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Age (Must be > 19):</label>
                <input type="number" name="age" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Grade:</label>
                <input type="text" name="grade" class="form-control" required>
            </div>
            <button type="submit" name="add" class="btn btn-success">Add Student</button>
        </form>

        <!-- Display Students -->
        <h3>Student List</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Grade</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               <?php
include ('db.php');
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
echo "
<tr>
 <td> {$row['id']} </td>
<td> {$row['name']}  </td>
<td> {$row['age']}  </td>
<td> {$row['grade']}  </td>

<td> 
<button type='submit'  class='btn btn-danger'><a href='delete.php?delete={$row['id']}' name='delete'>Delete</a></button> 
<button type='submit'  class='btn btn-success'><a href='edit.php?id={$row['id']}' name='edit'>Edit </a></button> </td>
</tr>
";
}
              ?>
            </tbody>
        </table>

        <!-- Export to CSV -->
        <a href="display.php" class="btn btn-primary">Download Report</a>
    </div>
</body>
</html>
