<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cipheredu</title>
</head>

<body class="bg-transparent">

    <div class="context h-fit min-w-full">
        <div class="h-[78vh] m-auto w-full md:w-[70%] flex items-center justify-center rounded-2xl overflow-hidden shadow-lg">
            <div class="w-full h-full flex">
                <div class="w-full md:w-1/2 h-full bg-cover bg-center overflow-hidden">
                    <video class="object-cover w-full h-full" autoplay loop muted>
                        <source src="{{ asset('storage/video/main2.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <div class="w-full md:w-1/2 h-full p-4 flex items-center justify-center">
                    <form method="POST" action="{{ route('login') }}" class="w-full max-w-md">
                        @csrf
                        <div class="mb-6">
                            <label for="email" class="block text-gray-700 font-medium">Email</label>
                            <input id="email" class="block mt-1 w-full border border-purple-500 rounded-md focus:ring-purple-500 focus:border-purple-500 p-6 text-lg" type="email" name="email" required autofocus autocomplete="username">
                            @if ($errors->has('email'))
                                <p class="mt-2 text-sm text-red-600">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 font-medium">Password</label>
                            <input id="password" class="block mt-1 w-full border border-purple-500 rounded-md focus:ring-purple-500 focus:border-purple-500 p-6 text-lg" type="password" name="password" required autocomplete="current-password">
                            @if ($errors->has('password'))
                                <p class="mt-2 text-sm text-red-600">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-purple-600 focus:ring-purple-500" name="remember">
                                <span class="ml-2 text-sm text-gray-600">Remember me</span>
                            </label>
                        </div>

                        <div class="flex space-x-4 mt-6">
                            <button type="submit" class="w-1/2 bg-purple-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-purple-700 transition">Log in</button>
                            <a href="/register"  style="border: 1px solid purple !important" class="w-1/2 bg-white text-purple-600 py-3 px-6 rounded-lg font-semibold text-center hover:bg-purple-700 hover:text-white transition">Register</a>
                        </div>

                        <a class="text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-500" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>

                        <a href="/" class=" text-center mt-6 text-gray-600 font-semibold hover:text-purple-600 transition flex items-center justify-center space-x-2">
                            <i class="bi bi-house-door"></i>
                            <span>Home</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="area">
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
    </div>

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
