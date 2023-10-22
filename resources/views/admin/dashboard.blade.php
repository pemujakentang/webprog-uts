<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @vite('resources/css/app.css')
    <title>pizza?</title>
</head>

<body class>
    @if (auth()->user()->role != 'admin')
        <script>
            window.location.href = "/";
        </script>
    @endif
    <div class="w-full h-screen overflow-scroll flex justify-center bg-yellow-50">

        <div class="md:w-3/4 w-full mx-1 mt-20 rounded-t-lg bg-white shadow-xl overflow-scroll">

            <div class="bg-[#F83821] w-full rounded-t-lg flex justify-center text-center items-center mx-auto h-16">
                <p class="h-8 text-white text-3xl font-bebasneueregular">PIZZA'S DASHBOARD</p>
            </div>

            <div class="flex flex-col md:flex-row w-full">
                <div class="w-full md:w-1/2">
                    <p class="text-black text-5xl font-bebasneueregular mx-4 mt-4">MENU</p>
                    <form action="/admin/dashboard" id="filterForm">
                        <div class="w-full flex flex-row">
                            <!-- sort -->
                            <select name="sort" id="sortSelect" onchange="submitForm()"
                                class="w-1/2 h-10 md:h-8 md:w-auto mr-1 ml-4 text-xl font-bebasneueregular text-yellow-600 border border-yellow-600 rounded-md mt-1"
                                data-te-select-init>
                                <option value="a-z" @if (session('sort') == 'a-z') selected @endif>sort A-Z
                                </option>
                                <option value="z-a" @if (session('sort') == 'z-a') selected @endif>sort Z-A
                                </option>
                                <option value="priceup" @if (session('sort') == 'priceup') selected @endif>price
                                    ascending</option>
                                <option value="pricedown" @if (session('sort') == 'pricedown') selected @endif>price
                                    descending</option>
                            </select>
                            <!-- select category -->
                            <select name="category" id="categorySelect" onchange="submitForm()"
                                class="w-1/2 h-10 md:h-8 md:w-auto ml-1 mr-4 text-xl font-bebasneueregular text-yellow-600 border border-yellow-600 rounded-md mt-1"
                                data-te-select-init>
                                <option value="all" @if (session('category') == 'all') selected @endif>all category
                                </option>
                                <option value="pizza" @if (session('category') == 'pizza') selected @endif>pizza</option>
                                <option value="pasta" @if (session('category') == 'pasta') selected @endif>pasta</option>
                                <option value="sides" @if (session('category') == 'sides') selected @endif>sides</option>
                                <option value="drink" @if (session('category') == 'drink') selected @endif>drinks</option>
                            </select>
                            <button hidden type="submit">Run</button>
                        </div>
                    </form>

                    <script>
                        function submitForm() {
                            document.getElementById("filterForm").submit();
                        }
                    </script>

                    <div class="mx-4 mt-3">
                        @if (session()->has('success'))
                            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-2" role="alert">
                                <p class="font-bold">{{ session('success') }}</p>
                                @if (session()->has('name'))
                                    <p>Name : {{ session('name') }}</p>
                                @endif
                                @if (session()->has('category'))
                                    <p>Category : {{ session('category') }}</p>
                                @endif
                                @if (session()->has('tag'))
                                    <p>Tag : {{ session('tag') }}</p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                <div
                    class="flex md:place-items-end flex-col md:place-content-end w-full md:w-1/2 justify-center md:px-0 px-4 md:mt-auto mt-3">
                    <!-- button add menu -->
                    <button onclick="window.location.href='/admin/dashboard/add'"
                        class="w-full md:w-36 h-10 bg-yellow-400 rounded-md shadow hover:shadow-lg md:mr-3">
                        <p class="text-center text-black text-xl font-bebasneueregular">ADD NEW MENU +</p>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 mx-2 mt-2">

                @foreach ($menus as $menu)
                    <!-- card menu -->
                    <div class="bg-white flex flex-row rounded-md shadow m-1 border">
                        <!-- gambar pizza -->
                        <div class="flex align-middle my-1 ml-4">
                            <image class="w-32 object-contain" src="{{ asset('storage/' . $menu->image) }}"
                                alt=""></image>
                        </div>
                        <div class="flex flex-col justify-center ml-2">
                            <div class="my-1">
                                <!-- nama menu -->
                                <p class="text-3xl font-bebasneueregular mr-2">{{ $menu->name }}</p>
                            </div>
                            <div class="mx-2">
                                <p class=" mr-2"><strong>Category: </strong>{{ $menu->category }}</p>
                            </div>
                            <div class="mx-2">
                                <p class=" mr-2"><strong>Tag: </strong> {{ $menu->tag }}</p>
                            </div>
                            <div class="mx-2">
                                <p class=" mr-2"><strong>Price: </strong> {{ $menu->price }}</p>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center flex-end text-right ml-auto mr-6">
                            <!-- button edit menu -->
                            <a href="/admin/dashboard/{{ $menu->slug }}/edit">
                                <button class="w-12 h-12 bg-neutral-600 rounded-md hover:shadow-lg">
                                    <image class="p-2.5 filter invert" src="/images/edit.webp" alt=""></image>
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</body>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function sendDataToController(selectedSort, selectedCat) {
        // console.log(selectedSort, selectedCat)
        $.ajax({
            type: 'POST',
            url: '/admin/dashboard/send-data',
            data: {
                selectedSort: selectedSort,
                selectedCat: selectedCat
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                // Handle the success response here
                console.log(data);
            },
            error: function (error) {
                // Handle the error response here
                console.log(error);
            }
        });
    }

    function handleSelectChange(){
        var sortby = $('#sortSelect').find(":selected").val();
        var catby = $('#categorySelect').find(":selected").val();

        sendDataToController(sortby, catby);
    }
</script> --}}

</html>
