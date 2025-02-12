<?php
include ('db.php');

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];

    // Ensure the age is greater than 19
    if($age > 19){
        // Insert data into the students table
        $sql = "INSERT INTO students (name, age, grade) VALUES ('$name', '$age', '$grade')";
        $query = mysqli_query($conn, $sql);
        
        if($query){
            echo "
            <script>
            alert('Data inserted successfully');
            location.href='index.php'; // Redirect to the main page
            </script>
            ";
        }
        else{
            echo "
            <script>
            alert('Failed to insert data');
            </script>
            ";
        }
    } else {
        // Error message if age is 19 or less
        echo "
        <script>
        alert('Age should be greater than 19');
        location.href='index.php';
        </script>
        ";
    }
}
?>
