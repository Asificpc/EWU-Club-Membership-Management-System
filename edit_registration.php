<?php

session_start();


if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}


include 'db_conn.php';


if (isset($_GET['id'])) {

    $registration_id = $_GET['id'];


    $sql = "SELECT * FROM event_registration

            WHERE registration_id=$registration_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

    } else {

        echo "Registration not found!";

        exit();

    }

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $registration_id = $_POST['registration_id'];

    $event_id = $_POST['event_id'];

    $student_id = $_POST['student_id'];

    $registration_date = $_POST['registration_date'];

    $attendance_status = $_POST['attendance_status'];

    $sql = "UPDATE event_registration SET

            event_id='$event_id',

            student_id='$student_id',

            registration_date='$registration_date',

            attendance_status='$attendance_status'

            WHERE registration_id=$registration_id";


    if ($conn->query($sql) === TRUE) {

        header("Location: view_registrations.php");

        exit();

    } else {

        echo "Error: " . $conn->error;

    }

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Edit Registration</title>

</head>

<body>


<h2>Edit Event Registration</h2>


<form method="POST">

<input type="hidden"

       name="registration_id"

       value="<?php echo $row['registration_id']; ?>">

Event ID:<br>

<input type="number"

       name="event_id"

       value="<?php echo $row['event_id']; ?>"

       required>

<br><br>

Student ID:<br>

<input type="number"

       name="student_id"

       value="<?php echo $row['student_id']; ?>"

       required>

<br><br>

Registration Date:<br>

<input type="date"

       name="registration_date"

       value="<?php echo $row['registration_date']; ?>"

       required>

<br><br>

Attendance Status:<br>

<select name="attendance_status" required>

    <option value="Present"

        <?php

        if ($row['attendance_status'] == "Present")

            echo "selected";

        ?>>

        Present

    </option>

    <option value="Absent"

        <?php

        if ($row['attendance_status'] == "Absent")

            echo "selected";

        ?>>

        Absent

    </option>

</select>

<br><br>


<input type="submit" value="Update Registration">

</form>

<br>

<a href="view_registrations.php">Back to Registrations</a> |

<a href="logout.php">Logout</a>


</body>

</html>