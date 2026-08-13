<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

include 'db_conn.php';

if (isset($_GET['id'])) {

    $registration_id = $_GET['id'];

    $sql = "DELETE FROM event_registration

            WHERE registration_id=$registration_id";

    if ($conn->query($sql) === TRUE) {

        header("Location: view_registrations.php");

        exit();

    } else {

        echo "Error: " . $conn->error;

    }

}

$conn->close();

?>