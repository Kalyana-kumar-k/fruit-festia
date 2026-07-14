<?php
session_start();

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password = $_POST['password'];   // raw password, do NOT sanitize

if (!empty($username) && !empty($password)) {

    $con = mysqli_connect("localhost", "root", "", "fruitfestia");
    if (!$con) {
        die("connection failed:" . mysqli_connect_error());
    }

    // Get user by username only
    $sql = "SELECT * FROM login WHERE username = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {

        $stored_hash = $row['password'];  // hashed password from DB

        if ($password === $stored_hash) {
            
            // Login success — set session AFTER verifying
            $_SESSION['username'] = $username;

            echo "<script>alert('Signin Successfully')</script>";
            header("Location: prdt-bill.php");
            exit();

        } else {
            echo "<h1>Invalid password</h1>";
        }

    } else {
        echo "<h1>User not found</h1>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);

} else {
    echo "<h1>Please enter username and password</h1>";
}
