<?php
include "db.php";

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="students_report.csv"');

$output = fopen("php://output", "w");
fputcsv($output, array('ID', 'Name', 'Age', 'Grade'));

$result = mysqli_query($conn, "SELECT * FROM students");
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

fclose($output);
?>
