<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @vite('resources/css/app.css')
    <title>pizza?</title>
    <style>
        /* hide scrollbar but allow scrolling */
        div {
            -ms-overflow-style: none;
            /* for Internet Explorer, Edge */
            scrollbar-width: none;
            /* for Firefox */
            overflow-y: scroll;
        }

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

<body class="h-screen bg-yellow-50">
    <div class="w-full h-screen overflow-scroll flex justify-center bg-yellow-50">
        <div class="w-full md:mx-20 flex justify-center flex-wrap">
            <div class="sm:w-screen md:w-2/4 mx-2 mt-20 rounded-lg bg-white shadow-xl overflow-scroll">
                <!-- back button -->
                <button class="flex flex-row ml-4 mt-4" onclick="window.location.href='/home'">
                    <image class="w-6" src="/images/back.webp" alt="" href="/home"></image>
                    <p class="ml-0.5 font-bold">BACK TO MENU</p>
                </button>
                @foreach ($menus as $menu)
                    @if ($cart->item_id == $menu->id)
                        <div class="w-full flex justify-center">
                            <img class="md:h-[500px] object-cover" src="{{ asset('storage/' . $menu->image) }}">
                        </div>
                        <form action="/cart/{{ $cart->id }}/update" method="post">

                            <div class="flex flex-col md:flex-row bg-[#FFC013]">
                                @csrf
                                @method('put')
                                <div class="w-full md:w-[70%] bg-[#FFC013] p-6">

                                    <h1 class="text-black text-5xl font-bebasneueregular">{{ $menu->name }}</h1>
                                    <p class="text-white text-2xl font-bebasneueregular">{{ $menu->description }}.</p>
                                    <div
                                        class="bg-[#E2AE20] rounded-lg font-bebasneueregular flex flex-col md:flex-row text-white mt-4">
                                        <div
                                            class="bg-[#CD9C15] w-full md:w-24 align-middle p-2.5 flex flex-col justify-center">
                                            <p class="text-2xl text-center">ADD ONS</p>
                                        </div>
                                        <div class="flex">
                                            <div class="h-full px-1 py-1 flex align-middle">
                                                <input type="checkbox" value="extracheese" id="extracheese"
                                                    class="h-6 w-6 text-lg accent-green-500 border-gray-300 rounded ">
                                                <label for="checked-checkbox" class="ml-1 text-xl text-white">EXTRA
                                                    CHEESE</label>
                                            </div>
                                            <div class="h-full px-1 py-1 flex align-middle">
                                                <input type="checkbox" value="extraspicy" id="extraspicy"
                                                    class="h-6 w-6 text-lg accent-green-500 border-gray-300 rounded ">
                                                <label for="checked-checkbox" class="ml-1 text-xl text-white">EXTRA
                                                    SPICY</label>
                                            </div>
                                            <div class="h-full px-1 py-1 flex align-middle">
                                                <input type="checkbox" value="extrapepper" id="extrapepper"
                                                    class="h-6 w-6 text-lg accent-green-500 border-gray-300 rounded ">
                                                <label for="checked-checkbox" class="ml-1 text-xl text-white">EXTRA
                                                    PEPPER</label>
                                            </div>
                                            <div class="h-full px-1 py-1 flex align-middle">
                                                <input type="checkbox" value="extrameat" id="extrameat"
                                                    class="h-6 w-6 text-lg accent-green-500 border-gray-300 rounded ">
                                                <label for="checked-checkbox" class="ml-1 text-xl text-white">EXTRA
                                                    MEAT</label>
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                const addons = "{{ $cart->add_ons }}".split(", ");
                                                addons.forEach(addon => {
                                                    const checkbox = document.getElementById(addon);
                                                    if (checkbox) {
                                                        checkbox.checked = true;
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="w-full md:w-[30%] bg-[#FFC013] flex flex-col justify-center py-4">
                                    <h1 class="text-black text-5xl font-bebasneueregular text-center" id="totalPrice">Rp
                                        {{ $cart->price }}
                                    </h1>
                                    <input hidden type="number" name="total_price" id="totalPriceValue"
                                        value="{{ $cart->price }}">
                                    <div class="flex justify-center">
                                        <label for="quantity" class="font-bebasneueregular text-2xl">qty</label>
                                        <input required type="number" name="quantity"
                                            class="rounded-lg mx-2 w-32 text-center font-basicregular outline-none"
                                            value="{{ $cart->quantity }}">
                                    </div>
                                    <div class="w-full flex justify-center my-2">
                                        <button type="submit"
                                            class="bg-white hover:bg-gray-400 py-2 px-4 rounded-lg items-center w-fit">
                                            <span class="mx-2 font-basicregular">EDIT CART</span>
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </form>
                    @endif
                @endforeach
                <script>
                    let totalPrice = {{ $cart->price }};
                    let addons = "{{ $cart->add_ons }}".split(", ");
                    console.log(addons)

                    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                    checkboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            if (this.checked) {
                                const addon = this.value;
                                addons.push(addon);
                                totalPrice += 5000;
                            } else {
                                const index = addons.indexOf(this.value);
                                if (index > -1) {
                                    addons.splice(index, 1);
                                    totalPrice -= 5000;
                                }
                            }
                            document.getElementById('totalPrice').innerText = "Rp " + totalPrice;
                            document.getElementById('totalPriceValue').value = totalPrice;
                        });
                    });

                    const form = document.querySelector('form');
                    form.addEventListener('submit', function() {
                        const addonsInput = document.createElement('input');
                        addonsInput.type = 'hidden';
                        addonsInput.name = 'add_ons';
                        if (addons[0] == "") {
                            addons.shift()
                        }
                        addonsInput.value = addons.join(', ');
                        this.appendChild(addonsInput);
                    });
                </script>

            </div>
            <div
                class="s:w-full md:w-1/4 mx-2 mt-5 md:mt-20 sm:rounded-b-lg md:rounded-t-lg bg-white shadow-xl overflow-visible">
                <div
                    class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-[10%]">
                    <p class="h-8 text-white text-3xl font-bebasneueregular">CART</p>
                </div>
                <div class="w-full h-[550px]">
                    <div class="flex justify-center align-top flex-wrap overflow-scroll">
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
                                                        class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-lg align-middle ">
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

                <a href="/checkout">
                    <button type="button"
                        class="bg-[#FFC013] hover:bg-[#ffe59f] w-full h-[16.5%] justify-center font-bebasneueregular text-6xl">
                        PLACE ORDER
                    </button>
                </a>

            </div>


        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
<style>
    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .custom-number-input input:focus {
        outline: none !important;
    }

    .custom-number-input button:focus {
        outline: none !important;
    }
</style>
<script>
    function decrement(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value--;
        target.value = value;
    }

    function increment(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value++;
        target.value = value;
    }

    const decrementButtons = document.querySelectorAll(
        `button[data-action="decrement"]`
    );

    const incrementButtons = document.querySelectorAll(
        `button[data-action="increment"]`
    );

    decrementButtons.forEach(btn => {
        btn.addEventListener("click", decrement);
    });

    incrementButtons.forEach(btn => {
        btn.addEventListener("click", increment);
    });
</script>

</html>
