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
<div class="w-full h-screen overflow-hidden flex justify-center bg-white md:bg-yellow-50">

    <div class="w-3/4 mt-20 rounded-t-lg bg-white shadow-xl">

        <div class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-16">
            <p class="h-8 text-white text-3xl font-bebasneueregular">YOUR ORDER</p>
        </div>

        <div class=" overflow-scroll h-full">
            
            <!-- card pizza -->
            <div class="mt-4 mx-4 rounded-md bg-[#FFC013] shadow border">
                <div class="h-8 rounded-t-md">
                    <p class="text-black text-xl font-bebasneueregular ml-3 pt-1">ALEX'S ORDER</p>
                </div>
                <div class="bg-white flex flex-row rounded-b-md">
                    <!-- gambar pizza -->
                    <div class="flex align-middle my-1 ml-4">
                        <image class="w-32 object-contain" src="/images/pizza.webp" alt=""></image>
                    </div>
                    <div class="flex flex-col ml-4">
                        <div class="my-4">
                            <!-- nama menu -->
                            <p class="text-3xl font-bebasneueregular">meat chicken mushroom</p>
                            <!-- extras -->
                            <ul class="list-disc ml-5">
                                <li class="text-stone-500 font-bebasneueregular text-xl">ADD MORE SAUCES</li>
                                <li class="text-stone-500 font-bebasneueregular text-xl">ADD EXTRA CHEESE</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col flex-end text-right my-4 ml-auto mr-6">
                        <!-- count order -->
                        <p class="text-3xl font-bebasneueregular">ORDER #1</p>
                        <!-- order status -->
                        <p class="text-2xl font-bebasneueregular text-yellow-600">ON-GOING</p>
                    </div> 
                </div>
            </div>

            <!-- card pizza -->
            <div class="mt-4 mx-4 rounded-md bg-[#FFC013] shadow border">
                <div class="h-8 rounded-t-md">
                    <p class="text-black text-xl font-bebasneueregular ml-3 pt-1">ALEX'S ORDER</p>
                </div>
                <div class="bg-white flex flex-row rounded-b-md">
                    <!-- gambar pizza -->
                    <div class="flex align-middle my-1 ml-4">
                        <image class="w-32 object-contain" src="/images/pizza.webp" alt=""></image>
                    </div>
                    <div class="flex flex-col ml-4">
                        <div class="my-4">
                            <!-- nama menu -->
                            <p class="text-3xl font-bebasneueregular">meat chicken mushroom</p>
                            <!-- extras -->
                            <ul class="list-disc ml-5">
                                <li class="text-stone-500 font-bebasneueregular text-xl">ADD MORE SAUCES</li>
                                <li class="text-stone-500 font-bebasneueregular text-xl">ADD EXTRA CHEESE</li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col flex-end text-right my-4 ml-auto mr-6">
                        <!-- count order -->
                        <p class="text-3xl font-bebasneueregular">ORDER #1</p>
                        <!-- order status -->
                        <p class="text-2xl font-bebasneueregular text-yellow-600">ON-GOING</p>
                    </div> 
                </div>
            </div>

        </div>
    </div>

</div>
</body>