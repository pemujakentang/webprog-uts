<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

    @vite('resources/css/app.css')
    <title>pizza?</title>
</head>

<body>
    <div class="h-screen overflow-hidden flex flex-col items-center bg-yellow-50">

        <nav
            class="flex items-center justify-between flex-wrap bg-white p-2 font-basicregular w-[95%] max-w-[1300px] mt-4 rounded-lg drop-shadow-[0_2px_2px_rgba(0,0,0,0.5)]">
            <div class="flex items-center flex-shrink-0 text-black md:mr-12">
                <img class="w-16 h-14 object-cover" src="/images/pizzalogo.webp" alt="Logo" />
            </div>
            <div class="block md:hidden">
                <button id="nav-toggle"
                    class="flex items-center px-3 py-2 border rounded bg-[#FFC013] text-white border-white hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </button>
            </div>
            <div id="nav-content"
                class="w-full block flex-grow md:flex md:items-center md:w-auto font-semibold mb-2 md:mb-0 mt-4 md:mt-0">
                <div class="text-lg md:flex-grow">
                    <a href="/"
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-[#FFC013] mr-4 ml-12 md:ml-0">
                        HOME
                    </a>
                    <a href="/menu"
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-[#FFC013] mr-4 ml-12 md:ml-0">
                        MENU
                    </a>
                    <a href="/my-orders"
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-[#FFC013] mr-4 ml-12 md:ml-0 md:border-b-8 md:border-[#FFC013] md:rounded-md text-[#FFC013]">
                        MY ORDERS
                    </a>
                    <a href="/about-us"
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-[#FFC013] mr-4 ml-12 md:ml-0">
                        ABOUT US
                    </a>
                    @if (auth()->user()->role == 'admin')
                        <a href="/admin/dashboard"
                            class="block mt-1 md:inline-block md:mt-0 text-black hover:text-[#FFC013] mr-4 ml-12 md:ml-0">
                            ADMIN DASHBOARD
                        </a>
                    @endif
                </div>
                <div class="flex justify-end align-middle items-center font-bebasneueregular font-normal relative">
                    <button id="profile"
                        class="text-xl md:text-2xl px-4 py-1 md:py-1 leading-none border rounded-lg bg-[#FFC013] text-black hover:border-transparent hover:text-white flex flex-row gap-2">
                        <image class="w-6 object-contain my-auto" src="/images/avatar.webp" alt=""></image>
                        {{ auth()->user()->firstname }}
                    </button>
                    <div id="logoutButton"
                        class="hidden absolute top-12 bg-[#FFC013] w-24 h-12 rounded-lg flex justify-center align-middle py-2">
                        <a href="/logout"
                            class="text-xl w-20 bg-white rounded text-center items-center p-1 hover:bg-slate-500">Log
                            Out</a>
                    </div>
                </div>
            </div>
        </nav>


        <div
            class="h-full w-full mx-1 md:w-3/4 rounded-lg bg-white shadow-xl my-3 p-3 flex flex-col items-center justify-center">
            <div class="w-48 h-[25%] items-center flex mx-auto mb-5">
                <image class="" src="/images/pizzalogo.webp" alt=""></image>
            </div>
            <p class="text-5xl font-bebasneueregular text-center">THANK YOU!</p>
            <p class="text-5xl font-bebasneueregular text-center">ORDER PLACED</p>
            <a href="/my-orders"
                class="w-full md:w-1/2 h-16 bg-yellow-400 rounded-md shadow hover:shadow-lg flex flex-row justify-center mt-5">
                <button class="">
                    <p class="ml-2 text-center text-black text-2xl font-bebasneueregular flex my-auto">view my orders
                    </p>
                </button>
            </a>

            <a href="/menu"
                class="w-full md:w-1/2 h-16 border border-yellow-400 rounded-md shadow hover:shadow-lg flex flex-row justify-center mt-3">
                <button class="">
                    <p class="ml-2 text-center text-black text-2xl font-bebasneueregular flex my-auto">ORDER MORE PIZZA
                    </p>
                </button>
            </a>


        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
