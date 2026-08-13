<?php

session_start();


if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'db_conn.php';

    $student_name = $_POST['student_name'];

    $student_email = $_POST['student_email'];

    $student_phone = $_POST['student_phone'];

    $department = $_POST['department'];

    $batch = $_POST['batch'];


    $sql = "INSERT INTO Student(student_name, student_email, student_phone, department, batch)

            VALUES('$student_name','$student_email','$student_phone','$department','$batch')";


    if ($conn->query($sql) === TRUE) {

        echo "Student Added Successfully! <a href='view_students.php'>View Students</a>";

    } else {

        echo "Error : " . $conn->error;

    }

    $conn->close();

}

?>


<!DOCTYPE html>

<html>

<head>

    <title>Add Student</title>

</head>

<body>

<h2>Add Student</h2>

<form method="POST">

Name:<br>

<input type="text" name="student_name" required><br><br>

Email:<br>

<input type="email" name="student_email" required><br><br>

Phone:<br>

<input type="text" name="student_phone" required><br><br>

Department:<br>

<input type="text" name="department" required><br><br>

Batch:<br>

<input type="text" name="batch" required><br><br>

<input type="submit" value="Add Student">

</form>

<br>

<a href="view_students.php">View Students</a> |

<a href="logout.php">Logout</a>

</body>

</html>


