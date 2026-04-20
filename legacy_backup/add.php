<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $studentId = $_POST['student_id'];
    $fullName = $_POST['full_name'];
    $course = $_POST['course'];
    $yearLevel = $_POST['year_level'];
    $emailAddress = $_POST['email_address'];

    $stmt = $conn->prepare("INSERT INTO students (student_id, full_name, course, year_level, email_address) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$studentId, $fullName, $course, $yearLevel, $emailAddress]);

    header("Location: index.php");
}
?>
