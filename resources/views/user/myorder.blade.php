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
    <style>
        div::-webkit-scrollbar {
            display: none;
            /* for Chrome, Safari, and Opera */
        }
    </style>
</head>

<body class="h-screen bg-yellow-50 relative">
    <a class="md:hidden z-20 absolute bottom-24 end-3 bg-[#FFC013] hover:bg-[#FFC013] w-16 h-16 p-3 rounded-full drop-shadow-[0_2px_2px_rgba(0,0,0,0.8)]"
        href="#cart">
        <img class="object-contain" src="/images/cart.webp" alt="">
    </a>
    <div class="h-screen overflow-hidden flex flex-col items-center bg-yellow-50">
        <nav
            class="flex items-center justify-between flex-wrap bg-white p-2 font-basicregular w-[95%] max-w-[1300px] mt-4 rounded-lg drop-shadow-[0_2px_2px_rgba(0,0,0,0.5)]">
            <a class="flex items-center flex-shrink-0 text-black md:mr-12" href="/menu">
                <img class="w-16 h-14 object-cover" src="/images/pizzalogo.webp" alt="Logo">
            </a>
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
                    <span id="logoutButton"
                        class="hidden absolute top-12 bg-[#ac820f] w-24 h-12 rounded-lg flex justify-center align-middle py-2">
                        <a href="/logout"
                            class="text-xl w-20 bg-white rounded text-center items-center p-1 hover:bg-slate-500">Log
                            Out</a>
                    </span>
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

        <div class="w-full md:mx-20 flex justify-center flex-wrap overflow-scroll">
            <div class="w-full h-full md:h-full mx-1 md:w-1/2 mt-5 rounded-lg bg-white shadow-xl">
                <div class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-16">
                    <p class="h-8 text-white text-3xl font-bebasneueregular">YOUR ORDERS</p>
                </div>
                <form action="/my-orders" id="filterForm" class="my-2">
                    @csrf
                    <div class="w-full flex flex-row">
                        <!-- sort -->
                        <select name="sort" onchange="submitForm()"
                            class="w-1/2 h-10 md:h-8 md:w-auto mr-1 ml-4 text-xl font-bebasneueregular text-yellow-600 border border-yellow-600 rounded-md mt-1"
                            data-te-select-init>
                            <option value="earliest" @if (session('sort') == 'earliest') selected @endif>earliest
                            </option>
                            <option value="latest" @if (session('sort') == 'latest') selected @endif>latest
                            </option>
                            <option value="priceup" @if (session('sort') == 'priceup') selected @endif>price
                                ascending</option>
                            <option value="pricedown" @if (session('sort') == 'pricedown') selected @endif>price
                                descending</option>
                        </select>
                        <!-- select status -->
                        <select name="status" onchange="submitForm()"
                            class="w-1/2 h-10 md:h-8 md:w-auto ml-1 mr-4 text-xl font-bebasneueregular text-yellow-600 border border-yellow-600 rounded-md mt-1"
                            data-te-select-init>
                            <option value="all" @if (session('status') == 'all') selected @endif>all 
                            </option>
                            <option value="placed" @if (session('status') == 'placed') selected @endif>placed</option>
                            <option value="finished" @if (session('status') == 'finished') selected @endif>finished</option>
                            <option value="cancelled" @if (session('status') == 'cancelled') selected @endif>cancelled</option>
                        </select>
                        <button hidden type="submit">Run</button>
                    </div>
                </form>

                <script>
                    function submitForm() {
                        document.getElementById("filterForm").submit();
                    }
                </script>
                <div class="h-[80%] md:h-[85%] overflow-scroll">
                    <div class="pb-20">
                        @foreach ($orders as $order)
                            <!-- card pizza -->
                            <div class="mt-4 mx-4 rounded-md bg-white shadow border">
                                <div class="h-8 bg-[#FFC013] rounded-t-md">
                                    <!-- count order -->
                                    <p class="text-black text-xl font-bebasneueregular ml-3 pt-1">ORDER
                                        #{{ $order->id }}
                                    </p>
                                </div>
                                <!-- order -->
                                <div class="mb-2 flex flex-col md:flex-row">
                                    <div class="bg-white flex flex-col">
                                        <!-- menu 1 -->
                                        @foreach ($menus as $menu)
                                            @if ($order->item_id == $menu->id)
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
                                                                {{ $menu->name }}
                                                                ({{ $order->quantity }})
                                                            </p>
                                                            <!-- extras -->
                                                            @if ($order->add_ons)
                                                                <ul
                                                                    class="text-stone-500 font-bebasneueregular text-xl list-disc ml-5">
                                                                    @php
                                                                        $extras = explode(',', $order->add_ons);
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
                                    <hr />
                                    <div class="flex flex-col flex-end text-right my-4 ml-auto mr-6">
                                        <!-- total price -->
                                        <p class="text-5xl font-bebasneueregular text-black">Rp
                                            {{ number_format($order->total_price, 0, ',', '.') }}

                                        </p>
                                        <!-- order status -->
                                        <p
                                            class="text-3xl font-bebasneueregular @if ($order->status == 'PLACED') text-yellow-600 @endif
                                                        @if ($order->status == 'FINISHED') text-green-600 @endif
                                                        @if ($order->status == 'CANCELLED') text-red-600 @endif">
                                            {{ $order->status }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="w-full h-full md:w-1/4 mx-2 mt-5 rounded-lg bg-white shadow-xl overflow-visible">
                <div class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-16">
                    <p class="h-8 text-white text-3xl font-bebasneueregular"  id="cart">CART</p>
                </div>
                <div class="w-full h-[73%]">
                    <div class="flex justify-center h-full align-top flex-wrap overflow-scroll">
                        @foreach ($carts as $cart)
                            <div
                                class="mx-2 my-2 bg-white w-full h-[180px] rounded drop-shadow-[0_2px_2px_rgba(0,0,0,0.5)] flex flex-row px-2 py-3">
                                @foreach ($menus as $menu)
                                    @if ($cart->item_id == $menu->id)
                                        <div class="h-full flex justify-center">
                                            <img class="object-contain w-48"
                                                src="{{ asset('storage/' . $menu->image) }}">
                                        </div>
                                        <div class="flex flex-col w-64 mx-4">
                                            <span
                                                class="text-black text-3xl font-bebasneueregular">{{ $menu->name }}</span>
                                            <div class="flex flex-row gap-2 h-10">
                                                <div
                                                    class="flex w-12 rounded-lg relative bg-transparent justify-center">
                                                    <span
                                                        class="rounded-lg outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-lg align-middle ">
                                                        {{ $cart->quantity }}</span>
                                                </div>
                                                <a href="/cart/{{ $cart->id }}/edit" class="">
                                                    <button class="bg-neutral-600 rounded-lg hover:shadow-lg w-10 ">
                                                        <image class="p-2.5 filter invert object-cover"
                                                            src="/images/edit.webp" alt=""></image>
                                                </a>
                                                <form action="/cart/{{ $cart->id }}/delete" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="bg-red-400 rounded-lg hover:shadow-lg w-10">
                                                        <image class="p-1 object-cover" src="/images/trash.webp"
                                                            alt="">
                                                        </image>
                                                    </button>
                                                </form>

                                            </div>
                                            <div class="h-20">
                                                <p class="font-basicregular font-bold">{{ $cart->price }}</p>
                                                @if ($cart->add_ons)
                                                    <p class="font-basicregular">{{ $cart->add_ons }}</p>
                                                @else
                                                    <p class="font-basicregular">No add ons</p>
                                                @endif

                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        @endforeach
                    </div>
                </div>

                <a href="/my-orders/summary">
                    <button type="button"
                        class="bg-[#FFC013] hover:bg-[#ffe59f] w-full h-[16.5%] justify-center font-bebasneueregular text-6xl">
                        PLACE ORDER
                    </button>
                </a>

            </div>
        </div>



    </div>

    </div>
</body>
