<?php
session_start();
$_SESSION['username'];
?>
<!doctype html>
<html>

<head>
    <title>BILL</title>
    <style>
        body {
            background-color: #ebebe0;
            background-size: cover;
        }

        #one {
            font-size: 20px;
            color: darkRed;
        }

        h2,
        h3 {
            color: darkRed;
        }

        input {
            color: darkGreen;
            text-transform: capitalize;
            text-align: center;
        }


        h1 {
            color: #660033;
            text-align: center;
            font-variant: small-caps;
        }

        legend {
            color: #660000;
            text-align: center;
        }

        .main {
            display: block;
            width: 50%;
            border-radius: 10px;
            background-color: #c2c2d6;
            margin: auto;
            padding: 20px 20px 0 20px;
            color: darkRed;
        }

        .order {
            line-height: 30px;
            font-size: 20px;
        }

        .details,
        span {
            line-height: 20px;
            font-size: 20px;
            text-transform: capitalize;
        }

        button {
            height: 30px;
            color: #bdb76b;
            border: 1px solid white;
            border-radius: 10px;
            background-color: white;
            color: #333300;
            margin-left: 20px;
        }

        button:hover {
            border: 1px solid #333300;
            background-color: wheat;
            color: white;
        }

        button:active {
            border: 1px solid white;
            background-color: white;
            color: #333300;
        }

        a {
            text-decoration: none;
            color: black;
        }

        #rupee {
            color: #003300;
            font-weight: 900;
            font-size: 20px;
            float: left;
        }

        .demo {
            width: 100%;
            border: 1px solid black;
        }

        .btns {
            display: flex;
            justify-content: space-between;

        }
    </style>
</head>

<body>
    <div class="btns">
        <div>
            <button><a href="prdt-bill.php">See products</a></button>
            <button><a href="./viewOrder.php">Order List</a></button>
            <button><a href="./contact.php">Contact</a></button>
        </div>
        <form action="logout.php" method="POST">
            <button style="margin-top:10px;" type="submit" name="Logout" value="log-out">Log-out</button>
        </form>
    </div>
    <h3>Hi <?php echo $_SESSION['username']; ?>!... Place your order here</h3>
    <div class="demo"></div><br>

    <!....BILL....>
        <div class="main">
            <form class="demo1" method="POST" action="orderPlaced.php" id="orderForm">
                <h1>#FRUIT FESIA</h1>
                <fieldset>
                    <legend>"Fueling your body with natures candy"</legend>
                    <p id="main">Enter your yields in kg:</p>
                    <pre class="order">
<label>Apple</label>       : RS.150perkg :<input type="number" id="apple" min="0" value="0" name="apple">kg
<label>Banana</label>      : RS.50perkg  :<input type="number" id="banana" min="0" value="0" name="banana">kg
<label>Watermelon</label>  : RS.20perkg  :<input type="number" id="wmelon" min="0" value="0" name="watermel">kg
<label>Grapes</label>      : RS.80perkg  :<input type="number" id="grape" min="0" value="0" name="grape">kg
<label>Mangoes</label>     : RS.120perkg :<input type="number" id="mango" min="0" value="0" name="mango">kg
<label>Pineapples</label>  : RS.50perkg  :<input type="number" id="pine" min="0" value="0" name="pineapple">kg
<label>Guava</label>       : RS.50perkg  :<input type="number" id="guava" min="0" value="0" name="guava">kg
<label>Jackfruit</label>   : RS.40perkg  :<input type="number" id="jack" min="0" value="0" name="jackf">kg
<label>Sappota</label>     : RS.45perkg  :<input type="number" id="sapo" min="0" value="0" name="sappota">kg
<label>Muskmelon</label>   : RS.45perkg  :<input type="number" id="mmelon" min="0" value="0" name="muskmel">kg
<label>Pomegranate</label> : RS.250perkg :<input type="number" id="pome" min="0" value="0" name="pomegranate">kg
<label>papaya</label>      : RS.40perkg  :<input type="number" id="papa" min="0" value="0" name="papaya">kg
<p id="rupee"></p><br>
<input type="hidden" name="totalAmount" id="totalAmount">
		<button type="button" onclick="sub()">Calculate Amount  </button>	
</pre>
                </fieldset><br>
                <div class="demo"></div><br>

                <!....DISPLAY DELIVERY....>
                    <div class="delivery_details">
                        <h2>Delivery Details:</h2>
                        <pre class="details">
<h3>Name   :<span id="fname"></span>
Address:<span id="adrs"></span>
Place  :<span id="plac"></span>
Contact:<span id="ph"></span></h3>
</pre>

                        <input type="hidden" name="submitted" id="submitted" value="no">

                        <!....DELIVERY INPUT...>
                            <h2>Enter Delivery Details</h2>
                            <label id="one">Full name:</label>
                            <input type="text" id="name" onkeyup="update()" name="inName" required>
                            <label id="one">Address:</label>
                            <input type="text" id="address" onkeyup="update()" name="inAddress" required><br>
                            <label id="one">Place:</label>
                            <input type="text" id="place" onkeyup="update()" name="inPlace" required>
                            <label id="one">Contact no:</label>
                            <input type="tel" pattern="[0-9]{10}" id="phone" onkeyup="update()" name="contactDel" maxlength="10" minlength="10" required>
                            <h3>Enter your username&password to confirm:</h3>
                            <input type="text" name="username" required placeholder="username">
                            <input type="password" name="codeword" required placeholder="password">
                            <ul>
                                <li>Before submit check your details:</li>
                            </ul>
                            <button type="submit" value="submit" name="submit" onclick="submitForm()">Submit Order</button><br><br>
                            <div>
            </form>
        </div>

        <script>
            //DELIVERY DETAILS
            function update() {
                let name = document.getElementById("name").value;
                let address = document.getElementById("address").value;
                let place = document.getElementById("place").value;
                let phone = document.getElementById("phone").value;
                document.getElementById("fname").innerHTML = name;
                document.getElementById("adrs").innerHTML = address;
                document.getElementById("plac").innerHTML = place;
                document.getElementById("ph").innerHTML = phone;
            };

            //BILL CALCULATION
            function sub() {
                let A = parseFloat(document.getElementById("apple").value);
                let B = parseFloat(document.getElementById("banana").value);
                let C = parseFloat(document.getElementById("wmelon").value);
                let D = parseFloat(document.getElementById("grape").value);
                let E = parseFloat(document.getElementById("mango").value);
                let F = parseFloat(document.getElementById("pine").value);
                let G = parseFloat(document.getElementById("guava").value);
                let H = parseFloat(document.getElementById("jack").value);
                let I = parseFloat(document.getElementById("sapo").value);
                let J = parseFloat(document.getElementById("mmelon").value);
                let K = parseFloat(document.getElementById("pome").value);
                let L = parseFloat(document.getElementById("papa").value);


                let m = A * 150;
                let n = B * 50;
                let o = C * 20;
                let p = D * 80;
                let q = E * 120;
                let r = F * 50;
                let s = G * 50;
                let t = H * 40;
                let u = I * 45;
                let v = J * 45;
                let w = K * 250;
                let x = L * 40;

                let total = m + n + o + p + q + r + s + t + u + v + w + x;
                document.getElementById("totalAmount").value =total;                
                document.getElementById("rupee").innerHTML = "GRAND TOTAL:RS." + total;
                alert("submitted successfully");
            }

            // Function to submit the form after calculations
            function submitForm() {
                // Mark the form as submitted
                document.getElementById("submitted").value = "yes";

                // Submit the form after calculation
                document.getElementById("orderForm").submit();
            }
        </script>
</body>

</html>