<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Onest:wght@100..900&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Revolution&family=Quicksand&family=Rajdhani:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sixtyfour&display=swap"
        rel="stylesheet" />
    <style>
        html {
            scroll-behavior: smooth;
        }

        .h {
            background-image: url('https://images.pexels.com/photos/2098085/pexels-photo-2098085.jpeg?cs=srgb&dl=pexels-rajesh-tp-2098085.jpg&fm=jpg');
            background-repeat: no-repeat;
            background-position: 10%;
            backdrop-filter: blur(20px);
            position: relative;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100vh;
            width: auto;
            height: auto;
        }
        .sidebar-container {
            width: 100%;
            position: fixed;

        }
    </style>
</head>

<body style="
      font-family: Prompt, sans-serif;
      font-weight: 300;
      font-style: normal;
    ">
     <a href="/pages/hometogo/index.html">
        <div class="sidebar-container z-50 p-4 " id="sidebar">
			<svg class="w-6 h-6 text-gray-800 dark:text-white transform hover:scale-110 transition-transform duration-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
			  </svg>
		</div>
        </a>

    <div class="h flex justify-center items-center h-full bg-neutral-600 z-30 p-10 max-[650px]:p-0">
        <section class="gradient-form h-full">
            <div class="h-full p-20">
                <div
                    class="g-6 flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
                    <div class="w-full">
                        <div class="block rounded-lg bg-neutral-800 shadow-lg ">
                            <div class="g-0 lg:flex lg:flex-wrap">
                                <div class="px-4 py-4 md:px-0 lg:w-6/12">
                                    <div class="md:mx-6 md:my-[-20px] md:p-12">
                                        <div class="text-center animate-pulse">
                                            <img class="mx-auto w-48" src="/assets/logo.png" alt="logo" />
                                        </div>

                                        <form id="myForm">
                                            <div class="mb-5">
                                                <label for="email"
                                                    class=" block mb-2 text-sm font-medium text-white">อีเมลของคุณ</label>
                                                <input type="email" name="email" id="email"
                                                    class="bg-white text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                    placeholder="example@gmail.com" required="">
                                            </div>
                                            <div class="mb-5">
                                                <label for="password"
                                                    class=" block mb-2 text-sm font-medium text-white">รหัสผ่านของคุณ</label>
                                                <input type="password" name="password" id="password"
                                                    class="bg-white text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                    placeholder="รหัสผ่าน" required="">
                                            </div>
                                            <div class="mb-5">
                                                <label for="firstname"
                                                    class=" block mb-2 text-sm font-medium text-white">ชื่อของคุณ</label>
                                                <input type="text" name="firstname" id="firstname"
                                                    class="bg-white text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                    placeholder="ชื่อ" required="">
                                            </div>
                                            <div class="mb-5">
                                                <label for="lastname"
                                                    class=" block mb-2 text-sm font-medium text-white">นามสกุลของคุณ</label>
                                                <input type="text" name="lastname" id="lastname"
                                                    class="bg-white text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                    placeholder="นามสกุล" required="">
                                            </div>
                                            <div class="mb-5">
                                                <label for="phone"
                                                    class=" block mb-2 text-sm font-medium text-white">เบอร์โทรศัพท์ของคุณ</label>
                                                <input type="tel" name="phone" id="phone"
                                                    class="bg-white text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                    placeholder="เบอร์โทรศัพท์" required="">
                                            </div>
                                            <button id="registrationForm" type="button" onclick="submitForm()"
                                                class="mb-6 w-full text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">ลงทะเบียน</button>
                                            <p class="text-sm font-light text-gray-500">
                                                มีบัญชีแล้วใช่ไหม? <a href="../login/login.html"
                                                    class="font-medium text-primary-600 hover:underline">เข้าสู่ระบบ</a>
                                            </p>
                                        </form>
                                    </div>
                                </div>

                                <!-- คอลัมน์ด้านขวาที่มีพื้นหลังและคำอธิบาย -->
                                <div
                                    class="relative flex justify-center items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none animate-pulse">
                                    <div class="absolute inset-0 w-full h-full z-30"
                                        style="background-image: url('https://pg.world/upl/ckeditor4_files/904e4e9ce648ba13dcab83feceb3c4e2.jpeg'); filter: blur(2px);">
                                    </div>
                                    <div class="px-4 py-6 text-white md:mx-6 md:p-12 z-50">
                                        <h4 class="mb-2 text-xl font-semibold">
                                            เปิดประสบการณ์ใหม่
                                        </h4>
                                        <p class="text-sm text-left block">
                                            เปิดประสบการณ์ใหม่ในโลกแห่งรสชาติญี่ปุ่น: การสร้างปรากฏการณ์ที่ไม่เหมือนใคร
                                            ด้วยความพิถีพิถันในการเสิร์ฟอาหารที่มีความอร่อยและความพึงพอใจ
                                            ทุกจานอาหารเป็นการผจญภัยทางความสมดุลระหว่างรสชาติและความสดใหม่ของวัตถุดิบสด
                                            พร้อมกับบรรยากาศที่มีเอกลักษณ์เช่นแสงสว่างอบอุ่นและการตกแต่งที่สมบูรณ์แบบ
                                            เรามุ่งมั่นที่จะทำให้ทุกการแวะมาที่ร้านของเราเป็นประสบการณ์ที่น่าจดจำและไม่เหมือนใคร
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

<script>
        function submitForm() {
        var form = document.getElementById('myForm');
        var email = form.elements['email'].value;
        var password = form.elements['password'].value;
        var firstname = form.elements['firstname'].value;
        var lastname = form.elements['lastname'].value;
        var phone = form.elements['phone'].value;

        console.log(email);

        confirm(email, password, firstname, lastname, phone);
    }

    function confirm(email, password, firstname, lastname, phone) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'insertAccount.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                console.log(email);
                alert("อัพเดตเสร็จสิ้น");
            }
        };
        xhr.send('email=' + email + '&password=' + password + '&firstname=' + firstname + '&lastname=' + lastname + '&phone=' + phone);
    }
    </script>

</html>