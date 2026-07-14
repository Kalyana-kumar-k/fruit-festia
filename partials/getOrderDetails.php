<?php
$conn = new PDO("mysql:host=localhost;dbname=fruitfestia", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
$stmt->execute([$id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if ($order) {
?>
    <tr>
        <td>Apple</td>
        <td><?= htmlspecialchars($order["apple_kg"]); ?></td>
        <td>150</td>
        <td><?= htmlspecialchars($order["apple_kg"] * 150); ?></td>
    </tr>
    <tr>
        <td>Banana</td>
        <td><?= htmlspecialchars($order["banana_kg"]); ?></td>
        <td>50</td>
        <td><?= htmlspecialchars($order["banana_kg"] * 50); ?></td>
    </tr>
    <tr>
        <td>Watermelon</td>
        <td><?= htmlspecialchars($order["watermenon_kg"]); ?></td>
        <td>20</td>
        <td><?= htmlspecialchars($order["watermenon_kg"] * 20); ?></td>
    </tr>
    <tr>
        <td>Grapes</td>
        <td><?= htmlspecialchars($order["grapes_kg"]); ?></td>
        <td>80</td>
        <td><?= htmlspecialchars($order["grapes_kg"] * 80); ?></td>
    </tr>
    <tr>
        <td>Mangoes</td>
        <td><?= htmlspecialchars($order["mango_kg"]); ?></td>
        <td>120</td>
        <td><?= htmlspecialchars($order["mango_kg"] * 120); ?></td>
    </tr>
    <tr>
        <td>Pineapple</td>
        <td><?= htmlspecialchars($order["pineapple_kg"]); ?></td>
        <td>50</td>
        <td><?= htmlspecialchars($order["pineapple_kg"] * 50); ?></td>
    </tr>
    <tr>
        <td>Guava</td>
        <td><?= htmlspecialchars($order["guava_kg"]); ?></td>
        <td>50</td>
        <td><?= htmlspecialchars($order["guava_kg"] * 50); ?></td>
    </tr>
    <tr>
        <td>Jackfruit</td>
        <td><?= htmlspecialchars($order["jackfruit_kg"]); ?></td>
        <td>40</td>
        <td><?= htmlspecialchars($order["jackfruit_kg"] * 40); ?></td>
    </tr>
    <tr>
        <td>Sappota</td>
        <td><?= htmlspecialchars($order["sappota_kg"]); ?></td>
        <td>45</td>
        <td><?= htmlspecialchars($order["sappota_kg"] * 45); ?></td>
    </tr>
    <tr>
        <td>Muskmelon</td>
        <td><?= htmlspecialchars($order["muskmelon_kg"]); ?></td>
        <td>45</td>
        <td><?= htmlspecialchars($order["muskmelon_kg"] * 45); ?></td>
    </tr>
    <tr>
        <td>Pomegranate</td>
        <td><?= htmlspecialchars($order["pomegranate_kg"]); ?></td>
        <td>250</td>
        <td><?= htmlspecialchars($order["pomegranate_kg"] * 250); ?></td>
    </tr>
    <tr>
        <td>Papaya</td>
        <td><?= htmlspecialchars($order["papaya_kg"]); ?></td>
        <td>40</td>
        <td><?= htmlspecialchars($order["papaya_kg"] * 40); ?></td>
    </tr>
    <thead>
    <tr>
        <th colspan="2">Total</th>
        <th colspan="2"><?= $order["total_amount"] ?></th>
    </tr>
    </thead>
    <input type="hidden" value="<?= $order['id']; ?>" id="orderId">
<?php
}
?>