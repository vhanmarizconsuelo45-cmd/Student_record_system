<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $studentId = $_POST['student_id'];
    $fullName = $_POST['full_name'];
    $course = $_POST['course'];
    $yearLevel = $_POST['year_level'];
    $emailAddress = $_POST['email_address'];

    $stmt = $conn->prepare("UPDATE students SET student_id=?, full_name=?, course=?, year_level=?, email_address=? WHERE id=?");
    $stmt->execute([$studentId, $fullName, $course, $yearLevel, $emailAddress, $id]);

    header("Location: index.php");
}
?>
