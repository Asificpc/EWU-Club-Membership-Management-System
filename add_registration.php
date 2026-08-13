<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'db_conn.php';

    $event_id = $_POST['event_id'];

    $student_id = $_POST['student_id'];

    $registration_date = $_POST['registration_date'];

    $attendance_status = $_POST['attendance_status'];

    $sql = "INSERT INTO event_registration

            (event_id, student_id, registration_date, attendance_status)

            VALUES

            ('$event_id', '$student_id', '$registration_date', '$attendance_status')";

    if ($conn->query($sql) === TRUE) {

        echo "Registration Added Successfully!

              <a href='view_registrations.php'>View Registrations</a>";

    } else {

        echo "Error: " . $conn->error;

    }

    $conn->close();

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Add Event Registration</title>

</head>

<body>

<h2>Add Event Registration</h2>


<form method="POST">

Event ID:<br>

<input type="number" name="event_id" required>

<br><br>

Student ID:<br>

<input type="number" name="student_id" required>

<br><br>

Registration Date:<br>

<input type="date" name="registration_date" required>

<br><br>

Attendance Status:<br>

<select name="attendance_status" required>

    <option value="Present">Present</option>

    <option value="Absent">Absent</option>

</select>

<br><br>


<input type="submit" value="Add Registration">

</form>
<br>

<a href="view_registrations.php">View Registrations</a> |

<a href="logout.php">Logout</a>

</body>

</html>