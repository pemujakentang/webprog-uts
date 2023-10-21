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
        <!-- back button -->
        <button class="flex flex-row ml-4 mt-4" onclick="window.location.href='/admin/dashboard/'">
            <image class="w-6" src="/images/back.webp" alt="" href="/admin/dashboard/"></image>
            <p class="ml-0.5">BACK TO DASHBOARD</p>
        </button>

        <div class="flex justify-center pt-3 mt-3">
            <div class="flex flex-col md:flex-row  w-[90%]">

                <div class=" w-full md:w-[30%] flex flex-col">
                    <div class="w-full h-60 bg-white rounded-2xl flex align-middle shadow-lg">
                        <image class="object-contain p-2.5" src="/images/pizza.webp" alt=""></image>
                    </div>
                    <!-- button select photo -->
                    <button class="w-full h-14 bg-yellow-400 rounded-md shadow hover:shadow-lg mr-4 mt-4">
                        <p class="text-center text-black text-2xl font-bebasneueregular">UPLOAD PHOTO</p>
                    </button>
                </div>

                <div class=" w-full md:w-[70%] flex mx-auto">
                    <div class="w-full md:w-[95%] flex flex-col mx-auto justify-between">

                        <div>
                            <p class="text-2xl font-bebasneueregular ml-2">MENU'S NAME</p>
                            <!-- menu name -->
                            <input name="name" type="name" class="bg-[#D9D9D9] border-0 focus:border-none focus:shadow-lg outline-none w-full text-xl rounded-xl pl-5 h-14">
                        </div>

                        <div>
                            <p class="text-2xl font-bebasneueregular ml-2 ">price</p>
                            <!-- price -->
                            <input name="price" type="price" class="bg-[#D9D9D9] border-0 focus:border-none focus:shadow-lg outline-none w-full text-xl rounded-xl pl-5 h-14 font-bebasneueregular">
                        </div>

                        <div class="flex flex-row w-full">
                            <div class="w-1/2  mr-1">
                                <p class="text-2xl font-bebasneueregular ">category</p>
                                <!-- select category -->
                                <select class=" text-xl bg-[#D9D9D9] rounded-xl w-full h-14 px-5" data-te-select-init>
                                    <option value="2">PIZZA</option>
                                    <option value="2">PASTA</option>
                                    <option value="2">SIDES</option>
                                    <option value="2">DRINK</option>
                                </select>
                            </div>
                            <div class="w-1/2  ml-1">
                                <p class="text-2xl font-bebasneueregular ">flag</p>
                                <!-- select flag -->
                                <select class=" text-xl bg-[#D9D9D9] rounded-xl w-full h-14 px-5" data-te-select-init>
                                    <option value="2">NONE</option>
                                    <option value="2">NEW</option>
                                    <option value="2">BEST</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center pt-3">
            <div class=" w-[90%]">
                <p class="text-2xl font-bebasneueregular ml-2">DESCRIPTION</p>
                <!-- description -->
                <textarea name="name" type="name" class="bg-[#D9D9D9] border-0 focus:border-none focus:shadow-lg outline-none w-full md:w-[98%] text-xl rounded-xl pl-5 max-h-32 h-32 py-3"></textarea>
            </div>
        </div>

        <div class="flex justify-center pt-3">
            <div class=" w-[90%]">
                <div class="w-full md:w-[98%]">
                    <div class="flex justify-center md:justify-end">
                        <!-- save -->
                        <button class="w-full md:w-60 h-14 bg-yellow-400 rounded-md shadow hover:shadow-lg">
                            <p class="text-center text-black text-2xl font-bebasneueregular">SAVE</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</body>