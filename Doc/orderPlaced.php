<?php
session_start();
$acntName = $_SESSION['username'];

$con = new mysqli('localhost', 'root', '', 'fruitfestia');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
if (isset($_POST["submitted"]) && $_POST["submitted"] === "yes") {
    // Collect input safely
    $uname   = $_POST['username'] ?? '';
    $password   = $_POST['codeword'] ?? '';
    $inName     = $_POST['inName'] ?? '';
    $inAddress  = $_POST['inAddress'] ?? '';
    $inPlace    = $_POST['inPlace'] ?? '';
    $contactDel = $_POST['contactDel'] ?? '';
    $apple = $_POST['apple'] ?? '';
    $banana = $_POST['banana'] ?? '';
    $watermel = $_POST['watermel'] ?? '';
    $grape = $_POST['grape'] ?? '';
    $mango = $_POST['mango'] ?? '';
    $pineapple = $_POST['pineapple'] ?? '';
    $guava = $_POST['guava'] ?? '';
    $jackf = $_POST['jackf'] ?? '';
    $sappota = $_POST['sappota'] ?? '';
    $muskmel = $_POST['muskmel'] ?? '';
    $pomegranate = $_POST['pomegranate'] ?? '';
    $papaya = $_POST['papaya'] ?? '';
    $totalAmount = $_POST['totalAmount'] ?? '';


    // Use prepared statement
    if ($acntName === $uname) {
        $stmt = $con->prepare("SELECT username, phone, email FROM login WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $uname, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {

            $stmt = $con->prepare("INSERT INTO `orders` 
    (acnt_name, contact_name, contact_address, place, contact, apple_kg, banana_kg, watermenon_kg, grapes_kg, 
    mango_kg, pineapple_kg, guava_kg, jackfruit_kg, sappota_kg, muskmelon_kg, pomegranate_kg, papaya_kg,total_amount) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");

            if ($stmt === false) {
                // Output the error
                die('MySQL prepare error: ' . $con->error);
            }

            // Assuming all the weight values are floats and others are strings
            $stmt->bind_param(
                "ssssiiiiiiiiiiiiii",
                $uname,
                $inName,
                $inAddress,
                $inPlace,
                $contactDel,
                $apple,
                $banana,
                $watermel,
                $grape,
                $mango,
                $pineapple,
                $guava,
                $jackf,
                $sappota,
                $muskmel,
                $pomegranate,
                $papaya,
                $totalAmount
            );


            if ($stmt->execute()) {
                echo "<script>
       alert('you order has been places successfully!');
       window.location.href = 'viewOrder.php';
       </script>";
            } else {
                echo "Error placing the order.";
            }
        } else {
            echo "Invalid username/Password.. ";
        }
        $stmt->close();
        $con->close();
    } else {
        echo "Invalid username/Password.. ";
    }
}
