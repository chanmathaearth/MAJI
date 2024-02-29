<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:wght@300&family=Protest+Revolution&family=Quicksand&family=Roboto:wght@500&family=Sixtyfour&display=swap" rel="stylesheet" />
  <title>delivery</title>
  <style>
    body {
      font-family: Prompt, sans-serif;
      font-weight: 300;
      font-style: normal;
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .modal-content {
      display: flex;
      flex-direction: column;
      width: 50%;
      position: absolute;
      min-height: 300px;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      border-radius: 8px;
      background-color: white;
    }

    .modal-body {
      margin-top: 20px;
      min-height: 250px;
    }

    .modal-footer {
      display: flex;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <script>
    function openModal(modalID) {
      console.log("asd");
    }

    function closeModal(modalID) {
      document.getElementById(modalID).style.display = 'none';
    }
  </script> 
  <div id="navbar"></div>
  <div>
    <h1 class="text-3xl font-bold p-3">จัดส่งอาหาร</h1>
  </div>
  <div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">ลำดับ</th>
          <th scope="col" class="px-6 py-3">Order ID</th>
          <th scope="col" class="px-6 py-3">เวลา</th>
          <th scope="col" class="px-6 py-3">ราคา</th>
          <th scope="col" class="px-6 py-3">สถานะ</th>
          <th colspan="2" class="px-6 py-3">หมายเหตุ</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $json = file_get_contents('./delivery.json');
        $data = json_decode($json, true);
        $i = 1;
        foreach ($data as $value) {
          echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>";
          echo "<td scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>" . $i . "</td>";
          echo "<td class='px-6 py-4'>" . $value['orderID'] . "</td>";
          echo "<td class='px-6 py-4'>" . date('d-M-Y H:i:s', strtotime($value['date'])) . "</td>";
          echo "<td class='px-6 py-4'>" . $value['amount'] . "</td>";
          if ($value['status'] == 'pending') {
            echo "<td class='text-justify text-yellow-500'>" . "รอการยืนยัน" . "</td>";
          } else if ($value['status'] == 'cooking') {
            echo "<td class='text-justify text-orange-500'>" . "กำลังทำอาหาร" . "</td>";
          }
          echo "<td>" . $value['note'] . "</td>";
          echo "<td class='text-center' style='width: 150px'>
                  <button data-modal-target='default-modal' data-modal-toggle='default-modal' class='block text-white bg-[#ef4444] hover:bg-[#dc2626] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800' type='button'
                    onclick='document.getElementById(\"modal{$i}\").style.display = \"block\"'>
                    ดูรายละเอียด
                    </button>
                </td>";
          echo "</tr>";

          // Modal content
          echo "<div id='modal{$i}' class='modal'>
              <div class='modal-content'>
                <div class='text-2xl font-bold'>รายละเอียดคำสั่งซื้อ : <span class='text-red-500'>{$value['orderID']}</span></div>
                <div class='modal-body'>
                  <p>จัดส่ง</p><br>
                  <p>Jee</p>
                  <p>0800000000</p>
                  <svg width='15px' height='15px' version='1.0' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='64px' height='64px' viewBox='0 0 64 64' enable-background='new 0 0 64 64' xml:space='preserve' fill='#ff0000' stroke='#ff0000'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <g> <path fill='#ff0000' d='M32,0C18.745,0,8,10.745,8,24c0,5.678,2.502,10.671,5.271,15l17.097,24.156C30.743,63.686,31.352,64,32,64 s1.257-0.314,1.632-0.844L50.729,39C53.375,35.438,56,29.678,56,24C56,10.745,45.255,0,32,0z M32,38c-7.732,0-14-6.268-14-14 s6.268-14,14-14s14,6.268,14,14S39.732,38,32,38z'></path> <path fill='#ff0000' d='M32,12c-6.627,0-12,5.373-12,12s5.373,12,12,12s12-5.373,12-12S38.627,12,32,12z M32,34 c-5.523,0-10-4.478-10-10s4.477-10,10-10s10,4.478,10,10S37.523,34,32,34z'></path> </g> </g></svg>
                  <p>Location</p>
                  <p class='text-bold'>เมนู</p>
                
                </div>
               <div class='modal-footer'>
                  <button id='delivery' class='w-full bg-red-500 hover:bg-red-600 active:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 text-white font-bold rounded py-2 text-sm transition duration-300 ease-in-out' 
                  onclick='document.getElementById(\"modal{$i}\").style.display = \"none\"'>จัดส่งอาหาร</button>
               </div>
               </div>
         </div>";
          $i++;
        }
        ?>
      </tbody>
  </div>
</body>

</html>