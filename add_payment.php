<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'db_conn.php';

    $membership_id = $_POST['membership_id'];

    $amount = $_POST['amount'];

    $payment_date = $_POST['payment_date'];

    $payment_method = $_POST['payment_method'];

    $payment_status = $_POST['payment_status'];


    $sql = "INSERT INTO Payment

            (membership_id, amount, payment_date, payment_method, payment_status)

            VALUES

            ('$membership_id', '$amount', '$payment_date', '$payment_method', '$payment_status')";

    if ($conn->query($sql) === TRUE) {

        echo "Payment Added Successfully!

              <a href='view_payments.php'>View Payments</a>";

    } else {

        echo "Error: " . $conn->error;

    }

    $conn->close();

}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Add Payment</title>

</head>

<body>

<h2>Add Payment</h2>

<form method="POST">

Membership ID:<br>

<input type="number" name="membership_id" required>

<br><br>

Amount:<br>

<input type="number" step="0.01" name="amount" required>

<br><br>

Payment Date:<br>

<input type="date" name="payment_date" required>

<br><br>

Payment Method:<br>

<select name="payment_method" required>

    <option value="Bkash">Bkash</option>

    <option value="Nagad">Nagad</option>

    <option value="Cash">Cash</option>

    <option value="Card">Card</option>

</select>

<br><br>

Payment Status:<br>

<select name="payment_status" required>

    <option value="Paid">Paid</option>

    <option value="Pending">Pending</option>

</select>

<br><br>

<input type="submit" value="Add Payment">


</form>

<br>

<a href="view_payments.php">View Payments</a> |

<a href="logout.php">Logout</a>

</body>

</html>