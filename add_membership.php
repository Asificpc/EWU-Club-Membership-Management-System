<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}


include 'db_conn.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_id = $_POST['student_id'];

    $club_id = $_POST['club_id'];

    $join_date = $_POST['join_date'];

    $status = $_POST['status'];

    $member_role = $_POST['member_role'];

    $sql = "INSERT INTO Membership

            (student_id, club_id, join_date, status, member_role)

            VALUES

            ('$student_id', '$club_id', '$join_date', '$status', '$member_role')";

    if ($conn->query($sql) === TRUE) {

        echo "Membership Added Successfully!

              <a href='view_membership.php'>View Memberships</a>";

    } else {

        echo "Error: " . $conn->error;

    }

    $conn->close();

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Add Membership</title>

</head>

<body>


<h2>Add Membership</h2>


<form method="POST">

Student ID:<br>

<input type="number" name="student_id" required>

<br><br>

Club ID:<br>

<input type="number" name="club_id" required>

<br><br>


Join Date:<br>

<input type="date" name="join_date" required>

<br><br>

Status:<br>

<select name="status" required>

    <option value="Active">Active</option>

    <option value="Pending">Pending</option>

    <option value="Inactive">Inactive</option>

</select>

<br><br>

Member Role:<br>

<select name="member_role" required>

    <option value="Member">Member</option>

    <option value="Secretary">Secretary</option>

    <option value="President">President</option>

    <option value="Vice President">Vice President</option>

</select>

<br><br>

<input type="submit" value="Add Membership">


</form>


<br>

<a href="view_membership.php">View Memberships</a> |

<a href="logout.php">Logout</a>

</body>

</html>