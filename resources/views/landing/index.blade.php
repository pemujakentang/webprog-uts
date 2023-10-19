<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    <title>pizza?</title>
</head>

<body>

<div class="w-full overflow-hidden h-screen flex">
    <div class="h-full overflow-hidden flex items-end justify-center w-[23%]">
        <div class="text-center flex flex-col w-full">
            <div class="w-48 flex mx-auto mb-5">
                <image class="" src="/images/pizzalogo.webp" alt=""></image>
            </div>
            <div class="h-24 flex flex-col justify-center w-full -rotate-[12.5deg] bg-[#ffc013] scale-110 hover:scale-[1.3] duration-75 hover:font-extrabold hover:bg-[#616161] cursor-pointer mb-4" href="/"><p class="text-3xl text-white duration-75 font-bungeeregular">MENU</p></div>
            <div class="h-24 flex flex-col justify-center w-full -rotate-[12.5deg] bg-[#ffc013]  scale-110 hover:scale-[1.3] duration-75 hover:font-extrabold hover:bg-[#616161] cursor-pointer mb-4" href="/"><p class="text-3xl text-white duration-75 font-bungeeregular">MY ORDER</p></div>
            <div class="h-24 flex flex-col justify-center w-full -rotate-[12.5deg] bg-[#ffc013]  scale-110 hover:scale-[1.3] duration-75 hover:font-extrabold hover:bg-[#616161] cursor-pointer z-10 mb-[47px] " href="/"><p class="text-3xl text-white duration-75 font-bungeeregular">CONTACT US</p></div>
            <div class="h-56 flex flex-col items-center justify-center w-full bg-[#ffc013] scale-[130%] -rotate-[12.5deg] z-0">
                <div class="rotate-[12.5deg] flex flex-col items-center justify-center">
                    <img src="images/avatar.webp" class="w-16 filter invert" />
                    <a href="/login" class="bg-white hover:scale-[1.1] duration-75 mt-2.5 py-1.5 rounded text-[#ffc013] w-24">
                    <p class="text-2xs">LOG IN</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="h-full w-[77%]" style="background-image: url('/images/backdrop.webp'); background-size: cover; background-position: center;">
        <div class="flex flex-col absolute top-0 right-0 mt-16 mr-12">
            <p class="font-bebasneueregular text-6xl text-white">WHATEVER THE QUESTION,</p>
            <P class="font-bebasneueregular text-6xl text-white text-right">PIZZA IS THE ANSWER.</P>
        </div>
    </div>

</div>


</body>
</html>