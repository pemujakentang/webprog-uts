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

<body class>
<div class="w-full h-screen overflow-scroll flex justify-center bg-yellow-50">

    <div class="w-[95%] mx-1 mt-20 rounded-t-lg bg-white shadow-xl overflow-scroll items-center  flex flex-col">

        <div class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-16">
            <p class="h-8 text-white text-3xl font-bebasneueregular">ABOUT US</p>
        </div>

        <div class="flex flex-col md:flex-row w-[95%] justify-between items-center">
            <div class="flex align-middle">
                <image class="w-72 object-contain" src="/images/pizzalogo.webp" alt=""></image>
            </div>
            <div class="md:w-[60%] w-full">
                <p class="text-black text-xl font-bebasneueregular">Pizza is an iconic and universally loved dish originating from Italy. It's a perfect fusion of simplicity and versatility. A classic pizza typically consists of a thin crust, rich tomato sauce, gooey mozzarella cheese, and an array of delicious toppings, offering a burst of flavors and textures in every bite. Whether you crave the timeless Margherita, a meaty extravaganza, or a veggie-packed delight, pizza has a slice for every palate.</p>
            </div>
        </div>

        <hr />

        <div class="my-10">
            <p class="text-black text-2xl font-bebasneueregular px-5">"Order now and savor the slice of your dreams!" 🍕😋</p>
        </div>

        <div class="flex justify-items-start w-[95%]">
            <p class="text-black text-3xl font-bebasneueregular text-right">developers</p>
        </div>

        <div class="w-[95%] grid grid-cols-1 md:grid-cols-2 mx-2 mt-2">
            <!-- card profile -->
            <div class="bg-white flex flex-col md:flex-row rounded-md shadow m-1 border relative overflow-hidden">
                <div class="flex flex-col bg-yellow-400 w-full md:w-[25%]">
                    <div class="flex align-middle">
                        <image class="object-contain" src="/images/boni.webp" alt=""></image>
                    </div>
                    <div class="flex flex-col justify-center bg-yellow-400 rounded-bl-md">
                        <div class="ml-2 my-4">
                            <p class="text-xl font-bebasneueregular mr-2">bonifasius martin</p>
                        </div>
                    </div>
                </div>
                <div class="mx-2 overflow-scroll w-[95%] md:w-[75%] my-auto">
                    <p class="text-black text-base font-bebasneueregular text-justify">Hello, I'm BOTIN a passionate back-end developer with a love for all things pizza! With a background in web development, I specialize in crafting the engine that powers the delicious experience of ordering pizzas online. I enjoy optimizing databases, creating seamless payment gateways, and ensuring that every pizza craving is satisfied with a click. Let's code and create a mouthwatering digital pizza paradise together!</p>
                </div>

            </div>


            <div class="bg-white flex flex-col md:flex-row rounded-md shadow m-1 border relative overflow-hidden">
                <div class="flex flex-col bg-yellow-400 w-full md:w-[25%]">
                    <div class="flex align-middle">
                        <image class="object-contain" src="/images/kimin.webp" alt=""></image>
                    </div>
                    <div class="flex flex-col justify-center bg-yellow-400 rounded-bl-md">
                        <div class="ml-2 my-4">
                            <p class="text-xl font-bebasneueregular mr-2">samuel kimin</p>
                        </div>
                    </div>
                </div>
                <div class="mx-2 overflow-scroll w-[95%] md:w-[75%] my-auto">
                    <p class="text-black text-base font-bebasneueregular text-justify">Hello, I'm samuel kimin, a passionate UI/UX designer with a deep love for pizza. My goal is to create delightful and user-friendly experiences for pizza lovers worldwide. With a strong foundation in design principles and a sprinkle of creativity, I'm dedicated to crafting visually appealing interfaces that enhance the way people interact with their favorite pizza choices. Let's make ordering pizza a seamless and enjoyable experience together.</p>
                </div>

            </div>

            <div class="bg-white flex flex-col md:flex-row rounded-md shadow m-1 border relative overflow-hidden">
                <div class="flex flex-col bg-yellow-400 w-full md:w-[25%]">
                    <div class="flex align-middle">
                        <image class="object-contain" src="/images/nasbi.webp" alt=""></image>
                    </div>
                    <div class="flex flex-col justify-center bg-yellow-400 rounded-bl-md">
                        <div class="ml-2 my-4">
                            <p class="text-xl font-bebasneueregular mr-2">nathaniel ezra</p>
                        </div>
                    </div>
                </div>
                <div class="mx-2 overflow-scroll w-[95%] md:w-[75%] my-auto">
                    <p class="text-black text-base font-bebasneueregular text-justify">Hi, I'm NASBI, and I'm a passionate front-end developer with a love for all things web design and user experience. Currently, I'm working on an exciting project – a pizza website that's not just about ordering pizza but also creating a delightful online experience. From mouth-watering visuals to seamless navigation, I'm dedicated to crafting the perfect front-end that will make your pizza cravings even more enjoyable. Let's slice through the world of web design together!</p>
                </div>

            </div>

            <div class="bg-white flex flex-col md:flex-row rounded-md shadow m-1 border relative overflow-hidden">
                <div class="flex flex-col bg-yellow-400 w-full md:w-[25%]">
                    <div class="flex align-middle">
                        <image class="object-contain p-2" src="/images/avatar.webp" alt=""></image>
                    </div>
                    <div class="flex flex-col justify-center bg-yellow-400 rounded-bl-md">
                        <div class="ml-2 my-4">
                            <p class="text-xl font-bebasneueregular mr-2">damar nur</p>
                        </div>
                    </div>
                </div>
                <div class="mx-2 overflow-scroll w-[95%] md:w-[75%] my-auto">
                    <p class="text-black text-base font-bebasneueregular text-justify">Hi, I'm DAMAR, a passionate front-end developer with a love for all things web and a taste for delicious design. As the creative force behind our pizza website, I bring the perfect blend of user experience and visual appeal to the table. From sizzling animations to mouthwatering layouts, I'm here to ensure our online pizzeria not only satisfies your craving but also delights your eyes. Let's slice through the world of web design, one pizza at a time!</p>
                </div>
            </div>

        </div>

        <div class="w-full bg-neutral-200 px-3 py-5 mt-10 pb-10">
            <p class="text-black text-4xl font-bebasneueregular">about this project</p>

            <p class="text-zinc-600 text-xl font-bebasneueregular text-justify">this web pizza project has been created to fulfill the requirements of our web programming course at Multimedia Nusantara University. This project serves as an exciting opportunity to apply the web development skills and knowledge we've gained throughout the course. Our goal is to design a dynamic and user-friendly pizza website that not only satisfies the academic criteria but also offers a delightful online experience for pizza enthusiasts. By integrating our learning into this project, we aim to deliver a tasty and well-crafted website that showcases our proficiency in web programming.</p>

        </div>

    </div>

</div>
</body>