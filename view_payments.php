<?php

session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

include 'db_conn.php';


$sql = "SELECT * FROM Payment";

$result = $conn->query($sql);

?>


<!DOCTYPE html>

<html>

<head>

    <title>View Payments</title>

</head>

<body>

<h2>Payment List</h2>

<table border="1" cellpadding="10">

    <tr>

        <th>Payment ID</th>

        <th>Membership ID</th>

        <th>Amount</th>

        <th>Payment Date</th>

        <th>Payment Method</th>

        <th>Payment Status</th>

        <th>Action</th>

    </tr>


<?php

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo "<tr>

                <td>".$row['payment_id']."</td>

                <td>".$row['membership_id']."</td>

                <td>".$row['amount']."</td>

                <td>".$row['payment_date']."</td>

                <td>".$row['payment_method']."</td>

                <td>".$row['payment_status']."</td>

                <td>

                    <a href='edit_payment.php?id=".$row['payment_id']."'>Edit</a>

                    |

                    <a href='delete_payment.php?id=".$row['payment_id']."'

                       onclick=\"return confirm('Are you sure you want to delete this payment?');\">

                       Delete

                    </a>

                </td>

              </tr>";

    }

} else {

    echo "<tr>

            <td colspan='7'>No Payments Found</td>

          </tr>";

}

?>

</table>

<br><br>

<a href="add_payment.php">Add Payment</a> |

<a href="logout.php">Logout</a>

</body>

</html>