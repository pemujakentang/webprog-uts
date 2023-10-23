<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    
    @vite('resources/css/app.css')
    <title>pizza?</title>
</head>

<body>
<div class="h-screen overflow-hidden flex flex-col items-center bg-yellow-50">

    <div class="w-[95%] h-24 bg-white mt-2 rounded-lg flex flex-row border shadow">
        <div class="w-[15%]">
            <image class="w-20 mx-auto object-contain" src="/images/pizzalogo.webp" alt=""></image>
        </div>
        <div class="w-[55%] flex justify-between px-16 my-auto">
            <a class="text-4xl font-bebasneueregular">home</a>
            <a class="text-4xl font-bebasneueregular">home</a>
            <a class="text-4xl font-bebasneueregular">home</a>
            <a class="text-4xl font-bebasneueregular">home</a>
        </div>
        <div class="w-[30%] flex justify-end my-auto pr-10">
            <button class="w-48 h-12 bg-yellow-400 rounded-md shadow hover:shadow-lg flex flex-row justify-center">
                <image class="w-6 object-contain my-auto" src="/images/avatar.webp" alt=""></image>
                <p class="ml-2 text-center text-black text-2xl font-bebasneueregular flex my-auto">alex</p>
            </button>
        </div>
    </div>

    <div class="h-full w-full mx-1 md:w-3/4 rounded-t-lg bg-white shadow-xl mt-3">

        <div class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-16">
            <p class="h-8 text-white text-3xl font-bebasneueregular">YOUR ORDER</p>
        </div>

        <div class="mt-4 mx-4">
            <p class="text-5xl font-bebasneueregular">YOUR CART</p>
        </div>

        <div class="h-[55%] overflow-scroll">
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
                                    <image class="w-32 object-contain" src="/images/pizza.webp" alt=""></image>
                                </div>
                                <div class="flex flex-col ml-4">
                                    <div class="my-4">
                                        <!-- nama menu , jumlah order -->
                                        <p class="text-3xl font-bebasneueregular">meat chicken mushroom (1)</p>
                                        <!-- extras -->
                                        <ul class="list-disc ml-5">
                                            <li class="text-stone-500 font-bebasneueregular text-xl">ADD MORE SAUCES</li>
                                            <li class="text-stone-500 font-bebasneueregular text-xl">ADD EXTRA CHEESE</li>
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
                                    <image class="w-32 object-contain" src="/images/pizza.webp" alt=""></image>
                                </div>
                                <div class="flex flex-col ml-4">
                                    <div class="my-4">
                                        <!-- nama menu , jumlah order -->
                                        <p class="text-3xl font-bebasneueregular">meat chicken mushroom (1)</p>
                                        <!-- extras -->
                                        <ul class="list-disc ml-5">
                                            <li class="text-stone-500 font-bebasneueregular text-xl">ADD MORE SAUCES</li>
                                            <li class="text-stone-500 font-bebasneueregular text-xl">ADD EXTRA CHEESE</li>
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
                                    <image class="w-32 object-contain" src="/images/pizza.webp" alt=""></image>
                                </div>
                                <div class="flex flex-col ml-4">
                                    <div class="my-4">
                                        <!-- nama menu , jumlah order -->
                                        <p class="text-3xl font-bebasneueregular">meat chicken mushroom (1)</p>
                                        <!-- extras -->
                                        <ul class="list-disc ml-5">
                                            <li class="text-stone-500 font-bebasneueregular text-xl">ADD MORE SAUCES</li>
                                            <li class="text-stone-500 font-bebasneueregular text-xl">ADD EXTRA CHEESE</li>
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

        <div class="h-[30%]">
            <div class="flex flex-row justify-between mx-4 mt-3">
                <p class="text-5xl font-bebasneueregular">summary</p>
                <p class="text-5xl font-bebasneueregular">TOTAL - 74.99$</p>
            </div>
            <div class="flex flex-row justify-between mx-4 mt-1">
                <div class=" flex flex-col w-[40%]">
                    <p class="text-3xl font-bebasneueregular">subtotal</a>
                    <p class="text-3xl font-bebasneueregular">tax</a>
                </div>
                <div class="flex flex-col justify-end flex-end text-right w-[32%]">
                    <p class="text-3xl font-bebasneueregular">65$</a>
                    <p class="text-3xl font-bebasneueregular">9.99$</a>
                </div>
                <button class="w-[25%] h-18 bg-yellow-400 rounded-md shadow hover:shadow-lg flex flex-row justify-center">
                <p class="ml-2 text-center text-black text-2xl font-bebasneueregular flex my-auto">check out</p>
            </button>
            </div>
        </div> 

    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>