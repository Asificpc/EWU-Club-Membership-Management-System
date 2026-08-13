<?php

session_start();


if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}


include 'db_conn.php';


if (isset($_GET['id'])) {

    $student_id = $_GET['id'];

    $sql = "SELECT * FROM Student WHERE student_id=$student_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

    } else {

        echo "Student not found!";

        exit();

    }

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $student_id = $_POST['student_id'];

    $student_name = $_POST['student_name'];

    $student_email = $_POST['student_email'];

    $student_phone = $_POST['student_phone'];

    $department = $_POST['department'];

    $batch = $_POST['batch'];

    $sql = "UPDATE Student SET

            student_name='$student_name',

            student_email='$student_email',

            student_phone='$student_phone',

            department='$department',

            batch='$batch'

            WHERE student_id=$student_id";

    if ($conn->query($sql) === TRUE) {

        header("Location: view_students.php");

        exit();

    } else {

        echo "Error: " . $conn->error;

    }

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Edit Student</title>

</head>

<body>

<h2>Edit Student</h2>

<form method="POST">


<input type="hidden" name="student_id"

       value="<?php echo $row['student_id']; ?>">

Name:<br>

<input type="text" name="student_name"

       value="<?php echo $row['student_name']; ?>" required>

<br><br>

Email:<br>

<input type="email" name="student_email"

       value="<?php echo $row['student_email']; ?>" required>

<br><br>


Phone:<br>

<input type="text" name="student_phone"

       value="<?php echo $row['student_phone']; ?>" required>

<br><br>

Department:<br>

<input type="text" name="department"

       value="<?php echo $row['department']; ?>" required>

<br><br>

Batch:<br>

<input type="text" name="batch"

       value="<?php echo $row['batch']; ?>" required>

<br><br>

<input type="submit" value="Update Student">


</form>

<br>

<a href="view_students.php">Back to Students</a> |

<a href="logout.php">Logout</a>

</body>

</html>