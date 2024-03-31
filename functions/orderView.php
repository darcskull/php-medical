<?php
require_once 'initialDataBase.php';
require_once 'common.php';

function personalOrders($conn, $userId): array
{
    $orders = [];
    $sql = "SELECT * FROM `order_data` WHERE userId = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        $order = new stdClass();
        $order->id = $row['id'];
        $order->medicineId = $row['medicineId'];
        $medicineRow = getMedicine($conn, $order->medicineId);
        $order->medicine = $medicineRow['name'];
        $order->number = $row['number'];
        $order->price = $row['price'];
        $order->address = $row['address'];
        $order->userId = $row['userId'];
        $userRow = getUser($conn, $order->userId);
        $order->userEmail = $userRow['email'];
        $order->phoneNumber = $row['phoneNumber'];
        $orders[] = $order;
    }

    return $orders;
}