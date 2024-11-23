<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cipheredu</title>
</head>

<body>







    <div class="context min-w-full">

        <nav class=" h-[15vh]  min-w-full flex justify-between  items-center px-12 pr-44">
            <img src="{{ asset('storage/profile_pictures/main.png') }}" class="w-72  h-w-72  object-cover">

<div class="pb-9">


    <a href="/about" class="inline-block px-7 py-3 bg-purple-600 text-white border-2 border-purple-600 rounded-lg shadow-md hover:bg-purple-700 hover:border-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
        About Us
    </a>
</div>

        </nav>

        <div class="flex items-center h-fit content-center gap-40">


            <div class="  w-[55%] py-14 px-14 gap-8 flex flex-col">
                <h6 class="text-2xl text-purple-950">Welcome to  </h6>
                <h1
                    class="text-8xl text-lowercase gap-8 flex items-start flex-col font-bold text-purple-700 text-center my-4">
                    Cipheredu
                    <span class="text-purple-950 text-4xl">Empowering Minds, Shaping Futures</span>
                </h1>

                <p class=" text-2xl text-gray-400">Unlock your potential with expert-led courses, flexible learning, and
                    real-world skills.
                    Start your journey today—learn anytime, anywhere, and shape your future with confidence.
                    Join a community of passionate learners and take the next step toward your success!
                </p>

                    <div class="flex justify-center space-x-10 mt-10 relative z-30">

                        <a href="/login"
                           class="flex items-center justify-center w-48 px-8 py-4 text-lg font-semibold bg-purple-600 text-white
                                  border border-purple-600 rounded-xl shadow-lg transition-transform duration-150
                                  hover:bg-purple-500 active:scale-95">
                            Log In
                        </a>


                        <a href="/register"
                           class="flex items-center justify-center w-48 px-8 py-4 text-lg font-semibold bg-gray-100 text-purple-600
                                  border border-purple-600 rounded-xl shadow-lg transition-transform duration-150
                              hover:bg-purple-500 hover:text-white active:scale-95">
                            Register
                        </a>
                    </div>


                    <div class="flex justify-center space-x-10 py-10">
                        <a href="https://www.facebook.com" target="_blank" class="text-purple-600 text-4xl p-3 rounded-full transition-all duration-300 transform hover:scale-110 hover:bg-purple-600 hover:text-white">
                          <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com" target="_blank" class="text-purple-600 text-4xl p-3 rounded-full transition-all duration-300 transform hover:scale-110 hover:bg-purple-600 hover:text-white">
                          <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank" class="text-purple-600 text-4xl p-3 rounded-full transition-all duration-300 transform hover:scale-110 hover:bg-purple-600 hover:text-white">
                          <i class="bi bi-twitter"></i>
                        </a>
                        <a href="https://wa.me/" target="_blank" class="text-purple-600 text-4xl p-3 rounded-full transition-all duration-300 transform hover:scale-110 hover:bg-purple-600 hover:text-white">
                          <i class="bi bi-whatsapp"></i>
                        </a>
                      </div>

            </div>
            <div class="relative w-[45%] h-[70vh] px-14 pb-16 overflow-hidden">


                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[90%] h-[95%] bg-black/50 rounded-full overflow-hidden animate-[blobShapeChange_15s_infinite_ease-in-out]">
                  <video class="object-cover w-full h-full" autoplay loop muted>
                    <source src="{{ asset('storage/video/main.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>
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
