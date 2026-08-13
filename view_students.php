<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

include 'db_conn.php';


$sql = "SELECT * FROM Student";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Students</title>

</head>

<body>

<h2>Student List</h2>

<table border="1" cellpadding="10">

    <tr>

        <th>Student ID</th>

        <th>Name</th>

        <th>Email</th>

        <th>Phone</th>

        <th>Department</th>

        <th>Batch</th>

        <th>Action</th>

    </tr>

<?php

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo "<tr>

                <td>".$row['student_id']."</td>

                <td>".$row['student_name']."</td>

                <td>".$row['student_email']."</td>

                <td>".$row['student_phone']."</td>

                <td>".$row['department']."</td>

                <td>".$row['batch']."</td>

                <td>

                    <a href='edit_student.php?id=".$row['student_id']."'>Edit</a>

                    |

                    <a href='delete_student.php?id=".$row['student_id']."'

                       onclick=\"return confirm('Are you sure you want to delete this student?');\">

                       Delete

                    </a>

                </td>

              </tr>";

    }

} else {

    echo "<tr>

            <td colspan='7'>No Students Found</td>

          </tr>";

}

?>


</table>


<br><br>

<a href="add_student.php">Add Student</a> |

<a href="logout.php">Logout</a>

</body>

</html>