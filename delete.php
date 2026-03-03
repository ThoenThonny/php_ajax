<?php
include './db.php';

$id = $_POST['emp_id'];

// get profile from db
$result = $conn->query("SELECT emp_profile FROM employee_tbl WHERE emp_id = $id");
$row = $result->fetch_assoc();
$profile = $row['emp_profile'];


$file_path = __DIR__ . "/uploads/" . $profile;

// delete file if exists
if (!empty($profile) && file_exists($file_path)) {
    unlink($file_path);
}

$conn->query("DELETE FROM employee_tbl WHERE emp_id = $id");

echo "success";
?>