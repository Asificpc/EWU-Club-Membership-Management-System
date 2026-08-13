<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}


include 'db_conn.php';


if (isset($_GET['id'])) {

    $club_id = $_GET['id'];

    $sql = "DELETE FROM Club WHERE club_id=$club_id";


    if ($conn->query($sql) === TRUE) {

        header("Location: view_clubs.php");

        exit();

    } else {

        echo "Error: " . $conn->error;

    }

}


$conn->close();

?>