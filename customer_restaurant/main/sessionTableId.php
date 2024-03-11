<?php
// Set the custom session save path to a directory
session_save_path("/Applications/XAMPP/xamppfiles/htdocs/maji/customer_restaurant/session_folder");

// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maji";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['tableId'])) {
    $tableId = $_POST['tableId'];
}

$orderSQL = "SELECT o.orderId 
            FROM orders o JOIN tabletype t 
            WHERE o.tableId = '$tableId' AND t.tableTypeStatus = 'ไม่ว่าง' AND o.orderStatus != 'เสร็จสิ้นออเดอร์' AND o.orderStatus != 'ยกเลิกออเดอร์'
            ORDER BY o.orderDateTime DESC LIMIT 1";
$orderResult = $conn->query($orderSQL);

if ($orderResult->num_rows > 0) {
    $ordersRow = $orderResult->fetch_assoc();
    $order = $ordersRow['orderId'];
}
echo "$order, $tableId";

$_SESSION['orderId'] = $order;

$orderId = $_SESSION['orderId'];

?>
