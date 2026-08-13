<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

include 'db_conn.php';

if (isset($_GET['id'])) {

    $payment_id = $_GET['id'];

    $sql = "SELECT * FROM Payment WHERE payment_id=$payment_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

    } else {

        echo "Payment not found!";

        exit();

    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $payment_id = $_POST['payment_id'];

    $membership_id = $_POST['membership_id'];

    $amount = $_POST['amount'];

    $payment_date = $_POST['payment_date'];

    $payment_method = $_POST['payment_method'];

    $payment_status = $_POST['payment_status'];


    $sql = "UPDATE Payment SET

            membership_id='$membership_id',

            amount='$amount',

            payment_date='$payment_date',

            payment_method='$payment_method',

            payment_status='$payment_status'

            WHERE payment_id=$payment_id";

    if ($conn->query($sql) === TRUE) {

        header("Location: view_payments.php");

        exit();

    } else {

        echo "Error: " . $conn->error;

    }

}

?>


<!DOCTYPE html>

<html>

<head>

    <title>Edit Payment</title>

</head>

<body>

<h2>Edit Payment</h2>

<form method="POST">

<input type="hidden" name="payment_id"

       value="<?php echo $row['payment_id']; ?>">

Membership ID:<br>

<input type="number" name="membership_id"

       value="<?php echo $row['membership_id']; ?>" required>

<br><br>

Amount:<br>

<input type="number" step="0.01" name="amount"

       value="<?php echo $row['amount']; ?>" required>

<br><br>


Payment Date:<br>

<input type="date" name="payment_date"

       value="<?php echo $row['payment_date']; ?>" required>

<br><br>

Payment Method:<br>

<select name="payment_method" required>

    <option value="Bkash"

        <?php if($row['payment_method']=="Bkash") echo "selected"; ?>>

        Bkash

    </option>

    <option value="Nagad"

        <?php if($row['payment_method']=="Nagad") echo "selected"; ?>>

        Nagad

    </option>

    <option value="Cash"

        <?php if($row['payment_method']=="Cash") echo "selected"; ?>>

        Cash

    </option>

    <option value="Card"

        <?php if($row['payment_method']=="Card") echo "selected"; ?>>

        Card

    </option>

</select>

<br><br>

Payment Status:<br>

<select name="payment_status" required>

    <option value="Paid"

        <?php if($row['payment_status']=="Paid") echo "selected"; ?>>

        Paid

    </option>

    <option value="Pending"

        <?php if($row['payment_status']=="Pending") echo "selected"; ?>>

        Pending

    </option>

</select>

<br><br>

<input type="submit" value="Update Payment">


</form>

<br>

<a href="view_payments.php">Back to Payments</a> |

<a href="logout.php">Logout</a>

</body>

</html>