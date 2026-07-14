<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "fruitfestia";
$conn = mysqli_connect("$host", "$user", "$pass", "$dbname");
if (!$conn) {
    die("Connection failed:".mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$email = $_POST['email'];

if (empty($username) || empty($password) || empty($phone) || empty($email)) {
    die("Please fill in all fields.");
}
$check = mysqli_prepare($conn, "SELECT username,email FROM login WHERE username = ? OR email = ?");
mysqli_stmt_bind_param($check, "ss", $username, $email);
mysqli_stmt_execute($check);
mysqli_stmt_store_result($check);

if (mysqli_stmt_num_rows($check) > 0) {
    die("User already exists. Try a different username or email.");
}
mysqli_stmt_close($check);


$sql = "insert into login (username, password, phone, email) values(?,?,?,?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt,"ssss",$username,$password,$phone,$email);
$result = mysqli_stmt_execute($stmt);

if ($result){
    header("Location:index.html");
    exit();
}
else{
    echo "Invalid: " . mysqli_error($conn);
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>