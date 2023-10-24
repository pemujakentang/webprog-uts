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

<body>
    <div class="h-screen overflow-hidden flex flex-col items-center bg-yellow-50">

        <nav class="flex items-center justify-between flex-wrap bg-white p-2 font-basicregular w-[95%] mt-4">
            <div class="flex items-center flex-shrink-0 text-black md:mr-12">
                <img class="w-16 h-10 object-cover" src="/images/pizzalogo.webp" alt="Logo">
            </div>
            <div class="block md:hidden">
                <button id="nav-toggle"
                    class="flex items-center px-3 py-2 border rounded bg-[#FFC013] text-white border-white hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </button>
            </div>
            <div id="nav-content" class="w-full block flex-grow md:flex md:items-center md:w-auto font-semibold mb-2 md:mb-0 mt-4 md:mt-0">
                <div class="text-lg md:flex-grow">
                    <a href="#responsive-header"
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-black mr-4 ml-12 md:ml-0">
                        HOME
                    </a>
                    <a href="#responsive-header"
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-black mr-4 ml-12 md:ml-0">
                        MENU
                    </a>
                    <a href="#responsive-header"
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-black mr-4 ml-12 md:ml-0">
                        MY ORDERS
                    </a>
                    <a href="#responsive-header" class="block mt-1 md:inline-block md:mt-0 text-black hover:text-black mr-4 ml-12 md:ml-0">
                        ABOUT US
                    </a>
                </div>
                <div class="flex justify-end align-middle items-center font-bebasneueregular font-normal">
                <button
                    class="inline-block text-xl px-4 py-1 leading-none border rounded text-black border-black hover:border-transparent hover:text-white hover:bg-black g:mt-0">
                    Alex
                </button>
            </div>
            </div>
        </nav>

        <script>
            const navContent = document.getElementById('nav-content');
            const navToggle = document.getElementById('nav-toggle');
            navToggle.addEventListener('click', function() {
                navContent.classList.toggle('hidden');
            });

            function checkWindowSize() {
                if (window.innerWidth > 768) {
                    navContent.classList.remove('hidden');
                } else {
                    navContent.classList.add('hidden');
                }
            }

            window.addEventListener('resize', checkWindowSize);
            checkWindowSize();
        </script>

        <div class="h-full w-full mx-1 md:w-3/4 rounded-t-lg bg-white shadow-xl mt-3">

            <div class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-[10%]">
                <p class="h-8 text-white text-3xl font-bebasneueregular">YOUR ORDER</p>
            </div>

            <div class="overflow-scroll md:overflow-auto md:px-4 h-full">
                <div class="h-[60%] md:h-[500px] overflow-scroll">
                    <div class="">
                        <!-- card pizza -->
                        <div class="mt-2 mx-4 rounded-md bg-white shadow border">
                            <!-- order -->
                            <div class="mb-2 mt-2 flex flex-col md:flex-row">
                                <div class="bg-white flex flex-col">
                                    <!-- menu 1 -->
                                    <div class="flex flex-row">
                                        <div class="flex align-middle my-1 ml-4">
                                            <!-- gambar pizza -->
                                            <image class="w-32 object-contain" src="/images/pizza.webp" alt="">
                                            </image>
                                        </div>
                                        <div class="flex flex-col ml-4">
                                            <div class="my-4">
                                                <!-- nama menu , jumlah order -->
                                                <p class="text-3xl font-bebasneueregular">meat chicken mushroom (1)</p>
                                                <!-- extras -->
                                                <ul class="list-disc ml-5">
                                                    <li class="text-stone-500 font-bebasneueregular text-xl">ADD MORE
                                                        SAUCES</li>
                                                    <li class="text-stone-500 font-bebasneueregular text-xl">ADD EXTRA
                                                        CHEESE</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="flex flex-col flex-end text-center my-4 ml-auto mr-6">
                                    <!-- total price -->
                                    <p class="text-5xl font-bebasneueregular text-black">24.99$</p>
                                </div>
                            </div>
                        </div>

                        <!-- card pizza -->
                        <div class="mt-2 mx-4 rounded-md bg-white shadow border">
                            <!-- order -->
                            <div class="mb-2 mt-2 flex flex-col md:flex-row">
                                <div class="bg-white flex flex-col">
                                    <!-- menu 1 -->
                                    <div class="flex flex-row">
                                        <div class="flex align-middle my-1 ml-4">
                                            <!-- gambar pizza -->
                                            <image class="w-32 object-contain" src="/images/pizza.webp" alt="">
                                            </image>
                                        </div>
                                        <div class="flex flex-col ml-4">
                                            <div class="my-4">
                                                <!-- nama menu , jumlah order -->
                                                <p class="text-3xl font-bebasneueregular">meat chicken mushroom (1)</p>
                                                <!-- extras -->
                                                <ul class="list-disc ml-5">
                                                    <li class="text-stone-500 font-bebasneueregular text-xl">ADD MORE
                                                        SAUCES</li>
                                                    <li class="text-stone-500 font-bebasneueregular text-xl">ADD EXTRA
                                                        CHEESE</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="flex flex-col flex-end text-center my-4 ml-auto mr-6">
                                    <!-- total price -->
                                    <p class="text-5xl font-bebasneueregular text-black">24.99$</p>
                                </div>
                            </div>
                        </div>

                        <!-- card pizza -->
                        <div class="mt-2 mx-4 rounded-md bg-white shadow border">
                            <!-- order -->
                            <div class="mb-2 mt-2 flex flex-col md:flex-row">
                                <div class="bg-white flex flex-col">
                                    <!-- menu 1 -->
                                    <div class="flex flex-row">
                                        <div class="flex align-middle my-1 ml-4">
                                            <!-- gambar pizza -->
                                            <image class="w-32 object-contain" src="/images/pizza.webp" alt="">
                                            </image>
                                        </div>
                                        <div class="flex flex-col ml-4">
                                            <div class="my-4">
                                                <!-- nama menu , jumlah order -->
                                                <p class="text-3xl font-bebasneueregular">meat chicken mushroom (1)</p>
                                                <!-- extras -->
                                                <ul class="list-disc ml-5">
                                                    <li class="text-stone-500 font-bebasneueregular text-xl">ADD MORE
                                                        SAUCES</li>
                                                    <li class="text-stone-500 font-bebasneueregular text-xl">ADD EXTRA
                                                        CHEESE</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="flex flex-col flex-end text-center my-4 ml-auto mr-6">
                                    <!-- total price -->
                                    <p class="text-5xl font-bebasneueregular text-black">24.99$</p>
                                </div>
                            </div>
                        </div>
                        <!-- card pizza -->
                        <div class="mt-2 mx-4 rounded-md bg-white shadow border">
                            <!-- order -->
                            <div class="mb-2 mt-2 flex flex-col md:flex-row">
                                <div class="bg-white flex flex-col">
                                    <!-- menu 1 -->
                                    <div class="flex flex-row">
                                        <div class="flex align-middle my-1 ml-4">
                                            <!-- gambar pizza -->
                                            <image class="w-32 object-contain" src="/images/pizza.webp" alt="">
                                            </image>
                                        </div>
                                        <div class="flex flex-col ml-4">
                                            <div class="my-4">
                                                <!-- nama menu , jumlah order -->
                                                <p class="text-3xl font-bebasneueregular">meat chicken mushroom (1)</p>
                                                <!-- extras -->
                                                <ul class="list-disc ml-5">
                                                    <li class="text-stone-500 font-bebasneueregular text-xl">ADD MORE
                                                        SAUCES</li>
                                                    <li class="text-stone-500 font-bebasneueregular text-xl">ADD EXTRA
                                                        CHEESE</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="flex flex-col flex-end text-center my-4 ml-auto mr-6">
                                    <!-- total price -->
                                    <p class="text-5xl font-bebasneueregular text-black">24.99$</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="h-[30%] glex justify-between">
                    <div class="flex flex-row justify-between mx-4 mt-3">
                        <p class="hidden md:flex text-5xl font-bebasneueregular">summary</p>
                        <p class="text-5xl font-bebasneueregular">TOTAL - 74.99$</p>
                    </div>
                    <div class="flex flex-row justify-between mx-4 mt-1">
                        <div class=" flex flex-col w-[40%]">
                            <p class="text-3xl font-bebasneueregular">subtotal</a>
                            <p class="text-3xl font-bebasneueregular">tax</a>
                        </div>
                        <div class="flex flex-col justify-end flex-end text-right w-[32%] mr-1">
                            <p class="text-3xl font-bebasneueregular">65$</a>
                            <p class="text-3xl font-bebasneueregular">9.99$</a>
                        </div>
                        <button
                            class="w-[40%] md:w-[25%] h-18 bg-yellow-400 rounded-md shadow hover:shadow-lg flex flex-row justify-center">
                            <p class="ml-2 text-center text-black text-2xl font-bebasneueregular flex my-auto">check
                                out
                            </p>
                        </button>
                    </div>
                </div>
            </div>



        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
