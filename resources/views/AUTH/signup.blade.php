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
                    <div class="relative w-full min-w-[200px] flex flex-row h-14">
                        <div class="w-36 flex items-center bg-[#FFC013] rounded-l-lg justify-center">
                            <p class="">NAME</p>
                        </div>
                        <input name="name" type="name" class="bg-[#D9D9D9] border-0 focus:border-none shadow-sm outline-none w-full text-lg rounded-r-lg pl-3">
                    </div>

                    <div class="relative w-full min-w-[200px] flex flex-row h-14">
                        <div class="w-36 flex items-center bg-[#FFC013] rounded-l-lg justify-center">
                            <p class="">EMAIL</p>
                        </div>
                        <input name="email" type="email" class="bg-[#D9D9D9] border-0 focus:border-none shadow-sm outline-none w-full rounded-r-lg pl-3 text-lg">
                    </div>

                    <div class="relative w-full min-w-[200px] flex flex-row h-14">
                        <div class="w-36 flex items-center bg-[#FFC013] rounded-l-lg justify-center ">
                            <p class="">PASSWORD</p>
                        </div>
                        <div class="w-full" x-data="{ show: true }">
                            <div class="relative">
                                <input placeholder="" :type="show ? 'password' : 'text'" class="bg-[#D9D9D9] border-0 focus:border-none shadow-sm outline-none w-full rounded-r-lg text-lg pl-3 h-14">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                    <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                    :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                                    viewbox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                    </path>
                                    </svg>

                                    <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                    :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                                    viewbox="0 0 640 512">
                                        <path fill="currentColor"
                                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
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