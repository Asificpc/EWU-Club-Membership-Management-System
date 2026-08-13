<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}


include 'db_conn.php';


$sql = "SELECT * FROM Club";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Clubs</title>

</head>

<body>

<h2>Club List</h2>

<table border="1" cellpadding="10">

    <tr>

        <th>Club ID</th>

        <th>Club Name</th>

        <th>Category</th>

        <th>Advisor</th>

        <th>Founded Year</th>

        <th>Description</th>

        <th>Action</th>

    </tr>

<?php

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {


        echo "<tr>

                <td>".$row['club_id']."</td>

                <td>".$row['club_name']."</td>

                <td>".$row['category']."</td>

                <td>".$row['advisor_name']."</td>

                <td>".$row['founded_year']."</td>

                <td>".$row['description']."</td>

                <td>

                    <a href='edit_club.php?id=".$row['club_id']."'>Edit</a>

                    |

                    <a href='delete_club.php?id=".$row['club_id']."'

                       onclick=\"return confirm('Are you sure you want to delete this club?');\">

                       Delete

                    </a>

                </td>

              </tr>";

    }

} else {

    echo "<tr>

            <td colspan='7'>No Clubs Found</td>

          </tr>";

}

?>


</table>

<br><br>

<a href="add_club.php">Add Club</a> |

<a href="logout.php">Logout</a>

</body>

</html>