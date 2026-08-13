<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

include 'db_conn.php';

$sql = "SELECT * FROM Event";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Events</title>

</head>

<body>

<h2>Event List</h2>

<table border="1" cellpadding="10">

    <tr>

        <th>Event ID</th>

        <th>Club ID</th>

        <th>Event Name</th>

        <th>Event Date</th>

        <th>Venue</th>

        <th>Description</th>

        <th>Action</th>

    </tr>

<?php

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo "<tr>

                <td>".$row['event_id']."</td>

                <td>".$row['club_id']."</td>

                <td>".$row['event_name']."</td>

                <td>".$row['event_date']."</td>

                <td>".$row['venue']."</td>

                <td>".$row['description']."</td>

                <td>

                    <a href='edit_event.php?id=".$row['event_id']."'>Edit</a>

                    |

                    <a href='delete_event.php?id=".$row['event_id']."'

                       onclick=\"return confirm('Are you sure you want to delete this event?');\">

                       Delete

                    </a>

                </td>

              </tr>";

    }


} else {


    echo "<tr>

            <td colspan='7'>No Events Found</td>

          </tr>";

}

?>


</table>

<br><br>


<a href="add_event.php">Add Event</a> |

<a href="logout.php">Logout</a>

</body>

</html>