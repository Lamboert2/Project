<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<body>
    
</body>
</html>
<h3>Student List</h3>
<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            
            <th>Name</th>
            <th>Age</th>
            <th>Grade</th>
            
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
            
            <td>{$row['name']}</td>
            <td>{$row['age']}</td>
            <td>{$row['grade']}</td>
          
        </tr>";
        }
        ?>
    </tbody>
</table>

<!-- Export to CSV or PDF Button -->
<div class="text-center mt-4">
<style>
    @media print {
        #download {
            display: none; /* Hide the download button when printing */
        }
    }
</style>
    <a href="" id="download" class="btn btn-primary btn-lg" onclick="window.print()">Download Report</a>
</div>
