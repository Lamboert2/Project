<?php
include ('db.php');
if(isset($_GET['delete'])){
    $id= $_GET['delete'];
    $sql = "DELETE FROM students WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo "
        <script>
        confirm('data deleted successful');
        location.href='index.php';
        </script>
        ";
    }
    else{
        echo "
        <script>
        confirm('Failed to delete data');
        </script>
        ";
    }
}

?>