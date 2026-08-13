<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'db_conn.php';

    $club_id = $_POST['club_id'];

    $event_name = $_POST['event_name'];

    $event_date = $_POST['event_date'];

    $venue = $_POST['venue'];

    $description = $_POST['description'];

    $sql = "INSERT INTO Event

            (club_id, event_name, event_date, venue, description)

            VALUES

            ('$club_id', '$event_name', '$event_date', '$venue', '$description')";

    if ($conn->query($sql) === TRUE) {

        echo "Event Added Successfully!

              <a href='view_events.php'>View Events</a>";

    } else {

        echo "Error: " . $conn->error;

    }

    $conn->close();

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Add Event</title>

</head>

<body>


<h2>Add Event</h2>


<form method="POST">

Club ID:<br>

<input type="number" name="club_id" required>

<br><br>

Event Name:<br>

<input type="text" name="event_name" required>

<br><br>


Event Date:<br>

<input type="date" name="event_date" required>

<br><br>

Venue:<br>

<input type="text" name="venue" required>

<br><br>

Description:<br>

<textarea name="description" rows="4" cols="40"></textarea>

<br><br>

<input type="submit" value="Add Event">


</form>


<br>

<a href="view_events.php">View Events</a> |

<a href="logout.php">Logout</a>

</body>

</html>