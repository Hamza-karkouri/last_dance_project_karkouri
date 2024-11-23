<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cipheredu</title>
</head>

<body class="bg-transparent ">



    <div class="flex ">
        <div>
            @include('layouts.sidebar')
        </div>
        <div>
            @foreach (['success', 'error', 'warning'] as $msg)
            @if ($message = Session::get($msg))
                <div x-data="{ show: true }"
                     x-show="show"
                     x-transition:leave="transition-opacity duration-2000 ease-out"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     x-init="setTimeout(() => show = false, 2000)"
                     class="fixed top-10 left-1/2 transform -translate-x-1/2 max-w-lg w-full bg-{{ $msg === 'error' ? 'red' : ($msg) }}-500 text-purple-500 p-4 rounded-lg shadow-lg z-50 overflow-hidden">
                    <div class="flex justify-between items-center">
                        <strong class="truncate">{{ $message }}</strong> <!-- Prevent text overflow -->
                        <button @click="show = false" class="text-white ml-4">
                            &times;
                        </button>
                    </div>
                </div>
            @endif
        @endforeach



        </div>
        <div>
            @yield('content')
        </div>
    </div>


        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>


    <script>
        window.onload = function() {
            setTimeout(function() {
                document.querySelector('.context').classList.add('animate');
            }, 500);
        };
    </script>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
