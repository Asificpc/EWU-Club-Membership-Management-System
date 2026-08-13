<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}


include 'db_conn.php';


$sql = "SELECT * FROM event_registration";

$result = $conn->query($sql);

?>


<!DOCTYPE html>

<html>

<head>

    <title>View Registrations</title>

</head>

<body>


<h2>Event Registration List</h2>

<table border="1" cellpadding="10">

    <tr>

        <th>Registration ID</th>

        <th>Event ID</th>

        <th>Student ID</th>

        <th>Registration Date</th>

        <th>Attendance Status</th>

        <th>Action</th>

    </tr>

<?php

if ($result->num_rows > 0) {


    while ($row = $result->fetch_assoc()) {

        echo "<tr>

                <td>".$row['registration_id']."</td>

                <td>".$row['event_id']."</td>

                <td>".$row['student_id']."</td>

                <td>".$row['registration_date']."</td>

                <td>".$row['attendance_status']."</td>

                <td>

                    <a href='edit_registration.php?id=".$row['registration_id']."'>Edit</a>

                    |

                    <a href='delete_registration.php?id=".$row['registration_id']."'

                       onclick=\"return confirm('Are you sure you want to delete this registration?');\">

                       Delete

                    </a>

                </td>

              </tr>";

    }


} else {

    echo "<tr>

            <td colspan='6'>No Registrations Found</td>

          </tr>";

}

?>

</table>

<br><br>

<a href="add_registration.php">Add Registration</a> |

<a href="logout.php">Logout</a>

</body>

</html>