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

    <div class="context h-[90vh]  min-w-full">
        <div class="h-[80vh] m-auto w-full md:w-[70%] flex items-center justify-center rounded-2xl overflow-hidden shadow-lg">
            <div class="w-full h-full flex">
                <div class="w-full md:w-1/2 h-full bg-cover bg-center overflow-hidden">
                    <video class="object-cover w-full h-full" autoplay loop muted>
                        <source src="{{ asset('storage/video/main2.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <!-- Smaller Form Section -->
                <div class="w-full md:w-1/2 h-full  flex items-center justify-center bg-white rounded-2xl ">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-6 w-full max-w-md mx-auto">
                        @csrf

                        <!-- Profile Image (Hidden Input with Icon and Text) -->
                        <div>


                            <!-- Hidden Input -->
                            <input id="profile" class="hidden  " type="file" name="profile" accept="image/*" onchange="previewImage(event)">

                            <!-- Profile Icon and Text -->
                            <div class="flex items-center justify-center space-x-4 cursor-pointer">
                                <div id="image-preview" class="mt-2 text-center">
                                    <img id="preview" src="#" alt="Image Preview" class="rounded-full  bg-cover   " style="display: none; min-width: 90px; height: 90px;" />
                                </div>
                                <!-- Icon -->
                                <label for="profile" class="w-24 h-24 flex items-center justify-center bg-purple-100 rounded-full">
                                    <i class="bi bi-person-circle text-6xl text-purple-600 hover:text-purple-700"></i>
                                </label>

                                <!-- Text -->
                                <span class="text-lg text-gray-600">Add your picture</span>
                            </div>

                            <!-- Error Handling for Profile -->
                            @if ($errors->has('profile'))
                                <p class="text-red-500 text-xs mt-1">{{ $errors->first('profile') }}</p>
                            @endif
                        </div>

                        <!-- Preview Image Section -->


                        <script>
                            function previewImage(event) {
                                const input = event.target;
                                const preview = document.getElementById('preview');

                                if (input.files && input.files[0]) {
                                    const reader = new FileReader();

                                    reader.onload = function(e) {
                                        preview.src = e.target.result; // Set the image source to the loaded file
                                        preview.style.display = 'block'; // Show the image
                                    }

                                    reader.readAsDataURL(input.files[0]); // Read the file as a data URL
                                } else {
                                    preview.src = "#"; // Reset the preview if no file is selected
                                    preview.style.display = 'none'; // Hide the image
                                }
                            }
                        </script>

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-lg font-semibold text-gray-700">{{ __('Name') }}</label>
                            <input id="name" class="block mt-2 w-full py-3 px-4 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                            @if ($errors->has('name'))
                                <p class="text-red-500 text-xs mt-1">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-lg font-semibold text-gray-700">{{ __('Email') }}</label>
                            <input id="email" class="block mt-2 w-full py-3 px-4 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                            @if ($errors->has('email'))
                                <p class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <!-- Number -->
                        <div>
                            <label for="number" class="block text-lg font-semibold text-gray-700">{{ __('Number') }}</label>
                            <input id="number" class="block mt-2 w-full py-3 px-4 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500" type="number" name="number" value="{{ old('number') }}" required min="0" step="1" autocomplete="off">
                            @if ($errors->has('number'))
                                <p class="text-red-500 text-xs mt-1">{{ $errors->first('number') }}</p>
                            @endif
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-lg font-semibold text-gray-700">{{ __('Password') }}</label>
                            <input id="password" class="block mt-2 w-full py-3 px-4 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500" type="password" name="password" required autocomplete="new-password">
                            @if ($errors->has('password'))
                                <p class="text-red-500 text-xs mt-1">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-lg font-semibold text-gray-700">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" class="block mt-2 w-full py-3 px-4 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500" type="password" name="password_confirmation" required autocomplete="new-password">
                            @if ($errors->has('password_confirmation'))
                                <p class="text-red-500 text-xs mt-1">{{ $errors->first('password_confirmation') }}</p>
                            @endif
                        </div>

                        <!-- Submit Button and Link -->
                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900">{{ __('Already registered?') }}</a>
                            <button type="submit" class="px-7 py-3 bg-purple-600 text-white border-2 border-purple-600 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                                {{ __('Register') }}
                            </button>


                            </div>

                        <a href="/" class=" text-center mt-6 text-gray-600 font-semibold hover:text-purple-600 transition flex items-center justify-center space-x-2">
                            <i class="bi bi-house-door"></i>
                            <span>Home</span>
                        </a>
                        </div>

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
