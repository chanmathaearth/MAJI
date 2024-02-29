<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:wght@300&family=Protest+Revolution&family=Quicksand&family=Roboto:wght@500&family=Sixtyfour&display=swap" rel="stylesheet" />
    <title>ManageOrder</title>
</head>

<body style="
      font-family: Prompt, sans-serif;
      font-weight: 300;
      font-style: normal;">
    <div id="navbar"></div>
    <div class="mt-10 ml-10">
        <h1 class="text-3xl font-bold p-3">รายการอาหาร</h1>
    </div>
    <div class="relative overflow-x-auto m-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ลำดับ</th>
                    <th scope="col" class="px-6 py-3">Order ID</th>
                    <th scope="col" class="px-6 py-3">รับบริการ</th>
                    <th scope="col" class="px-6 py-3">เวลา</th>
                    <th scope="col" class="px-6 py-3">สถานะ</th>
                    <th scope="col" class="px-6 py-3">หมายเหตุ</th>
                    <th scope="col" class="px-6 py-3">รายละเอียด</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // get data from json file
                $json = file_get_contents('./order.json');
                $data = json_decode($json, true);

                // get data from api server
                // $response = file_get_contents('https://jsonplaceholder.typicode.com/users');
                // $data = json_decode($response);
                $i = 1;
                foreach ($data as $value) {
                    echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>";
                    echo "<td scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>" . $i . "</td>";
                    echo "<td class='px-6 py-4'>" . $value['orderID'] . "</td>";
                    echo "<td class='px-6 py-4'>" . $value['place'] . "</td>";
                    echo "<td class='px-6 py-4'>" . date('d-M-Y H:i:s', strtotime($value['date'])) . "</td>";
                    if ($value['status'] == 'pending') {
                        echo "<td class='text-justify text-yellow-500'>" . "รอการยืนยัน" . "</td>";
                    } else if ($value['status'] == 'cooking') {
                        echo "<td class='text-justify text-orange-500'>" . "กำลังทำอาหาร" . "</td>";
                    }
                    echo "<td>" . $value['note'] . "</td>";
                    echo "<td class='text-center' style='width: 150px'>
                        <button data-modal-target='default-modal' data-modal-toggle='default-modal' class='block text-white bg-[#ef4444] hover:bg-[#dc2626] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800' type='button'>
                        จัดการออเดอร์
                        </button>
                            </button>
                          </td>";
                    echo "</tr>";

                    // Modal content
                    echo "<div id='default-modal' tabindex='-1' aria-hidden='true' class='hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full'>
                    <div class='relative p-4 w-full max-w-2xl max-h-full'>
                        <!-- Modal content -->
                        <div class='relative bg-white rounded-lg shadow dark:bg-gray-700'>
                            <!-- Modal header -->
                            <div class='flex items-center justify-between p-2 md:p-5 border-b rounded-t dark:border-gray-600'>
                                <h3 class='text-xl font-semibold text-gray-900 dark:text-white'>
                                    รายละเอียดคำสั่งซื้อ
                                </h3>
                                <button type='button' class='text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white' data-modal-hide='default-modal'>
                                    <svg class='w-3 h-3' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 14 14'>
                                        <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6'/>
                                    </svg>
                                    <span class='sr-only'>Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class='p-4 md:p-5 space-y-4'>
                                <p class='text-base leading-relaxed text-gray-500 dark:text-gray-400'>
                                    รายละเอียดคำสั่งซื้อที่นี้...
                                </p>
                            </div>
                            <!-- Modal footer -->
                            <div class='flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600'>
                                <button data-modal-hide='default-modal' type='button' class='text-white bg-[#ef4444] hover:bg-[#dc2626] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>ทำอาหาร</button>
                            </div>
                        </div>
                    </div>
                </div>
                ";
                $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>