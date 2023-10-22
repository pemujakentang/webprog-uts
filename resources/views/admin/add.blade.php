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
</head>

<body class>
    @if (auth()->user()->role != 'admin')
        <script>
            window.location.href = "/";
        </script>
    @endif
    <div class="w-full h-screen overflow-scroll flex justify-center bg-yellow-50">

        <div class="md:w-3/4 w-full mx-1 mt-20 pb-10 rounded-t-lg bg-white shadow-xl overflow-scroll">

            <div class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-16">
                <p class="h-8 text-white text-3xl font-bebasneueregular">PIZZA'S DASHBOARD</p>
            </div>
            <!-- back button -->
            <button class="flex flex-row ml-4 mt-4" onclick="window.location.href='/admin/dashboard/'">
                <image class="w-6" src="/images/back.webp" alt="" href="/admin/dashboard/"></image>
                <p class="ml-0.5">BACK TO DASHBOARD</p>
            </button>
            <form id="menuForm" action="/admin/dashboard/store" enctype="multipart/form-data" method="POST">
                @csrf
                <!-- Prevent implicit submission of the form -->
                <button type="submit" disabled style="display: none" aria-hidden="true"></button>
                <div class="flex justify-center pt-3 mt-3">
                    <div class="flex flex-col md:flex-row  w-[90%]">

                        <div class=" w-full md:w-[30%] flex flex-col">

                            <div id="imagePreview" class="w-full h-60 bg-white rounded-2xl flex align-middle shadow-lg">
                                <img src="/images/placeholder-image.webp" id="previewImage" alt=""
                                    class="object-contain p-2.5">
                            </div>
                            <!-- button select photo -->
                            <div class="relative mt-4">
                                <label for="fileInput"
                                    class="w-full h-14 bg-yellow-400 rounded-md shadow hover:shadow-lg flex items-center justify-center cursor-pointer">
                                    <p class="text-center text-black text-2xl font-bebasneueregular">UPLOAD PHOTO</p>
                                </label>
                                <input type="file" accept="image/*" name="image" id="fileInput"
                                    onchange="previewImage()" class="hidden">
                            </div>
                            @error('image')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror

                            <script>
                                const fileInput = document.getElementById('fileInput');
                                const imagePreview = document.getElementById('imagePreview');
                                const previewImage = document.getElementById('previewImage');

                                fileInput.addEventListener('change', function() {
                                    const file = fileInput.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            previewImage.src = e.target.result;
                                        };
                                        reader.readAsDataURL(file);
                                    } else {
                                        previewImage.src = '/images/placeholder-image.webp';
                                        previewImage.alt = 'No Image Selected';
                                        previewImage.classList.remove('hidden');
                                    }
                                });
                            </script>

                        </div>

                        <div class=" w-full md:w-[70%] flex mx-auto md:mt-0 mt-3">
                            <div class="w-full md:w-[95%] flex flex-col mx-auto justify-between">

                                <div>
                                    <p class="text-2xl font-bebasneueregular ml-2">MENU'S NAME</p>
                                    <!-- menu name -->
                                    <input id="name" data-index='1' name="name" type="text"
                                        class="bg-[#D9D9D9] border-0 focus:border-none focus:shadow-lg outline-none w-full text-xl rounded-xl pl-5 h-14">
                                    @error('name')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <p class="text-2xl font-bebasneueregular ml-2">SLUG</p>
                                    <!-- menu name -->
                                    <input id="slug" data-index='1' name="slug" type="text"
                                        class="bg-[#D9D9D9] border-0 focus:border-none focus:shadow-lg outline-none w-full text-xl rounded-xl pl-5 h-14">
                                    @error('slug')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <p class="text-2xl font-bebasneueregular ml-2 ">price</p>
                                    <!-- price -->
                                    <input data-index='2' name="price" type="number"
                                        class="bg-[#D9D9D9] border-0 focus:border-none focus:shadow-lg outline-none w-full text-xl rounded-xl pl-5 h-14 ">
                                    @error('price')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="flex flex-row w-full">
                                    <div class="w-1/2  mr-1">
                                        <p class="text-2xl font-bebasneueregular ">category</p>
                                        <!-- select category -->
                                        <select data-index="3"
                                            class=" text-xl bg-[#D9D9D9] rounded-xl w-full h-14 px-5 outline-none cursor-pointer"
                                            name="category" data-te-select-init>
                                            <option value="PIZZA" @if (old('category') == 'PIZZA') selected @endif>PIZZA</option>
                                            <option value="PASTA" @if (old('category') == 'PASTA') selected @endif>PASTA</option>
                                            <option value="SIDES" @if (old('category') == 'SIDES') selected @endif>SIDES</option>
                                            <option value="DRINK" @if (old('category') == 'DRINK') selected @endif>DRINK</option>
                                        </select>
                                        @error('category')
                                            <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="w-1/2  ml-1">
                                        <p class="text-2xl font-bebasneueregular ">Tag</p>
                                        <!-- select tag -->
                                        <select data-index="4"
                                            class=" text-xl bg-[#D9D9D9] rounded-xl w-full h-14 px-5 outline-none cursor-pointer"
                                            name="tag" data-te-select-init>
                                            <option value="NONE" @if (old('tag') == 'NONE') selected @endif>NONE</option>
                                            <option value="NEW" @if (old('tag') == 'NEW') selected @endif>NEW</option>
                                            <option value="BEST" @if (old('tag') == 'BEST') selected @endif>BEST</option>
                                        </select>
                                        @error('tag')
                                            <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center pt-3">
                    <div class=" w-[90%]">
                        <p class="text-2xl font-bebasneueregular ml-2">DESCRIPTION</p>
                        <!-- description -->
                        <textarea data-index="5" name="description"
                            class="bg-[#D9D9D9] border-0 focus:border-none focus:shadow-lg outline-none w-full md:w-[98%] text-xl rounded-xl pl-5 max-h-32 h-32 py-3"><textarea>
                        @error('description')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-center pt-3">
                    <div class=" w-[90%]">
                        <div class="w-full md:w-[98%]">
                            <div class="flex justify-center md:justify-end">
                                <!-- save -->
                                <button type="submit" class="w-full md:w-60 h-14 bg-yellow-400 rounded-md shadow hover:shadow-lg text-center text-black text-2xl font-bebasneueregular">SAVE
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function() {
        fetch('/admin/dashboard/checkSlug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

    $('#menuForm').on('keydown', 'input', function(event) {
        if (event.which == 13) {
            event.preventDefault();
            var $this = $(event.target);
            var index = parseFloat($this.attr('data-index'));
            $('[data-index="' + (index + 1).toString() + '"]').focus();
        }
    });
</script>

</html>
