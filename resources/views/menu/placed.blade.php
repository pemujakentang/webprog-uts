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

    <div class="h-full w-full mx-1 md:w-3/4 rounded-lg bg-white shadow-xl my-3 p-3 flex flex-col items-center justify-center">
        <div class="w-48 h-[25%] items-center flex mx-auto mb-5"> 
            <image class="" src="/images/pizzalogo.webp" alt=""></image>
        </div>
        <p class="text-5xl font-bebasneueregular text-center">THANK YOU!</p>
        <p class="text-5xl font-bebasneueregular text-center">ORDER PLACED</p>
        <button class="w-full md:w-1/2 h-16 bg-yellow-400 rounded-md shadow hover:shadow-lg flex flex-row justify-center mt-5">
            <p class="ml-2 text-center text-black text-2xl font-bebasneueregular flex my-auto">view my order</p>
        </button>
        <button class="w-full md:w-1/2 h-16 border border-yellow-400 rounded-md shadow hover:shadow-lg flex flex-row justify-center mt-3">
            <p class="ml-2 text-center text-black text-2xl font-bebasneueregular flex my-auto">ORDER MORE PIZZA</p>
        </button>

    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>