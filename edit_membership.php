<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

include 'db_conn.php';

if (isset($_GET['id'])) {

    $membership_id = $_GET['id'];

    $sql = "SELECT * FROM Membership WHERE membership_id=$membership_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

    } else {

        echo "Membership not found!";

        exit();

    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $membership_id = $_POST['membership_id'];

    $student_id = $_POST['student_id'];

    $club_id = $_POST['club_id'];

    $join_date = $_POST['join_date'];

    $status = $_POST['status'];

    $member_role = $_POST['member_role'];

    $sql = "UPDATE Membership SET

            student_id='$student_id',

            club_id='$club_id',

            join_date='$join_date',

            status='$status',

            member_role='$member_role'

            WHERE membership_id=$membership_id";

    if ($conn->query($sql) === TRUE) {

        header("Location: view_membership.php");

        exit();

    } else {

        echo "Error: " . $conn->error;

    }

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Edit Membership</title>

</head>

<body>

<h2>Edit Membership</h2>

<form method="POST">

<input type="hidden" name="membership_id"

       value="<?php echo $row['membership_id']; ?>">


Student ID:<br>

<input type="number" name="student_id"

       value="<?php echo $row['student_id']; ?>" required>

<br><br>

Club ID:<br>

<input type="number" name="club_id"

       value="<?php echo $row['club_id']; ?>" required>

<br><br>

Join Date:<br>

<input type="date" name="join_date"

       value="<?php echo $row['join_date']; ?>" required>

<br><br>

Status:<br>

<select name="status" required>

    <option value="Active" <?php if($row['status']=="Active") echo "selected"; ?>>

        Active

    </option>

    <option value="Pending" <?php if($row['status']=="Pending") echo "selected"; ?>>

        Pending

    </option>

    <option value="Inactive" <?php if($row['status']=="Inactive") echo "selected"; ?>>

        Inactive

    </option>

</select>

<br><br>

Member Role:<br>

<select name="member_role" required>


    <option value="Member" <?php if($row['member_role']=="Member") echo "selected"; ?>>

        Member

    </option>


    <option value="Secretary" <?php if($row['member_role']=="Secretary") echo "selected"; ?>>

        Secretary

    </option>

    <option value="President" <?php if($row['member_role']=="President") echo "selected"; ?>>

        President

    </option>

    <option value="Vice President" <?php if($row['member_role']=="Vice President") echo "selected"; ?>>

        Vice President

    </option>

</select>

<br><br>

<input type="submit" value="Update Membership">

</form>

<br>

<a href="view_membership.php">Back to Memberships</a> |

<a href="logout.php">Logout</a>

</body>

</html>