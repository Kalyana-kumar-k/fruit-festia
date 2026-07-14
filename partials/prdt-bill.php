<?php
session_start();
$_SESSION['username'];
?>
<!Doctype html>
<html>

<head>
    <title>PRODUCTS</title>
    <style>
        body {
            background-color: #00264d;
            font-variant: small-caps;
            color: #d1d1e0;
        }

        .products {
            border-radius: 10px;
            background-color: #003366;
            width: 92%;
            height: 440px;
            margin: auto;
        }

        img {
            border-radius: 10px;
            height: 100px;
            width: 200px;
            margin: 20px 20px;
            float: left;
        }

        button {
            border-radius: 5px;
            border: none;
            background-color: #4caf50;
            color: white;
            padding: 5px 5px;
            text-decoration: none;
            display: block;
            width: 10%;
            font-size: 20px;
            cursor: pointer;
            margin-left: 10px;
        }

        form {
            text-align: center;
        }

        button:hover {
            transition: transform 1s;
            transform: rotatey(360deg);
        }

        a {
            text-decoration: none;
            color: white;
        }

        .btns {
            display: flex;
            justify-content: end;
        }

        .logout {
            position: relative;
            left: 80%;
        }
    </style>

    <head>

    <body>

        <!....PRODUCTS IMG DIV...>
            <div class="btns">
                <button><a href="bill.php">Purchase</a></button>
                <button><a href="./viewOrder.php">Order List</a></button>
                <button><a href="./contact.php">Contact</a></button>
            </div>

            <h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
            <h2>Our products here:</h2>

            <div class="products">
                <img src="./images/apple.jpeg">
                <img src="./images/banana.jpeg">
                <img src="./images/watermelon.jpeg">
                <img src="./images/grapes.jpeg">
                <img src="./images/mango.jpeg">
                <img src="./images/pine.jpeg">
                <img src="./images/guava.jpeg">
                <img src="./images/jack.jpeg">
                <img src="./images/sappota.jpeg">
                <img src="./images/muskmelon.jpeg">
                <img src="./images/pomegranate.jpeg">
                <img src="./images/papaya.jpeg">
            </div>
            <form action="logout.php" method="POST">
                <button class="logout" style="margin-top:10px;" type="submit" name="Logout" value="log-out">Log-out</button>
            </form>
    </body>

</html>

<?php
?>