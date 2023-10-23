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
<div class="h-screen overflow-hidden flex justify-center bg-yellow-50">

    <div class="w-full mx-1 md:w-3/4 mt-20 rounded-t-lg bg-white shadow-xl">

        <div class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-16">
            <p class="h-8 text-white text-3xl font-bebasneueregular">YOUR ORDER</p>
        </div>

        <div class="h-full overflow-scroll">
            <div class="mb-20">
                <!-- card pizza -->
                <div class="mt-4 mx-4 rounded-md bg-white shadow border">
                    <div class="h-8 bg-[#FFC013] rounded-t-md">
                        <!-- count order -->
                        <p class="text-black text-xl font-bebasneueregular ml-3 pt-1">ORDER #1</p>
                    </div>
                    <!-- order -->
                    <div class="mb-2 flex flex-col md:flex-row">
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
                        <div class="flex flex-col flex-end text-right my-4 ml-auto mr-6">
                            <!-- total price -->
                            <p class="text-5xl font-bebasneueregular text-black">24.99$</p>
                            <!-- order status -->
                            <p class="text-3xl font-bebasneueregular text-yellow-600">on-going</p>
                        </div>                     
                    </div>
                </div>

                <!-- card pizza -->
                <div class="mt-4 mx-4 rounded-md bg-white shadow border">
                    <div class="h-8 bg-[#FFC013] rounded-t-md">
                        <!-- count order -->
                        <p class="text-black text-xl font-bebasneueregular ml-3 pt-1">ORDER #2</p>
                    </div>
                    <!-- order -->
                    <div class="mb-2 flex flex-col md:flex-row">
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

                            <!-- menu 2 -->
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
                        <div class="flex flex-col flex-end text-right my-4 ml-auto mr-6">
                            <!-- total price -->
                            <p class="text-5xl font-bebasneueregular text-black">32.99$</p>
                            <!-- order status -->
                            <p class="text-3xl font-bebasneueregular text-lime-700">finished</p>
                        </div>                     
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>
</body>