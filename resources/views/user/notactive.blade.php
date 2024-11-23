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
    @if ($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 animate__animated animate__fadeIn animate__delay-1s">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="context h-fit min-w-full flex items-center justify-center flex-col">
        @if (Auth::user()->ecode == null &&  Auth::user()->approved == false && Auth::user()->stats == "notactive" )
            <!-- Professional Message Section without background and with shadow -->
            <div class="p-8 rounded-lg shadow-2xl text-center max-w-2xl mx-auto">
                <img src="{{ asset('storage/profile_pictures/main.png') }}" alt="Logo" class="mx-auto mb-6" style="max-height: 120px;">

                <!-- Updated Icon: A bigger icon for emphasis -->
                <div class="d-flex justify-content-center mb-6">
                    <i class="bi bi-exclamation-triangle-fill text-purple-700" style="font-size: 7rem;"></i>
                </div>

                <h3 class="text-purple-800 font-semibold text-5xl mb-4">
           <span class="text-black">    {{ Auth::user()->name }}  </span>   Your request is under approval!
                </h3>

                <p class="text-gray-600 text-xl mb-6">
                    We're reviewing your request and will get back to you shortly. Thank you for your patience.
                </p>

                <a href="/about" class="text-purple-600 hover:text-purple-800 font-bold text-xl">
                    Learn more about us
                </a>
            </div>

            <!-- Logout Button with Purple Styling under the message -->
            <div class="mt-8 flex justify-center w-full">
                <form action="http://127.0.0.1:8000/logout" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg focus:outline-none">
                        Logout
                    </button>
                </form>
            </div>




        @endif
        @if (Auth::user()->ecode == null &&  Auth::user()->approved == true &&  Auth::user()->stats == "notactive" )
        <div class="p-8 rounded-lg shadow-2xl text-center max-w-2xl mx-auto">
            <img src="{{ asset('storage/profile_pictures/main.png') }}" alt="Logo" class="mx-auto mb-6" style="max-height: 120px;">

            <div class="d-flex justify-content-center mb-6">
                <i class="bi bi-check-circle-fill text-green-700" style="font-size: 7rem;"></i>
            </div>

            <h3 class="text-purple-800 font-semibold text-4xl sm:text-5xl mb-4">
                <span class="text-black">    {{ Auth::user()->name }}  </span>    Your account has been approved by Owen!
            </h3>

            <p class="text-gray-600 text-xl mb-6">
                Please enter the activation code to complete your account setup.
            </p>

            <form action="{{ route("active") }}" method="POST" class="mb-6">
                @csrf
                <div class="mb-4">
                    <label for="activation_code" class="block text-left text-lg font-semibold text-gray-800">Activation Code</label>
                    <input
                    type="text"
                    id="activation_code"
                    name="activation"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Enter your activation code"
                    required
                    oninput="this.value = this.value.replace(/\s+/g, '')"
                />
                </div>

                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                    Activate
                </button>
            </form>


            <p class="text-gray-600 text-lg">
                If you did not receive your activation code, please contact support.
            </p>
            <div class="mt-8 flex justify-center w-full">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                        Logout
                    </button>
                </form>
            </div>
        </div>



        @endif
    </div>

    <!-- Animated Circles -->
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
