<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <title>drink</title>
    <style>
        body {
            font-family: Prompt, sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .menu-item {
            width: 20%;
            margin: 2rem;
            padding: 1rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            align-items: center;
            transition: transform 0.3s ease-in-out;
        }

        .menu-item img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .menu-item:hover {
            transform: scale(1.05);
        }
    </style>
    <script src="fetchmainNav.js"></script>
    <script src="fetchNavbar.js"></script>
    <script src="fetchBasket.js"></script>
</head>

<body class="bg-white">

    <div id="mainnavbar"></div>

    <div class="grid place-content-center sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 mt-[3%]">
        <div class="col-span-3 sm:col-span-4">
            <div id="navbar"></div>

            <?php
            $servername = "localhost";
            $username = "S074T";
            $password = "VA12906";
            $dbname = "maji";

            // Create connection <div id="basket" class="w-w-1/4"></div>
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM menu WHERE menuTypeID = 5;";
            $result = mysqli_query($conn, $sql);
            echo '<form  method="get" class="grid place-content-center mr-[8%] ml-[8%] sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-1 mt-[5%]"> ';

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="menu-item w-[75%] h-70 content-center text-pretty mt-[3%] bg-white border border-gray-200 rounded-lg">
                        <img class="h-30 object-cover mb-2" src="' . $row["menuImage"] . '" alt="' . $row["menuName"] . '">
                        <p class="text-black">' . $row["menuName"] . '</p>
                        <p class="text-amber-500 text-sm">' . $row["menuDescription"] . '</p>
                        <p class="text-black mt-2">' . '฿' . $row["menuPrice"] . '.-</p>
                        <button type="submit" name="order_menu" value="Submit" class="mt-2 text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-900 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                            สั่งอาหาร
                        </button>
                    </div>';
                }
            } else {
                echo "0 results";
            }
            echo "</form>";

            // Close connection
            mysqli_close($conn);
            ?>
        </div>
        <div class="w-full">
            <div>
                <nav id="2">
                    <div class="flex justify-center text-nowrap p-5 pb-5 px-10 items-center pb-2">
                        <div class="flex space-x-4 items-center">
                            <div class="flex items-center justify-center bg-gray-50 rounded-3xl hidden sm:flex">
                                <div>
                                    <button id="delivery-button" class="flex text-nowrap px-4 py-2 rounded-3xl text-red-700 font-medium text-sm bg-red-500 text-white">
                                        ✔ จัดส่งถึงบ้าน
                                    </button>
                                </div>
                                <button id="pickup-button" class="text-nowraprounded-3xl px-4 py-2 rounded text-red-700 font-medium text-sm">
                                    ✔ รับที่ร้าน
                                </button>
                            </div>
                            <button id="dropdownbutton" data-dropdown-toggle="dropdown" class="flex items-center justify-center rounded-3xl px-4 rounded text-red-700 font-medium text-sm bg-gray-50 " type="button">
                                <svg fill="#D24527" class="size-4 mr-1" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 395.71 395.71" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <path d="M197.849,0C122.131,0,60.531,61.609,60.531,137.329c0,72.887,124.591,243.177,129.896,250.388l4.951,6.738 c0.579,0.792,1.501,1.255,2.471,1.255c0.985,0,1.901-0.463,2.486-1.255l4.948-6.738c5.308-7.211,129.896-177.501,129.896-250.388 C335.179,61.609,273.569,0,197.849,0z M197.849,88.138c27.13,0,49.191,22.062,49.191,49.191c0,27.115-22.062,49.191-49.191,49.191 c-27.114,0-49.191-22.076-49.191-49.191C148.658,110.2,170.734,88.138,197.849,88.138z">
                                            </path>
                                        </g>
                                    </g>
                                </svg> 
                                <p id="choose" class="text-nowrap p-2">เลือกที่อยู่</p>
                                <svg id="rotateicon" class="rotate-180 ml-10 w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6" style="margin-left: 10px;">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>


                            </button>
                            <a href="../home/index.html">
                                <button id="confirm-button" class="rounded-3xl px-4 py-2 rounded text-white font-medium text-sm bg-red-500 hidden sm:flex">
                                    ยืนยัน
                                </button>
                            </a>
                        </div>
                    </div>
                </nav>
                <div id="dropdownmenu" class="flex justify-center items-center z-50 hidden bg-gray-50 rounded-3xl shadow w-44 mb-2 mt-[-10px] max-[640px]:mx-auto max-[640px]:mt-[-20px] mx-auto min-[640px]:mx-[49.5%] min-[640px]:mt-[-18px]">
                    <ul class="py-2 text-gray-700 " aria-labelledby="dropdownDefaultButton">

                        <li class="">
                            <a href="#" class="flex items-center px-4 py-2 text-black rounded-3xl text-red-600 font-bold hover:bg-gray-100 w-44 " style="font-size: 14px;">
                                <svg fill="#D24527" class="mr-2 flex items-center justify-center size-4 mr-1" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 395.71 395.71" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <path d="M197.849,0C122.131,0,60.531,61.609,60.531,137.329c0,72.887,124.591,243.177,129.896,250.388l4.951,6.738 c0.579,0.792,1.501,1.255,2.471,1.255c0.985,0,1.901-0.463,2.486-1.255l4.948-6.738c5.308-7.211,129.896-177.501,129.896-250.388 C335.179,61.609,273.569,0,197.849,0z M197.849,88.138c27.13,0,49.191,22.062,49.191,49.191c0,27.115-22.062,49.191-49.191,49.191 c-27.114,0-49.191-22.076-49.191-49.191C148.658,110.2,170.734,88.138,197.849,88.138z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                ใช้ตำแหน่งปัจจุบัน</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center px-4 py-2 text-black rounded-3xl text-red-600 font-bold hover:bg-gray-100" style="font-size: 14px;">
                                <svg class=" mr-2 flex items-center justify-center size-4 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                                </svg>
                                เพิ่มที่อยู่</a>
                        </li>
                    </ul>
                </div>
                <div id="dropdownmenu2" class="flex flex-nowrap justify-center items-center z-50 hidden bg-gray-50 rounded-3xl shadow w-44 mb-2 mt-[-10px] max-[640px]:mx-auto max-[640px]:mt-[-20px] mx-auto min-[640px]:mx-[49.5%] min-[640px]:mt-[-18px]">
                    <ul class="py-2 text-gray-700 " aria-labelledby="dropdownDefaultButton">

                        <li>
                            <a href="#" class="flex items-center px-4 py-2 text-black rounded-3xl text-red-600 font-bold hover:bg-gray-50 w-44" style="font-size: 14px;">
                                <svg fill="#D24527" class="mr-2 flex items-center justify-center size-4 mr-1" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 395.71 395.71" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <path d="M197.849,0C122.131,0,60.531,61.609,60.531,137.329c0,72.887,124.591,243.177,129.896,250.388l4.951,6.738 c0.579,0.792,1.501,1.255,2.471,1.255c0.985,0,1.901-0.463,2.486-1.255l4.948-6.738c5.308-7.211,129.896-177.501,129.896-250.388 C335.179,61.609,273.569,0,197.849,0z M197.849,88.138c27.13,0,49.191,22.062,49.191,49.191c0,27.115-22.062,49.191-49.191,49.191 c-27.114,0-49.191-22.076-49.191-49.191C148.658,150.2,170.734,88.138,197.849,88.138z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                สาขา ลาดกระบัง</a>
                        </li>
                    </ul>
                </div>
                <div class="responpick flex items-center justify-center min-[1200px]:hidden rounded-3xl z-50 p-4">
                    <div>
                        <button id="delivery-button2" class="flex text-nowrap px-4 py-2 rounded-3xl text-red-700 font-medium text-sm bg-red-500 text-white">
                            ✔ จัดส่งถึงบ้าน
                        </button>
                    </div>
                    <div>
                        <button id="pickup-button2" class="text-nowrap rounded-3xl px-4 py-2 rounded text-red-700 font-medium text-sm">
                            ✔ รับที่ร้าน
                        </button>
                    </div>
                    <a href="../home/index.html">
                        <button id="confirm-button" class="rounded-3xl px-4 mx-4 py-2 rounded text-white font-medium text-sm bg-red-500 hover:bg-red-700">
                            ยืนยัน
                        </button>
                    </a>
                </div>
                <div class="flex justify-center items-center mt-[-5%]">
                    <div id="header-service-type-button" class="header-service-type-button-group delivery" ng-class="deliveryType">
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const toggleMenu = document.getElementById('toggleMenu');
                        const navbarHamburger = document.getElementById('navbar-hamburger');

                        toggleMenu.addEventListener('click', function() {
                            navbarHamburger.classList.toggle('hidden');
                        });
                    });
                    const deliveryButton = document.getElementById('delivery-button');
                    const pickupButton = document.getElementById('pickup-button');
                    const deliveryButton2 = document.getElementById('delivery-button2');
                    const pickupButton2 = document.getElementById('pickup-button2');
                    const dropdownButton = document.getElementById('dropdownbutton');
                    const dropdownMenu = document.getElementById('dropdownmenu');
                    const dropdownMenu2 = document.getElementById('dropdownmenu2');
                    const rotateIcon = document.getElementById('rotateicon');
                    const choose = document.getElementById('choose');

                    deliveryButton.addEventListener('click', function() {
                        this.classList.add('bg-red-500', 'text-white');
                        pickupButton.classList.remove('bg-red-500', 'text-white');
                        choose.innerText = 'เลือกที่อยู่';

                    });

                    pickupButton.addEventListener('click', function() {
                        this.classList.add('bg-red-500', 'text-white');
                        deliveryButton.classList.remove('bg-red-500', 'text-white');
                        choose.innerText = 'เลือกสาขา';
                    });
                    deliveryButton2.addEventListener('click', function() {
                        this.classList.add('bg-red-500', 'text-white');
                        pickupButton2.classList.remove('bg-red-500', 'text-white');
                        choose.innerText = 'เลือกที่อยู่';

                    });
                    pickupButton2.addEventListener('click', function() {
                        this.classList.add('bg-red-500', 'text-white');
                        deliveryButton2.classList.remove('bg-red-500', 'text-white');
                        choose.innerText = 'เลือกสาขา';
                    });

                    dropdownButton.addEventListener('click', function() {
                        if (choose.innerText === 'เลือกสาขา') {
                            dropdownMenu2.classList.toggle('hidden');
                            if (rotateIcon.style.transform === 'rotate(0deg)') {
                                rotateIcon.style.transform = 'rotate(180deg)';
                            } else {
                                rotateIcon.style.transform = 'rotate(0deg)';
                            }
                        } else {
                            dropdownMenu.classList.toggle('hidden');
                            if (rotateIcon.style.transform === 'rotate(0deg)') {
                                rotateIcon.style.transform = 'rotate(180deg)';
                            } else {
                                rotateIcon.style.transform = 'rotate(0deg)';
                            }
                        }
                    });
                </script>
            </div>
            <div id="basket" class="justify-center mt-[20%]"></div>
        </div>
    </div>
    </div>
    </div>

    <script>
        let counterValue = 0;

        function updateCounter() {
            document.getElementById("counter").innerText = counterValue;
        }

        function increment() {
            counterValue++;
            updateCounter();
        }

        function decrement() {
            if (counterValue == 0) {
                counterValue = 0
                updateCounter();
            } else {
                counterValue--;
                updateCounter();
            }


        }

        function submitOrder() {
            console.log("Order submitted with quantity: " + counterValue);
        }
    </script>

</body>

</html>