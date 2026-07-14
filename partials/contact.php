<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui;
            height: 100vh;
            width: 100vw;
            background-image: url("./grow.jpg");
            background-repeat: no-repeat;
            background-size:cover;
            background-position: center;
            overflow: hidden;
        }

        header {
            background-color: black;
            height: 60px;
            width: 100%;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        header h2 {
            color: white;
        }

        header h1 {
            color: white
        }

        header nav {
            margin-top: 5px;

        }

        header nav ul li {
            padding: 15px;
            color: white;
            display: inline;
        }

        header nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 20px;
        }

        header nav ul li a:hover {
            text-decoration: underline;
        }

        header nav ul li a:active {
            text-decoration: none;
        }

        .detailsBtn,
        .logout {
            background-color: white;
            padding: 5px 10px 5px 10px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
            outline: none;
            position: relative;
            left: 93%;
        }

        main {
            margin: 30px;
            margin-left: 20%;
            transition: 0.3s ease-in;
        }
        main address:hover {
            color: maroon
        }

        main h3 {
            font-style: italic;
            font-size: 30px;
        }

        address {
            font-size: 25px;
        }

        footer {
            background-color: black;
            color: white;
            width: 100%;
            padding: 13px;
            position: relative;
            top: 28%;
        }

        .footer-icons {
            margin-bottom: 10px;
        }

        .footer-icons button {
            width: 30px;
            height: 30px;
            font-size: 15px;
            border-radius: 10px;
            border: none;
            padding: 5px;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h1>Fruit Festia</h1>
        <nav>
            <ul>
                <li><a href="./prdt-bill.php">Products</a></li>
                <li><a href="./bill.php">Bill</a></li>
                <li><a href="./viewOrder.php">Order List</a></li>
            </ul>
        </nav>
    </header>
    <form action="logout.php" method="POST">
        <button class="logout" style="margin-top:10px;" type="submit" name="Logout" value="log-out">Log-out</button>
    </form>
    <main>
        <address>
        <h3>Contact details:</h3>
            @fruitfestia<br>
            2 vallery way, Sydney.<br>
            contact:987-654-3210<br>
            mail: fruitfestia@zohomail.com
        </address>
    </main>
    <footer>
        <div>
            <h5>@fruitfestia</h5>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            <p>@copy rights - <span class="year"></span></p>
        </div>
        <div class="footer-icons">
            <button style="background-color:cornflowerblue; color:white;">F</button>
            <button style="background-color:white;color: black;">X</button>
            <button style="background:linear-gradient(45deg,#f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
                color:tomato">O</bitton>
        </div>
    </footer>

    <script>
        let year = document.querySelector(".year");
        let today = new Date();
        let nowYr = today.getFullYear();
        year.innerHTML = nowYr;
    </script>

</body>

</html>