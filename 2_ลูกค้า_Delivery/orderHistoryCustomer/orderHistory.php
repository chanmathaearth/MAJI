<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="fetch.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:wght@300&family=Protest+Revolution&family=Quicksand&family=Roboto:wght@500&family=Sixtyfour&display=swap" rel="stylesheet" />
    <title>ManageOrder</title>
</head>

<?php

session_start();

if (isset($_SESSION['accountId'])) {
    // Session ถูกต้อง
    $accountIdSession = $_SESSION['accountId'];
} else {
    // Session ไม่ถูกต้อง
    echo "User is not logged in.";
}

?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maji";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<script>
    function confirm(orderId, menuId, menuStatus) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'updateStatus.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                console.log(orderId);
                alert("อัพเดตเสร็จสิ้น");
            }
        };
        xhr.send('orderId=' + orderId + '&menuId=' + menuId + '&menuStatus=' + menuStatus);
    }

    function checkOrder(orderId, callback) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'getMenuStatus.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText.trim(); // Remove leading/trailing whitespaces
                console.log(result);
                callback(result); // Execute the callback function with the result
            }
        };
        xhr.send('orderId=' + orderId);
    }

    function handleResult(result) {
        if (result === 'true') {
            alert("เมนูทั้งหมดเสร็จสิ้นแล้ว");
            location.reload();
            // Perform actions when all menus are completed
        } else {
            alert("ยังมีเมนูบางรายการที่ยังไม่เสร็จสิ้น");
            // Perform actions when some menus are not completed
        }
    }

    function check() {
        alert('<?php echo "hello $accountIdSession"; ?>');
    }
</script>

