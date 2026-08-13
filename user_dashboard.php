<?php




session_start();




if (!isset($_SESSION['user']) || $_SESSION['role'] != 'User') {

    header("Location: login.php");

    exit();

}




?>




<!DOCTYPE html>

<html>




<head>




    <title>User Dashboard - EWU Club Management</title>




    <link rel="stylesheet" href="style.css">




</head>




<body>




<h1>EWU Club Membership Management System</h1>




<h3>Welcome, <?php echo $_SESSION['user']; ?>!</h3>




<p>You are logged in as <b>User</b>.</p>




<hr>




<h2>User Dashboard</h2>




<p>Select an option:</p>




<ul>




    <li>

        <a href="view_clubs.php">View Clubs</a>

    </li>




    <li>

        <a href="view_membership.php">View My Membership</a>

    </li>




    <li>

        <a href="view_events.php">View Events</a>

    </li>




    <li>

        <a href="view_payments.php">View Payments</a>

    </li>




</ul>




<hr>




<a href="logout.php">Logout</a>




</body>




</html>