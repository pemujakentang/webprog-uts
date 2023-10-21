<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @vite('resources/css/app.css')
    <title>pizza?</title>
</head>

<body class>
<div class="w-full h-screen overflow-scroll flex justify-center bg-yellow-50">

    <div class="md:w-3/4 w-full mx-1 mt-20 rounded-t-lg bg-white shadow-xl overflow-scroll">

        <div class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-16">
            <p class="h-8 text-white text-3xl font-bebasneueregular">PIZZA'S DASHBOARD</p>
        </div>

        <div class="flex flex-col md:flex-row w-full">
            <div class="w-full md:w-1/2">
                <p class="text-black text-5xl font-bebasneueregular mx-4 mt-4">MENU</p>
                <div class="w-full flex flex-row">
                    <!-- sort -->
                    <select class="w-1/2 h-10 md:h-8 md:w-auto mr-1 ml-4 text-xl font-bebasneueregular text-yellow-600 border border-yellow-600 rounded-md mt-1" data-te-select-init>
                        <option value="1" selected>sort A-Z</option>
                        <option value="2">sort Z-A</option>
                    </select>
                    <!-- select category -->
                    <select class="w-1/2 md:w-auto ml-1 mr-4 text-xl font-bebasneueregular text-yellow-600 border border-yellow-600 rounded-md mt-1" data-te-select-init>
                        <option value="1" selected>all category</option>
                        <option value="2">pizza</option>
                        <option value="2">pasta</option>
                        <option value="2">sides</option>
                        <option value="2">drinks</option>
                    </select>
                </div>
            </div>
            <div class="flex md:place-items-end flex-col md:place-content-end w-full md:w-1/2 justify-center md:px-0 px-4 md:mt-auto mt-3">
                <!-- button add menu -->
                <button onclick="window.location.href='/admin/dashboard/add'" class="w-full md:w-36 h-10 bg-yellow-400 rounded-md shadow hover:shadow-lg md:mr-3">
                    <p class="text-center text-black text-xl font-bebasneueregular">ADD NEW MENU +</p>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 mx-2 mt-2">

            <!-- card menu -->
            <div class="bg-white flex flex-row rounded-md shadow m-1 border">
                <!-- gambar pizza -->
                <div class="flex align-middle my-1 ml-4">
                    <image class="w-32 object-contain" src="/images/pizza.webp" alt=""></image>
                </div>
                <div class="flex flex-col justify-center ml-2">
                    <div class="my-4">
                        <!-- nama menu -->
                        <p class="text-3xl font-bebasneueregular mr-2">meat chicken mushroom</p>
                    </div>
                </div>
                <div class="flex flex-col justify-center flex-end text-right ml-auto mr-6">
                    <!-- button edit menu -->
                    <button onclick="window.location.href='/admin/dashboard/edit'" class="w-12 h-12 bg-neutral-600 rounded-md hover:shadow-lg">
                        <image class="p-2.5 filter invert" src="/images/edit.webp" alt=""></image>
                    </button>
                </div> 
            </div>

            <!-- card menu -->
            <div class="bg-white flex flex-row rounded-md shadow m-1 border">
                <!-- gambar pizza -->
                <div class="flex align-middle my-1 ml-4">
                    <image class="w-32 object-contain" src="/images/pizza.webp" alt=""></image>
                </div>
                <div class="flex flex-col justify-center ml-2">
                    <div class="my-4">
                        <!-- nama menu -->
                        <p class="text-3xl font-bebasneueregular mr-2">meat chicken mushroom</p>
                    </div>
                </div>
                <div class="flex flex-col justify-center flex-end text-right ml-auto mr-6">
                    <!-- button edit menu -->
                    <button href="./edit" class="w-12 h-12 bg-neutral-600 rounded-md hover:shadow-lg">
                        <image class="p-2.5 filter invert" src="/images/edit.webp" alt=""></image>
                    </button>
                </div> 
            </div>

            <!-- card menu -->
            <div class="bg-white flex flex-row rounded-md shadow m-1 border">
                <!-- gambar pizza -->
                <div class="flex align-middle my-1 ml-4">
                    <image class="w-32 object-contain" src="/images/pizza.webp" alt=""></image>
                </div>
                <div class="flex flex-col justify-center ml-2">
                    <div class="my-4">
                        <!-- nama menu -->
                        <p class="text-3xl font-bebasneueregular mr-2">meat chicken mushroom</p>
                    </div>
                </div>
                <div class="flex flex-col justify-center flex-end text-right ml-auto mr-6">
                    <!-- button edit menu -->
                    <button href="/edit" class="w-12 h-12 bg-neutral-600 rounded-md hover:shadow-lg">
                        <image class="p-2.5 filter invert" src="/images/edit.webp" alt=""></image>
                    </button>
                </div> 
            </div>

        </div>
    </div>

</div>
</body>