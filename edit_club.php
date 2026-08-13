<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

include 'db_conn.php';

if (isset($_GET['id'])) {

    $club_id = $_GET['id'];

    $sql = "SELECT * FROM Club WHERE club_id=$club_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

    } else {

        echo "Club not found!";

        exit();

    }

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $club_id = $_POST['club_id'];

    $club_name = $_POST['club_name'];

    $category = $_POST['category'];

    $advisor_name = $_POST['advisor_name'];

    $founded_year = $_POST['founded_year'];

    $description = $_POST['description'];

    $sql = "UPDATE Club SET

            club_name='$club_name',

            category='$category',

            advisor_name='$advisor_name',

            founded_year='$founded_year',

            description='$description'

            WHERE club_id=$club_id";

    if ($conn->query($sql) === TRUE) {

        header("Location: view_clubs.php");

        exit();

    } else {

        echo "Error: " . $conn->error;

    }

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Edit Club</title>

</head>

<body>


<h2>Edit Club</h2>

<form method="POST">

<input type="hidden" name="club_id"

       value="<?php echo $row['club_id']; ?>">

Club Name:<br>

<input type="text" name="club_name"

       value="<?php echo $row['club_name']; ?>" required>

<br><br>

Category:<br>

<input type="text" name="category"

       value="<?php echo $row['category']; ?>" required>

<br><br>

Advisor Name:<br>

<input type="text" name="advisor_name"

       value="<?php echo $row['advisor_name']; ?>" required>

<br><br>


Founded Year:<br>

<input type="number" name="founded_year"

       value="<?php echo $row['founded_year']; ?>" required>

<br><br>

Description:<br>

<textarea name="description" rows="4" cols="40"><?php echo $row['description']; ?></textarea>

<br><br>

<input type="submit" value="Update Club">


</form>

<br>

<a href="view_clubs.php">Back to Clubs</a> |

<a href="logout.php">Logout</a>

</body>

</html>