<?php
session_start();
require_once '../functions/medicineView.php';
require_once '../functions/initialDataBase.php';
$userId = $_SESSION["userid"];
$medicines = personalMedicines($conn, $userId);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Order</title>
    <link rel="stylesheet" href="../css/style.css">
    <script>
        function updatePrice() {
            var medicineSelect = document.getElementById("medicine");
            var selectedMedicineIndex = medicineSelect.selectedIndex;
            var selectedMedicinePrice = parseFloat(medicineSelect.options[selectedMedicineIndex].text.split(' ')[1]);
            var quantity = parseInt(document.getElementById("number").value);
            var totalPrice = selectedMedicinePrice * quantity;
            document.getElementById("price").value = totalPrice.toFixed(2);
        }

        window.onload = function () {
            updatePrice();
        };
    </script>
</head>
<body>
<form method="post" action="../functions/logout.php">
    <button type="submit">Logout</button>
</form>
<form action="personalOrdersView.php" method="get" class="form-container">
    <button type="submit">Back to Orders</button>
</form>
<form action="personalMedicinesView.php" method="get" class="form-container">
    <button type="submit">Back to Medicines</button>
</form>
<h2>Create Order</h2>
<form action="../functions/createOrder.php" method="POST">
    <div>Address:</div>
    <div>
        <input type="text" id="address" name="address" required>
    </div>
    <div>Quantity:</div>
    <div>
        <input type="number" id="number" name="number" value="1" min="1" required onchange="updatePrice()">
    </div>
    <div>Price $:</div>
    <div>
        <input type="text" id="price" name="price" value="0" readonly required pattern="\d+(\.\d+)?">
    </div>
    <div>Medicine + Price $:</div>
    <div>
        <select id="medicine" name="medicine" required onchange="updatePrice()">
            <?php foreach ($medicines as $medicine): ?>
                <option value="<?php echo $medicine->id; ?>">
                    <?php echo $medicine->name . ' ' . $medicine->price; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit">Create Order</button>
</form>
<div id="errorMessage">
    <?php
    if (!isset($_GET['order'])) {
        exit();
    } else {
        $statusCheck = $_GET['order'];

        if ($statusCheck == "emptyAddress") {
            echo "<span style='color: red;'>The address should not be empty</span>";
            exit();
        } else if ($statusCheck == "success") {
            echo "<span style='color: green;'>The order was created successfully</span>";
            exit();
        }
    }
    ?>
</div>
</body>
</html>
