<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

include 'db_conn.php';


if (isset($_GET['id'])) {


    $student_id = $_GET['id'];


    $sql = "DELETE FROM Student WHERE student_id=$student_id";

    if ($conn->query($sql) === TRUE) {

        header("Location: view_students.php");

        exit();

    } else {

        echo "Error: " . $conn->error;

    }

}

$conn->close();

?>