<body style="
      font-family: Prompt, sans-serif;
      font-weight: 300;
      font-style: normal;">

    <div id="navbar"></div>
    <div class="mt-10 ml-10">
        <h1 class="text-3xl font-bold p-3">ประวัติการสั่งซื้อ</h1>
        <button type="button" onclick="check()" class="bg-gray-300 p-10">press</button>
    </div>
    <div class="relative overflow-x-auto m-10">
        <table class="w-full text-sm text-gray-500 text-center">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="py-3">Delivery ID</th>
                    <th scope="col" class="py-3">เวลา</th>
                    <th scope="col" class="px-6 py-3">ราคา</th>
                    <th scope="col" class="px-6 py-3">สถานะ</th>
                    <th scope="col" class="px-6 py-3">หมายเหตุ</th>
                    <th scope="col" class="px-10 py-3">รายละเอียด</th>
                </tr>
            </thead>    
            <tbody>
                <?php
                $customerSQL = "SELECT custId FROM customer WHERE accountId = $accountIdSession";
                $customerResult = $conn->query($customerSQL);

                if ($customerResult->num_rows > 0) {
                    $customerRow = $customerResult->fetch_assoc();

                    $custId = $customerRow['custId'];

                    $ordersSQL = "SELECT orderId, deliveryId, description, price, orderDateTime, orderStatus FROM orders WHERE custId = $custId";
                    $ordersResult = $conn->query($ordersSQL);


                    if ($ordersResult->num_rows > 0) {

                        while ($ordersRow = $ordersResult->fetch_assoc()) {

                            $orderId = $ordersRow['orderId'];
                            $deliveryId = $ordersRow['deliveryId'];
                            $description = $ordersRow['description'];
                            $price = $ordersRow['price'];
                            $orderDateTime = $ordersRow['orderDateTime'];
                            $orderStatus = $ordersRow['orderStatus'];

                            $deliverySQL = "SELECT deliveryName, deliveryPhone, `address`, deliveryStatus FROM delivery WHERE deliveryId = $deliveryId";
                            $deliveryResult = $conn->query($deliverySQL);

                            if ($deliveryResult->num_rows > 0) {
                                $deliveryRow = $deliveryResult->fetch_assoc();

                                $deliveryName = $deliveryRow['deliveryName'];
                                $deliveryPhone = $deliveryRow['deliveryPhone'];
                                $address = $deliveryRow['address'];
                                $deliveryStatus = $deliveryRow['deliveryStatus'];

                                $paymentSQL = "SELECT paymentId, promotionId, amountMoney, paymentMethod, paymentDateTime, paymentStatus FROM payment WHERE orderId = $orderId";
                                $paymentResult = $conn->query($paymentSQL);

                                if ($paymentResult->num_rows > 0) {
                                    $paymentRow = $paymentResult->fetch_assoc();

                                    $paymentId = $paymentRow['paymentId'];
                                    $promotionId = $paymentRow['promotionId'];
                                    $amountMoney = $paymentRow['amountMoney'];
                                    $paymentMethod = $paymentRow['paymentMethod'];
                                    $paymentDateTime = $paymentRow['paymentDateTime'];
                                    $paymentStatus = $paymentRow['paymentStatus'];

                                    echo "$promotionId------";

                                    echo "<tr class='bg-white border-b'>";
                                    echo "<td scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center'>" . $deliveryId . "</td>";
                                    echo "<td class='py-4'>" . $orderDateTime . "</td>";
                                    echo "<td class='px-8 py-4'>" . $amountMoney . "</td>";

                                    if ($orderStatus === 'ได้รับออเดอร์') {
                                        echo "<td class='text-yellow-500'>" . "ได้รับออเดอร์" . "</td>";
                                    } else if ($deliveryStatus === 'กำลังจัดการออเดอร์') {
                                        echo "<td class='text-orange-500'>" . "กำลังปรุงอาหาร" . "</td>";
                                    } else if ($deliveryStatus === 'กำลังจัดส่ง') {
                                        echo "<td class='text-blue-500'>" . "กำลังจัดส่ง" . "</td>";
                                    } else if ($deliveryStatus === 'จัดส่งเสร็จสิ้น') {
                                        echo "<td class='text-green-500'>" . "จัดส่งเสร็จสิ้น" . "</td>";
                                    }else if ($orderStatus === 'ยกเลิกออเดอร์') {
                                        echo "<td class='text-red-500'>" . "ยกเลิกออเดอร์" . "</td>";
                                    }

                                    if ($description === ''){
                                        $description = '-';
                                    }

                                    echo "<td class='px-8 py-4'>" . $description . "</td>";
                                    echo "<td class='text-center' style='width: 150px'>
                        <button data-modal-target='default-modal-$orderId' data-modal-toggle='default-modal-$orderId' class='mx-auto block text-white bg-[#ef4444] hover:bg-[#dc2626] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center' type='button'>
                        ดูรายละเอียด
                        </button>
                            </button>
                          </td>";
                                    echo "</tr>";
                                    // Modal content
                                    echo "<div id='default-modal-$orderId' tabindex='-1' aria-hidden='true' class='hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full'>
                                    <div class='relative p-4 w-full max-w-9xl max-h-full'>
                                        <!-- Modal content -->
                                        <div class='relative bg-white rounded-lg shadow'>
                                            <!-- Modal header -->
                                            <div class='flex items-center justify-between p-2 md:p-5 border-b rounded-t'>
                                                <h3 class='text-xl font-semibold text-gray-900'>
                                                    รายละเอียดคำสั่งซื้อ
                                                </h3>
                                                <button type='button' class='text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center' data-modal-hide='default-modal-$orderId'>
                                                    <svg class='w-3 h-3' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 14 14'>
                                                        <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6'/>
                                                    </svg>
                                                    <span class='sr-only'>Close modal</span>
                                                </button>
                                            </div>";
                                    echo "<!-- Modal body -->
                                    <div class='m-5 bg-gray-100 p-6 rounded-lg shadow-lg backdrop-filter backdrop-blur-md'>
                                    <h2 class='text-xl font-bold mb-3 text-gray-800'>ชื่อ: $deliveryName</h2>
                                    <h2 class='text-l mb-3 text-green-500'><i class='mr-5 fa-solid fa-phone'></i>$deliveryPhone</h2>
                                    <h2 class='text-l text-red-700'><i class='mr-5 fa-solid fa-location-dot'></i>$address</h2>
                                        </div>
                                
                                        <h2 class='ml-10 text-lg'>เมนู</h2>
                                        <div class='md:p-5 space-y-4'>
                                        <div class='grid grid-cols-3 gap-10 text-center'>";

                                        $orderDetailSQL = "SELECT menuId, menuStatus, menuQuantity FROM orderDetail WHERE orderId=$orderId";
                                        $orderDetailResult = $conn->query($orderDetailSQL);

                                    if ($orderDetailResult->num_rows > 0) {
                                        while ($orderDetailRow = $orderDetailResult->fetch_assoc()) {
                                            $menuId = $orderDetailRow['menuId'];
                                            $menuStatus = $orderDetailRow['menuStatus'];
                                            $menuQuantity = $orderDetailRow['menuQuantity'];

                                            $menuSQL = "SELECT menuName, menuPrice FROM menu WHERE menuId=$menuId";
                                            $menuResult = $conn->query($menuSQL);

                                            if ($menuResult->num_rows > 0) {
                                                $menuRow = $menuResult->fetch_assoc();
                                                $menuName = $menuRow['menuName'];
                                                $menuPrice = $menuRow['menuPrice'];

                                                echo "
                                                <div class='text-lg font-bold text-gray-500 p-2 border-2 rounded-md'>$menuQuantity</div>
                                                <div class='text-base text-gray-800 mb-2'>$menuName</div>
                                                <div class='text-xl text-green-600'>฿$menuPrice.00</div>";

                                            } else {
                                                echo "Menu not found.";
                                            }


                                            
                                        }
                                    }

                                    $promotionSQL = "SELECT promotionName, discount FROM promotion WHERE promotionId = $promotionId";
                                    $promotionResult = $conn->query($promotionSQL);
                                    
                                    if ($promotionResult->num_rows > 0) {
                                        $promotionRow = $promotionResult->fetch_assoc();
                                    
                                        $promotionName = $promotionRow['promotionName'];
                                        $discount = $promotionRow['discount'];

                                        if ($discount === null) {
                                            $totalDiscount = 0;
                                        } else {
                                            $totalDiscount = ($price + 40) * $discount;
                                        }
                                    
                                        
                                    
                                        echo "</div>
                                        <div class='m-5 bg-gray-100 p-6 rounded-lg shadow-lg backdrop-filter backdrop-blur-md'>
                                            <h2 class='text-xl font-bold mb-3 text-gray-800'>ค่าอาหาร: ฿$price.00</h2>
                                            <h2 class='text-l mb-3 text-gray-500'><i class='mr-4 fa-solid fa-truck'></i>ค่าจัดส่ง: ฿40.00</h2>
                                            <h2 class='text-l mb-3 text-red-700'><i class='mr-4 fa-solid fa-ticket'></i>โปรโมชั่น: ฿$totalDiscount.00</h2>
                                            <h2 class='text-xl font-bold mb-3 text-green-500'>ทั้งหมด: ฿$amountMoney.00</h2>
                                            <h2 class='text-l mb-3 text-blue-700'><i class='mr-4 fa-solid fa-money-bill-transfer'></i>วิธีการชำระ: $paymentMethod</h2>
                                        </div>
                                        </div>";
                                    } else {
                                        // Handle the case when no promotion is found
                                        echo "No promotion found.";
                                    }
                                }
                            }
                        }
                        // echo "<!-- Modal footer -->
                        // <div>
                        //   <div class='flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b'>
                        //         <button data-modal-hide='default-modal-$orderId' onclick='checkOrder($orderId, handleResult)' type='button' class='text-white bg-[#ef4444] hover:bg-[#dc2626] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center'>เสร็จสิ้นออเดอร์</button>
                        //     </div>
                        // </div>
                // ";
                    }
                }
                ?>

            </tbody>
        </table>
    </div>

</body>

</html>