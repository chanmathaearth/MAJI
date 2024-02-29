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
  <title>Delivery</title>
</head>

<body>
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
  <div class="bg-white pr-8 pl-8 pb-8">
    <div class="grid place-content-center gap-2 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 mt-[3%]">
      <div class="col-span-3 sm:col-span-4">
        <div id="blaktomenu" class="hover:text-red-600 ">
          <span class="flex">
            <svg class="justify-center mt-0.5 mr-1 ring-1 ring-red-500 rounded-full" height="20px" width="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </g>
            </svg>
            ส่งอาหาร
          </span>
          </a>
        </div>
      </div>
    </div>
    <div class="grid grid-cols-2  gap-2 mt-[3%] max-[650px]:grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 justify-center">
      <div class="w-full mx-auto p-8 rounded-md shadow-xl m-2 ">
        <h2 class="text-red-700 text-2xl font-semibold mb-6">ข้อมูลติดต่อ</h2>

        <form action="process_form.php" method="post">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-black-500">ชื่อ :</label>
            <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md">
          </div>

          <div class="mb-4">
            <label for="npm-install-copy-button" class="block text-sm font-medium text-black-500">เบอร์ติดต่อ :</label>
            <div class="relative flex-grow">
              <input type="tel" id="npm-install-copy-button" name="phone" class="mt-1 p-2 w-full border rounded-md">
              <button id="copy-button" class="absolute end-0 top-1/2 -translate-y-1/2 text-black-500 dark:text-red-400 hover:bg-gray-200 dark:hover:bg-red-800 rounded-lg p-2 inline-flex items-center justify-center">
                <span id="default-icon">
                  <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                  </svg>
                </span>
                <span id="success-icon" class="hidden inline-flex items-center">
                  <svg class="w-3.5 h-3.5 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                  </svg>
                </span>
              </button>
              <div id="tooltip-copy-npm-install-copy-button" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                <span id="default-tooltip-message">Copy to clipboard</span>
                <span id="success-tooltip-message" class="hidden">Copied!</span>
                <div class="tooltip-arrow" data-popper-arrow></div>
              </div>
            </div>
          </div>



          <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-black-500">ที่อยู่ :</label>
            <input type="tel" id="address" name="address" class="mt-1 p-2 w-full border rounded-md">
          </div>
        </form>
        <div class="flex-shrink-0 text-sm mt-6 text-red-700">*ลูกค้าเป็นสมาชิก</div>
      </div>


      <div>
        <section class="w-5/6  mb-[2%] ml-[2%] bg-white rounded-md mr-2 sm:py-8 lg:py-8">
          <div class="grid grid-cols-1 text-gray-900 divide-y divide-gray-900 w-auto mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center mt-[3%]">
              <h1 class="text-black"> รายการอาหารที่สั่ง </h1>
            </div>
            <div class="mt-[2%]">
              <div class="flex items-center text-l text-red-700 mt-[10%]">
                <label for="count-menu" class="">1</label>
                <div class="flex-shrink-0 text-sm pl-2">เซตปลาแซลมอนย่างเกลือกระทะร้อน</div>
                <div class="ml-auto text-right">฿345.-</div>
              </div>
            </div>
            <div class="flex justify-between mt-6 p-2">
              <div>ทั้งหมด</div>
              <div>฿345.-</div>
            </div>

            <div class="grid-cols-1 items-center ">
              <div class="mt-6">
                <label for="payment-method" class="block text-sm font-medium text-black-700">วิธีการชำระเงิน :</label>
                <select id="payment-method" name="payment-method" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 sm:text-sm">
                  <option value="">เลือกวิธีชำระเงิน</option>
                  <option value="cash">เงินสด</option>
                  <option value="transfer">โอนชำระ</option>
                </select>

                <button class="w-full mt-6 bg-red-500 hover:bg-red-600 active:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 text-white font-bold rounded py-2 text-sm transition duration-300 ease-in-out" onclick='document.getElementById("modal").style.display = "block" '>ยืนยัน</button>
              </div>
            </div>
        </section>
      </div>
      <div id="modal" class="modal">
        <div class="modal-content">
          <div class="text-2xl font-bold">รายละเอียดคำสั่งซื้อ : <span class="text-red-500">เลขที่ออเดอร์</span></div>
          <div class="modal-body">
            <p>วิธีการชำระเงิน</p><br>
            <p>ชื่อลูกค้า :</p>
            <p>เบอร์โทรลูกค้า :</p>
            <p>สถานที่จัดส่ง :</p>
            <svg width="15px" height="15px" version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#ff0000" stroke="#ff0000">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <g>
                  <path fill="#ff0000" d="M32,0C18.745,0,8,10.745,8,24c0,5.678,2.502,10.671,5.271,15l17.097,24.156C30.743,63.686,31.352,64,32,64 s1.257-0.314,1.632-0.844L50.729,39C53.375,35.438,56,29.678,56,24C56,10.745,45.255,0,32,0z M32,38c-7.732,0-14-6.268-14-14 s6.268-14,14-14s14,6.268,14,14S39.732,38,32,38z"></path>
                  <path fill="#ff0000" d="M32,12c-6.627,0-12,5.373-12,12s5.373,12,12,12s12-5.373,12-12S38.627,12,32,12z M32,34 c-5.523,0-10-4.478-10-10s4.477-10,10-10s10,4.478,10,10S37.523,34,32,34z"></path>
                </g>
              </g>
            </svg>
            <p class="text-bold">เมนูที่สั่ง :</p>
          </div>
          <div class="modal-footer">
            <button id="delivery" class="w-full bg-red-500 hover:bg-red-600 active:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 text-white font-bold rounded py-2 text-sm transition duration-300 ease-in-out" onclick='document.getElementById("modal").style.display = "none" '>เสร็จสิ้น</button>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script>
    function openModal(modalID) {
      console.log(" asd");
    }

    function closeModal(modalID) {
      document.getElementById(modalID).style.display = "none";
    }
  </script>

</body>

</html>