<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

include 'db_conn.php';


$sql = "SELECT * FROM Membership";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Memberships</title>

</head>

<body>


<h2>Membership List</h2>

<table border="1" cellpadding="10">

    <tr>

        <th>Membership ID</th>

        <th>Student ID</th>

        <th>Club ID</th>

        <th>Join Date</th>

        <th>Status</th>

        <th>Member Role</th>

        <th>Action</th>

    </tr>

<?php

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo "<tr>

                <td>".$row['membership_id']."</td>

                <td>".$row['student_id']."</td>

                <td>".$row['club_id']."</td>

                <td>".$row['join_date']."</td>

                <td>".$row['status']."</td>

                <td>".$row['member_role']."</td>

                <td>

                    <a href='edit_membership.php?id=".$row['membership_id']."'>Edit</a>

                    |

                    <a href='delete_membership.php?id=".$row['membership_id']."'

                       onclick=\"return confirm('Are you sure you want to delete this membership?');\">

                       Delete

                    </a>

                </td>

              </tr>";

    }

} else {

    echo "<tr>

            <td colspan='7'>No Memberships Found</td>

          </tr>";

}

?>


</table>

<br><br>

<a href="add_membership.php">Add Membership</a> |

<a href="logout.php">Logout</a>

</body>

</html>