<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    <title>pizza?</title>
</head>

<body>

    <div class="w-full h-screen absolute md:hidden flex z-0"
        style="background-image: url('/images/backdrop.webp'); background-size: cover; background-position: center;">
    </div>

    <div
        class="w-full h-screen overflow-scroll md:overflow-hidden md:justify-normal justify-end flex flex-col md:flex-row">

        <div class="h-full overflow-hidden flex items-end w-full md:w-[23%] flex-col md:justify-normal justify-end">
            <div class="w-[40%] h-[25%] max-w-[150px] flex flex-col md:hidden mx-auto z-10">
                <image class="" src="/images/pizzalogo.webp" alt=""></image>
            </div>

            <div class="h-[10%] md:hidden flex flex-col text-center mr-12 z-10 mb-20">
                <p class="font-bebasneueregular text-4xl text-white ">WHATEVER THE QUESTION,</p>
                <P class="font-bebasneueregular text-4xl text-white text-right">PIZZA IS THE ANSWER.</P>
            </div>

            <div class="w-48 h-[25%] items-center hidden md:flex mx-auto mb-5">
                <image class="" src="/images/pizzalogo.webp" alt=""></image>
            </div>

            <div class="min-h-[300px] h-[65%] md:h-full w-full flex justify-center flex-col z-10">
                <a href="/"></a>
                <a href="/my-orders"></a>
                <a href="/about-us"></a>
                <a class="h-[20%] md:h-24 flex flex-col justify-center w-full -rotate-[12.5deg] bg-[#ffc013] scale-[1.15] hover:scale-[1.3] duration-75 hover:font-extrabold hover:bg-[#616161] cursor-pointer mb-6 md:mb-5"
                    href="/menu">
                    <p class="text-3xl text-white duration-75 font-bungeeregular text-center">MENU</p>
                </a>

                <a class="h-[20%] md:h-24 flex flex-col justify-center w-full -rotate-[12.5deg] bg-[#ffc013]  scale-[1.15] hover:scale-[1.3] duration-75 hover:font-extrabold hover:bg-[#616161] cursor-pointer mb-6 md:mb-5"
                    href="/my-orders">
                    <p class="text-3xl text-white duration-75 font-bungeeregular text-center">MY ORDER</p>
                </a>

                <a class="h-[20%] md:h-24 flex flex-col justify-center w-full -rotate-[12.5deg] bg-[#ffc013]  scale-[1.15] hover:scale-[1.3] duration-75 hover:font-extrabold hover:bg-[#616161] cursor-pointer z-10 mb-6 md:mb-5"
                    href="/about-us">
                    <p class="text-3xl text-white duration-75 font-bungeeregular text-center">ABOUT US</p>
                </a>

                @if (auth()->user())
                    <a class="h-[20%] md:h-24 flex flex-col justify-center w-full -rotate-[12.5deg] bg-[#ffc013]  scale-[1.15] hover:scale-[1.3] duration-75 hover:font-extrabold hover:bg-[#616161] cursor-pointer z-10 mb-[60px] md:mb-[47px] "
                        href="/menu">
                        <p class="text-3xl text-white duration-75 font-bungeeregular text-center">
                            {{ auth()->user()->firstname }}
                            {{ auth()->user()->lastname }}</p>
                    </a>
                @else
                    <a class="h-[20%] md:h-24  flex flex-col justify-center w-full -rotate-[12.5deg] bg-[#ffc013]  scale-[1.15] hover:scale-[1.3] duration-75 hover:font-extrabold hover:bg-[#616161] cursor-pointer z-10 mb-[60px] md:mb-[47px] " href="/login"><p class="text-3xl text-white duration-75 font-bungeeregular text-center">SIGN IN</p></a>
                @endif


            </div>

        </div>

        <div class="w-full h-full hidden md:flex md:w-[77%]"
            style="background-image: url('/images/backdrop.webp'); background-size: cover; background-position: center;">
            <div class="flex flex-col absolute top-0 right-0 mt-16 mr-12">
                <p class="font-bebasneueregular text-6xl text-white">WHATEVER THE QUESTION,</p>
                <P class="font-bebasneueregular text-6xl text-white text-right">PIZZA IS THE ANSWER.</P>
            </div>
        </div>

    </div>


</body>

</html>
