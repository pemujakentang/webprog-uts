<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" /> --}}
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
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-[#FFC013] mr-4 ml-12 md:ml-0 md:border-b-8 md:border-[#FFC013] md:rounded-md text-[#FFC013]">
                        MENU
                    </a>
                    <a href="/my-orders"
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-[#FFC013] mr-4 ml-12 md:ml-0">
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
            <div class="sm:w-screen md:w-2/4 mx-2 mt-5 rounded-lg bg-white shadow-xl h-full">
                <div
                    class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-[10%]">
                    <p class="h-8 text-white text-3xl font-bebasneueregular">MENU</p>
                </div>
                <div class="p-3 h-full">
                    <h1 class="text-black text-5xl font-bebasneueregular">MENU</h1>
                    <form action="/menu" id="filterForm">
                        @csrf
                        <div class="w-full flex flex-row gap-2">
                            <!-- sort -->
                            <select name="sort" id="sortSelect" onchange="submitForm()"
                                class="w-1/2 h-10 md:h-8 md:w-auto text-xl font-bebasneueregular text-yellow-600 border border-yellow-600 rounded-md mt-1"
                                data-te-select-init>
                                <option value="a-z" @if (session('sort') == 'a-z') selected @endif>sort A-Z
                                </option>
                                <option value="z-a" @if (session('sort') == 'z-a') selected @endif>sort Z-A
                                </option>
                                <option value="priceup" @if (session('sort') == 'priceup') selected @endif>price
                                    ascending</option>
                                <option value="pricedown" @if (session('sort') == 'pricedown') selected @endif>price
                                    descending</option>
                            </select>
                            <!-- select category -->
                            <select name="category" id="categorySelect" onchange="submitForm()"
                                class="w-1/2 h-10 md:h-8 md:w-auto text-xl font-bebasneueregular text-yellow-600 border border-yellow-600 rounded-md mt-1"
                                data-te-select-init>
                                <option value="all" @if (session('category') == 'all') selected @endif>all category
                                </option>
                                <option value="pizza" @if (session('category') == 'pizza') selected @endif>pizza</option>
                                <option value="pasta" @if (session('category') == 'pasta') selected @endif>pasta</option>
                                <option value="sides" @if (session('category') == 'sides') selected @endif>sides</option>
                                <option value="drink" @if (session('category') == 'drink') selected @endif>drinks</option>
                            </select>
                            <!-- select tag -->
                            <select name="tag" id="tagSelect" onchange="submitForm()"
                                class="w-1/2 h-10 md:h-8 md:w-auto text-xl font-bebasneueregular text-yellow-600 border border-yellow-600 rounded-md mt-1"
                                data-te-select-init>
                                <option value="ALL" @if (session('tag') == 'ALL') selected @endif>all tag
                                </option>
                                <option value="NEW" @if (session('tag') == 'NEW') selected @endif>NEW</option>
                                <option value="BEST" @if (session('tag') == 'BEST') selected @endif>BEST</option>
                                <option value="NONE" @if (session('tag') == 'NONE') selected @endif>NONE</option>
                            </select>
                            <button hidden type="submit">Run</button>
                        </div>
                    </form>

                    <script>
                        function submitForm() {
                            document.getElementById("filterForm").submit();
                        }
                    </script>
                    <div class="h-[73%] overflow-scroll">
                        <div class="grid grid-cols-2 md:grid-cols-3 mx-2 mt-2">
                            @foreach ($menus as $menu)
                                <a href="/{{ $menu->slug }}">
                                    <div
                                        class="bg-white flex flex-col rounded-md shadow m-1 border relative overflow-hidden">
                                        <!-- Elemen "BEST" di dalam elemen utama -->
                                        @if ($menu->tag == 'BEST')
                                            <div
                                                class="absolute w-32 h-16 bg-red-700 -rotate-[45deg] -translate-x-11 -translate-y-3 items-end justify-center flex flex-row">
                                                <p class="text-3xl font-bebasneueregular text-center text-white">BEST
                                                </p>
                                            </div>
                                        @elseif ($menu->tag == 'NEW')
                                            <div
                                                class="absolute w-32 h-16 bg-blue-700 -rotate-[45deg] -translate-x-11 -translate-y-3 items-end justify-center flex flex-row">
                                                <p class="text-3xl font-bebasneueregular text-center text-white">NEW</p>
                                            </div>
                                        @endif
                                        <!-- gambar pizza -->
                                        <div class="flex justify-center items-center my-1 mx-4">
                                            <image class="h-32 object-contain"
                                                src="{{ asset('storage/' . $menu->image) }}" alt="">
                                        </div>

                                        <div class="flex flex-col justify-center ml-2">
                                            <div class="">
                                                <!-- Harga -->
                                                <p class="text-3xl font-bebasneueregular mr-2">Rp
                                                    {{ number_format($menu->price, 0, ',', '.') }}</p>
                                            </div>
                                        </div>

                                        <div class="flex flex-col justify-center bg-yellow-400 rounded-b-md">
                                            <div class="ml-2 my-4">
                                                <!-- nama menu -->
                                                <p class="text-3xl font-bebasneueregular mr-2">{{ $menu->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
            <div class="w-full h-full md:w-1/4 mx-2 mt-5 rounded-lg bg-white shadow-xl overflow-visible">
                <div
                    class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-[10%]">
                    <p class="h-8 text-white text-3xl font-bebasneueregular" id="cart">CART</p>
                </div>
                <div class="w-full h-[73%]">
                    <div class="flex justify-center h-full align-top flex-wrap overflow-scroll">
                        @foreach ($cart as $cart)
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
                                                        class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-lg align-middle rounded-lg">
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
                    <button type="submit"
                        class="bg-[#FFC013] hover:bg-[#ffe59f] w-full h-[16.5%] justify-center font-bebasneueregular text-6xl">
                        PLACE ORDER
                    </button>
                </a>

            </div>


        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>
