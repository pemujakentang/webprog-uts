<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    @vite('resources/css/app.css')
    <title>pizza?</title>
</head>

<body>
    <div class="h-screen overflow-hidden flex flex-col items-center bg-yellow-50">

        <nav
            class="flex items-center justify-between flex-wrap bg-white p-2 font-basicregular w-[95%] max-w-[1300px] mt-4 rounded-lg drop-shadow-[0_2px_2px_rgba(0,0,0,0.5)]">
            <div class="flex items-center flex-shrink-0 text-black md:mr-12">
                <img class="w-16 h-14 object-cover" src="/images/pizzalogo.webp" alt="Logo">
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
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-black mr-4 ml-12 md:ml-0">
                        HOME
                    </a>
                    <a href="/home"
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-black mr-4 ml-12 md:ml-0">
                        MENU
                    </a>
                    <a href="/my-orders"
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-black mr-4 ml-12 md:ml-0 md:border-b-8 md:border-[#FFC013] md:rounded-md text-[#FFC013]">
                        MY ORDERS
                    </a>
                    <a href="/about-us"
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-black mr-4 ml-12 md:ml-0">
                        ABOUT US
                    </a>
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

            const profile = document.getElementById('profile');
            const logoutButton = document.getElementById('logoutButton');
            profile.addEventListener('click', function() {
                logoutButton.classList.toggle('hidden')
            })
        </script>

        <div class="h-full w-full mx-1 md:w-3/4 rounded-t-lg bg-white shadow-xl mt-3">

            <div class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-[10%]">
                <p class="h-8 text-white text-3xl font-bebasneueregular">YOUR ORDER</p>
            </div>

            <div class="overflow-scroll md:px-4 h-full">
                <div class="h-[50%] lg:h-[60%] overflow-scroll">
                    <div class="">
                        @php
                            $grand_total = 0;
                        @endphp
                        @foreach ($carts as $cart)
                            <!-- card pizza -->
                            <div class="mt-2 mx-4 rounded-md bg-white shadow border">
                                <!-- order -->
                                <div class="mb-2 mt-2 flex flex-col md:flex-row">
                                    <div class="bg-white flex flex-col">
                                        <!-- menu 1 -->
                                        @foreach ($menus as $menu)
                                            @if ($cart->item_id == $menu->id)
                                                <div class="flex flex-row">
                                                    <div class="flex align-middle my-1 ml-4">
                                                        <!-- gambar pizza -->
                                                        <image class="w-32 object-contain"
                                                            src="{{ asset('storage/' . $menu->image) }}" alt="">
                                                        </image>
                                                    </div>
                                                    <div class="flex flex-col ml-4">
                                                        <div class="my-4">
                                                            <!-- nama menu , jumlah order -->
                                                            <p class="text-3xl font-bebasneueregular">
                                                                {{ $menu->name }} ({{ $cart->quantity }})
                                                            </p>
                                                            <!-- extras -->
                                                            @if ($cart->add_ons)
                                                                <ul
                                                                    class="text-stone-500 font-bebasneueregular text-xl list-disc ml-5">
                                                                    @php
                                                                        $extras = explode(',', $cart->add_ons);
                                                                    @endphp
                                                                    @foreach ($extras as $extra)
                                                                        <li>{{ trim($extra) }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            @else
                                                                <p class="text-stone-500 font-bebasneueregular text-xl">
                                                                    No add-ons</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="flex flex-col flex-end text-center my-4 ml-auto mr-6">
                                        <!-- total price -->
                                        <p class="text-5xl font-bebasneueregular text-black">Rp {{ $cart->price }}</p>
                                    </div>
                                </div>
                            </div>
                            @php
                                $grand_total += $cart->price * $cart->quantity;
                            @endphp
                        @endforeach
                    </div>
                </div>

                <div class="h-[30%] md:h-72">
                    <div class="flex flex-wrap md:flex-row justify-between mx-4 mt-3">
                        <p class="text-4xl md:text-5xl font-bebasneueregular">summary</p>
                        <p class="text-4xl md:text-5xl font-bebasneueregular">TOTAL - Rp {{ $grand_total }}</p>
                    </div>
                    <div class="flex flex-row mx-4 mt-1 justify-end">
                        <form action="/order" class="" method="post">
                            @csrf
                            <button
                                class="w-24 h-12 md:w-48 md:h-16 bg-yellow-400 rounded-md shadow hover:shadow-lg flex flex-row justify-center">
                                <p
                                    class="text-center text-black text-xl md:text-2xl font-bebasneueregular flex my-auto">
                                    check
                                    out
                                </p>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
