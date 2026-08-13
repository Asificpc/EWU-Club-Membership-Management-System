<?php

session_start();


if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    include 'db_conn.php';

    $club_name = $_POST['club_name'];

    $category = $_POST['category'];

    $advisor_name = $_POST['advisor_name'];

    $founded_year = $_POST['founded_year'];

    $description = $_POST['description'];


    $sql = "INSERT INTO Club

            (club_name, category, advisor_name, founded_year, description)

            VALUES

            ('$club_name', '$category', '$advisor_name', '$founded_year', '$description')";


    if ($conn->query($sql) === TRUE) {

        echo "Club Added Successfully!

              <a href='view_clubs.php'>View Clubs</a>";

    } else {

        echo "Error: " . $conn->error;

    }

    $conn->close();

}

?>


<!DOCTYPE html>

<html>

<head>

    <title>Add Club</title>

</head>

<body>


<h2>Add Club</h2>

<form method="POST">

Club Name:<br>

<input type="text" name="club_name" required>

<br><br>

Category:<br>

<input type="text" name="category" required>

<br><br>

Advisor Name:<br>

<input type="text" name="advisor_name" required>

<br><br>

Founded Year:<br>

<input type="number" name="founded_year" required>

<br><br>

Description:<br>

<textarea name="description" rows="4" cols="40"></textarea>

<br><br>


<input type="submit" value="Add Club">

</form>

<br>


<a href="view_clubs.php">View Clubs</a> |

<a href="logout.php">Logout</a>


</body>

</html>