<?php

session_start();


if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}


include 'db_conn.php';


if (isset($_GET['id'])) {

    $payment_id = $_GET['id'];

    $sql = "DELETE FROM Payment WHERE payment_id=$payment_id";

    if ($conn->query($sql) === TRUE) {

        header("Location: view_payments.php");

        exit();

    } else {

        echo "Error: " . $conn->error;

    }

}


$conn->close();

?>