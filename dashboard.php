<?php




session_start();




// Only Admin can access this dashboard

if (!isset($_SESSION['user']) || $_SESSION['role'] != 'Admin') {

    header("Location: login.php");

    exit();

}




?>




<!DOCTYPE html>




<html>




<head>




    <title>EWU Club Membership Management System</title>




    <link rel="stylesheet" href="style.css">




</head>




<body>




<h1>EWU Club Membership Management System</h1>




<h3>Welcome, <?php echo $_SESSION['user']; ?>!</h3>




<p>You are logged in as <b>Admin</b>.</p>




<hr>




<h2>Admin Dashboard</h2>




<p>Select an option:</p>




<ul>




    <li>

        <a href="view_students.php">Student Management</a>

    </li>




    <li>

        <a href="view_clubs.php">Club Management</a>

    </li>




    <li>

        <a href="view_membership.php">Membership Management</a>

    </li>




    <li>

        <a href="view_events.php">Event Management</a>

    </li>




    <li>

        <a href="view_payments.php">Payment Management</a>

    </li>




    <li>

        <a href="view_registrations.php">Event Registration Management</a>

    </li>




</ul>




<hr>




<a href="logout.php">Logout</a>




</body>




</html>