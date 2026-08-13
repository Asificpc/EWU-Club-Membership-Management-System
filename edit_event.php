<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

include 'db_conn.php';

if (isset($_GET['id'])) {

    $event_id = $_GET['id'];

    $sql = "SELECT * FROM Event WHERE event_id=$event_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

    } else {

        echo "Event not found!";

        exit();

    }

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $event_id = $_POST['event_id'];

    $club_id = $_POST['club_id'];

    $event_name = $_POST['event_name'];

    $event_date = $_POST['event_date'];

    $venue = $_POST['venue'];

    $description = $_POST['description'];

    $sql = "UPDATE Event SET

            club_id='$club_id',

            event_name='$event_name',

            event_date='$event_date',

            venue='$venue',

            description='$description'

            WHERE event_id=$event_id";

    if ($conn->query($sql) === TRUE) {

        header("Location: view_events.php");

        exit();

    } else {

        echo "Error: " . $conn->error;

    }

}

?>


<!DOCTYPE html>

<html>

<head>

    <title>Edit Event</title>

</head>

<body>


<h2>Edit Event</h2>

<form method="POST">

<input type="hidden" name="event_id"

       value="<?php echo $row['event_id']; ?>">

Club ID:<br>

<input type="number" name="club_id"

       value="<?php echo $row['club_id']; ?>" required>

<br><br>

Event Name:<br>

<input type="text" name="event_name"

       value="<?php echo $row['event_name']; ?>" required>

<br><br>

Event Date:<br>

<input type="date" name="event_date"

       value="<?php echo $row['event_date']; ?>" required>

<br><br>


Venue:<br>

<input type="text" name="venue"

       value="<?php echo $row['venue']; ?>" required>

<br><br>

Description:<br>

<textarea name="description" rows="4" cols="40"><?php echo $row['description']; ?></textarea>

<br><br>
<input type="submit" value="Update Event">


</form>

<br>

<a href="view_events.php">Back to Events</a> |

<a href="logout.php">Logout</a>

</body>

</html>