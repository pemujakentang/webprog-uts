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

<div class="w-full overflow-hidden h-screen flex justify-center bg-yellow-50">
    <div class="container flex items-center justify-center mx-auto">
        <div class="w-3/5 mx-auto bg-white rounded-lg shadow-xl pb-20">
            <button class="flex flex-row ml-4 mt-4" onclick="window.location.href='/'">
                <image class="w-6" src="/images/back.webp" alt="" href="/"></image>
                <p class="ml-0.5">BACK</p>
            </button>
            <div class="w-40 flex mx-auto items-center mt-4">
                <image class="" src="/images/pizzalogo.webp" alt=""></image>
            </div>
            <form action="/login" method="POST">
                <div class="p-6 w-2/3 mx-auto flex flex-col gap-4">
                    <p class="text-5xl font-bebasneueregular">REGISTER</p>
                    @csrf
                    <div class="relative w-full min-w-[200px] flex flex-row h-16">
                        <div class="w-36 flex items-center bg-[#FFC013] rounded-l-lg justify-center">
                            <p class="">NAME</p>
                        </div>
                        <input name="name" type="name" class="bg-[#D9D9D9] border-0 focus:border-none shadow-sm outline-none w-full sm:text-sm rounded-r-lg pl-3">
                    </div>

                    <div class="relative w-full min-w-[200px] flex flex-row h-16">
                        <div class="w-36 flex items-center bg-[#FFC013] rounded-l-lg justify-center">
                            <p class="">EMAIL</p>
                        </div>
                        <input name="email" type="email" class="bg-[#D9D9D9] border-0 focus:border-none shadow-sm outline-none w-full sm:text-sm rounded-r-lg pl-3">
                    </div>

                    <div class="relative w-full min-w-[200px] flex flex-row h-16">
                        <div class="w-36 flex items-center bg-[#FFC013] rounded-l-lg justify-center ">
                            <p class="">PASSWORD</p>
                        </div>
                        <input name="password" type="password" class="bg-[#D9D9D9] border-0 focus:border-none shadow-sm outline-none w-full rounded-r-lg sm:text-sm pl-3">
                    </div>

                    <div class="relative w-full min-w-[200px] text-center">
                        <a>Already have an account?</a>
                        <a class="text-blue-600 hover:text-blue-500" href="/login">LOG IN</a>
                    </div>

                    <div class="relative w-full items-center flex justify-center min-w-[200px] h-11 mt-4 mb-3">
                        <button type="submit"
                            class="w-56 h-12 bg-[#FFC013] rounded-xl hover:shadow-lg hover:scale-[1.1] duration-75">
                                SIGN UP
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



</body>
</html>