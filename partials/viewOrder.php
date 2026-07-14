<?php
session_start();
$acntName = $_SESSION['username'];
$DBserver = "localhost";
$DBuser = "root";
$DBpassword = "";
$DBname = "fruitfestia";
try {
    $conn = new PDO("mysql:host=$DBserver;dbname=$DBname", $DBuser, $DBpassword);

    //PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connected Sussessfully..";

    $query = "select * from orders where acnt_name = '$acntName'";
    $stmt = $conn->query($query);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./viewOrder.css">
        <!-- CSS Bootstarp Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Document</title>
    </head>

    <body>
        <header>
            <h2>Hi <?php echo $_SESSION['username']; ?>...!</h2>
            <h1>@Fruit Festia</h1>
            <nav>
                <ul>
                    <li><a href="./prdt-bill.php">Products</a></li>
                    <li><a href="./bill.php">Bill</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                </ul>
            </nav>
        </header>

        <!-- Item info modal -->
        <?php include "./viewDetailsModal.php" ?>

        <form action="logout.php" method="POST">
            <button class="logout" style="margin-top:10px;" type="submit" name="Logout" value="log-out">Log-out</button>
        </form>
        <section>
            <?php
            if (count($orders) > 0) {
                foreach ($orders as $row) {
            ?>
                    <div class="cardContainer" id="order-<?= htmlspecialchars($row["id"]); ?>">
                        <h5 class="orderNo">order No:<?= htmlspecialchars($row["id"]); ?></h5>
                        <div class="cardNote">
                            <h6>Order Address:</h6>
                            <?= htmlspecialchars($row["contact_name"]); ?><br>
                            <?= htmlspecialchars($row["contact_address"]); ?><br>
                            <?= htmlspecialchars($row["place"]); ?>.<br>
                            <?= htmlspecialchars($row["contact"]); ?><br>
                            TotalAmt: RS. <span style="font-weight:bold;"><?= htmlspecialchars($row["total_amount"]); ?></span>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#viewDetails" class="detailsBtn" onclick="loadOrder(<?= htmlspecialchars($row['id']) ?>)">View Details</button>
                        </div>
                    </div>
        </section>
<?php
                }
            } else {
                echo "<h1 style='text-align:center;'>No Orders List<h1><br>";
            }
        } catch (PDOException $e) {
            echo "ERROR:" . $e->getMessage();
        }
?>

<!-- JS Bootstarp Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    /* fetch order info table*/
    function loadOrder(orderId) {
        fetch('./getOrderDetails.php?id=' + orderId)
            .then(res => res.text())
            .then(data => {
                //console.log(data);
                document.querySelector('#modalBody').innerHTML = data;
            });
    }

    //Delete order
    async function deleteOrder() {

        let deleteId = document.getElementById('orderId').value;

        if (!confirm("Delete this order?")) return;

        await fetch('./deleteOrder.php?id=' + deleteId);
        //Remove card
        let card = document.getElementById("order-" + deleteId);
        if (card) card.remove();

        //Close modal
        let modalE1 = document.getElementById('viewDetails');
        let modal = bootstrap.Modal.getOrCreateInstance(modalE1);
        modal.hide();

        setTimeout(()=>{
            document.querySelectorAll('.modal-backdrop').forEach(el=>el.remove());
            document.body.classList.remove('.modal-open');
            document.body.style.removeProperty('padding-right');
        },200)
    }
</script>
    </body>

    </html>