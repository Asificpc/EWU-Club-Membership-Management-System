<?php




session_start();




include 'db_conn.php';




if (isset($_POST['login'])) {




    $username = $_POST['username'];

    $password = $_POST['password'];




    // First check Admin

    $sql = "SELECT * FROM admin

            WHERE admin_email='$username' AND password='$password'";




    $result = $conn->query($sql);




    if ($result->num_rows > 0) {




        $_SESSION['user'] = $username;

        $_SESSION['role'] = 'Admin';




        header("Location: dashboard.php");

        exit();




    } else {




        // Check Student/User

        $sql = "SELECT * FROM student

                WHERE student_email='$username'

                AND password='$password'";




        $result = $conn->query($sql);




        if ($result->num_rows > 0) {




            $student = $result->fetch_assoc();




            $_SESSION['user'] = $username;

            $_SESSION['student_id'] = $student['student_id'];

            $_SESSION['role'] = $student['role'];




            header("Location: user_dashboard.php");

            exit();




        } else {




            $error = "Invalid Email or Password!";




        }

    }

}




?>




<!DOCTYPE html>




<html>




<head>




    <title>EWU Club Membership Management System - Login</title>




</head>




<body>




<h2>EWU Club Membership Management System</h2>




<h3>Login</h3>




<form method="POST">




Email:<br>




<input type="email" name="username" required>




<br><br>




Password:<br>




<input type="password" name="password" required>




<br><br>




<input type="submit" name="login" value="Login">




</form>




<?php




if (isset($error)) {




    echo "<p style='color:red;'>$error</p>";




}




?>




</body>




</html>