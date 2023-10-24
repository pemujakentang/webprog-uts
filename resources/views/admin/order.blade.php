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
    @if (auth()->user()->role != 'admin')
        <script>
            window.location.href = "/";
        </script>
    @endif
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
                    <a href="/admin/dashboard"
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-black mr-4 ml-12 md:ml-0">
                        MENUS
                    </a>
                    <a href="/admin/dashboard/order"
                        class="block mt-1 md:inline-block md:mt-0 text-black hover:text-black mr-4 ml-12 md:ml-0 md:border-b-8 md:border-[#FFC013] md:rounded-md text-[#FFC013]">
                        ORDERS
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

        <div class="w-full h-full mx-1 md:w-3/4 mt-5 rounded-t-lg bg-white shadow-xl">

            <div class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-16">
                <p class="h-8 text-white text-3xl font-bebasneueregular">ORDERS</p>
            </div>

            <div class="h-[77.5%] overflow-scroll pb-10">
                @foreach ($orders as $order)
                    <!-- card pizza -->
                    <div class="mt-4 mx-4 rounded-md bg-white shadow border">
                        <div class="h-8 bg-[#FFC013] rounded-t-md">
                            <!-- nama pemesan -->
                            <p class="text-black text-xl font-bebasneueregular ml-3 pt-1">{{ $order->name }}'S
                                ORDER // Order ID: {{ $order->id }}</p>
                        </div>
                        <!-- order -->
                        <div class="mb-2">
                            <!-- menu 1 -->
                            <div class="bg-white flex flex-row">
                                @foreach ($menus as $menu)
                                    @if ($order->item_id == $menu->id)
                                        <!-- gambar pizza -->
                                        <div class="flex align-middle my-1 ml-4">
                                            <image class="w-32 object-contain"
                                                src="{{ asset('storage/' . $menu->image) }}" alt="">
                                            </image>
                                        </div>
                                        <div class="flex flex-col ml-4">
                                            <div class="my-4">
                                                <!-- nama menu , jumlah order -->
                                                <p class="text-3xl font-bebasneueregular">{{ $menu->name }}
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
                                                    <p class="text-stone-500 font-bebasneueregular text-xl">No
                                                        add-ons</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex flex-col flex-end text-right my-4 ml-auto mr-6">
                                            <!-- count order -->
                                            <p class="text-3xl font-bebasneueregular">ORDER #{{ $order->id }} -
                                                Rp {{ $order->total_price }}</p>
                                            <!-- order status -->
                                            <form id="form{{ $order->id }}"
                                                action="/admin/change-status/{{ $order->id }}" method="post">
                                                @csrf
                                                @method('put')
                                                <select name="status"
                                                    class="w-32 text-xl font-bebasneueregular
                                                        @if ($order->status == 'PLACED') text-yellow-600 border border-yellow-600 @endif
                                                        @if ($order->status == 'FINISHED') text-green-600 border border-green-600 @endif
                                                        @if ($order->status == 'CANCELLED') text-red-600 border border-red-600 @endif
                                                        rounded-md mt-1"
                                                    data-te-select-init onchange="submitForm{{ $order->id }}()">
                                                    <option value="PLACED"
                                                        @if ($order->status == 'PLACED') selected @endif>order
                                                        placed</option>
                                                    <option value="FINISHED"
                                                        @if ($order->status == 'FINISHED') selected @endif>finished
                                                    </option>
                                                    <option value="CANCELLED"
                                                        @if ($order->status == 'CANCELLED') selected @endif>cancelled
                                                    </option>
                                                </select>
                                            </form>
                                            <script>
                                                var formName{{ $order->id }} = "form{{ $order->id }}";

                                                function submitForm{{ $order->id }}() {
                                                    document.getElementById(formName{{ $order->id }}).submit();
                                                }
                                            </script>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
