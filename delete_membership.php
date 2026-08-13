<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

include 'db_conn.php';


if (isset($_GET['id'])) {

    $membership_id = $_GET['id'];

    $sql = "DELETE FROM Membership WHERE membership_id=$membership_id";

    if ($conn->query($sql) === TRUE) {

        header("Location: view_membership.php");

        exit();

    } else {

        echo "Error: " . $conn->error;

    }

}

$conn->close();

?>