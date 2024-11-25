@extends('dashboard')

@section('content')


<div class="flex flex-col  content-center  justify-center px-20 ">

    <div class="bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 text-white text-center py-16">
        <h1 class="text-5xl font-bold mb-4">Find the Perfect Plan for You</h1>
        <p class="text-lg mb-8">Choose from our flexible plans that give you the tools you need to succeed. Get started with a plan that fits your needs!</p>
        <a href="#plans" class="px-8 py-4 bg-white text-purple-700 rounded-lg text-lg hover:bg-gray-200 transition duration-300">Explore Our Plans</a>
    </div>

    <div id="plans" class="flex justify-center flex-col items-center space-y-12 mt-16 px-4">
        <h2 class="text-4xl font-bold text-center mb-12 text-purple-600">Choose Your Perfect Plan</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl">
            <!-- Free Plan Card -->
            <div class="bg-white border-2 border-gray-200 rounded-lg shadow-lg flex flex-col items-center text-center hover:shadow-xl transition-shadow duration-300 transform hover:scale-105">
                <img src="https://img.freepik.com/premium-vector/free-rubber-stamp-design_969463-14563.jpg?w=740" alt="Free Plan" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-6 flex flex-col justify-between flex-grow">
                    <h2 class="text-2xl font-semibold text-purple-600 mb-4">Free Plan</h2>
                    <p class="text-xl text-gray-700 mb-6">Basic Access Only</p>
                    <p class="text-md text-gray-600 mb-4">The Free Plan gives you limited access to the platform. Ideal for beginners or those wanting to try out the service.</p>
                    <ul class="space-y-2 text-left mb-4">
                        <li class="flex items-center">
                            <i class="fas fa-times text-red-500 mr-2"></i>
                            <span>No access to Teachers</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-times text-red-500 mr-2"></i>
                            <span>No access to Profit System</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-times text-red-500 mr-2"></i>
                            <span>No access to Premium Courses</span>
                        </li>
                    </ul>
                    <form action="{{ route('payment.create', ['plan' => 'free']) }}" method="GET" class="mt-6">
                        <button type="submit" class="px-6 py-3 bg-gray-500 text-white rounded-lg shadow-md hover:bg-gray-600 transition duration-200 w-full">
                            Choose Free Plan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Premium Plan Card -->
            <div class="bg-white border-2 border-gray-200 rounded-lg shadow-lg flex flex-col items-center text-center hover:shadow-xl transition-shadow duration-300 transform hover:scale-105">
                <img src="https://img.freepik.com/free-vector/elegant-silver-luxury-label_1017-8441.jpg?t=st=1732458276~exp=1732461876~hmac=fac9f32c92836d433cee2c4bd775a560f74a79d8a73188548f84889f2d5d017f&w=740" alt="Premium Plan" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-6 flex flex-col justify-between flex-grow">
                    <h2 class="text-2xl font-semibold text-purple-600 mb-4">Premium Plan</h2>
                    <p class="text-xl text-gray-700 mb-6">$30/month</p>
                    <p class="text-md text-gray-600 mb-4">Gain full access to all features. Best for those who want to learn and grow with extra benefits.</p>
                    <ul class="space-y-2 text-left mb-4">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Access to Teachers</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Access to Profit System</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Access to Premium Courses</span>
                        </li>
                    </ul>
                    <form action="{{ route('payment.create', ['plan' => 'premium']) }}" method="GET" class="mt-6">
                        <button type="submit" class="px-6 py-3 bg-purple-600 text-white rounded-lg shadow-md hover:bg-purple-700 transition duration-200 w-full">
                            Choose Premium Plan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Premium Plus Plan Card -->
            <div class="bg-white border-2 border-gray-200 rounded-lg shadow-lg flex flex-col items-center text-center hover:shadow-xl transition-shadow duration-300 transform hover:scale-105">
                <img src="https://img.freepik.com/free-vector/gold-seal-best-choice_1017-6696.jpg?t=st=1732458293~exp=1732461893~hmac=f69e4a20d7109b61a826cd62cd373abc0356a79f681fd6a31939e8f9986ae2be&w=740" alt="Premium Plus Plan" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-6 flex flex-col justify-between flex-grow">
                    <h2 class="text-2xl font-semibold text-purple-600 mb-4">Premium Plus Plan</h2>
                    <p class="text-xl text-gray-700 mb-6">$180/year</p>
                    <p class="text-md text-gray-600 mb-4">Unlock exclusive features, webinars, and 24/7 support. Perfect for advanced learners and business owners.</p>
                    <ul class="space-y-2 text-left mb-4">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Everything in Premium</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>24/7 Online Support</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Exclusive Webinars & Workshops</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Priority Access to New Features</span>
                        </li>
                    </ul>
                    <form action="{{ route('payment.create', ['plan' => 'premium_plus']) }}" method="GET" class="mt-6">
                        <button type="submit" class="px-6 py-3 bg-purple-800 text-white rounded-lg shadow-md hover:bg-purple-900 transition duration-200 w-full">
                            Choose Premium Plus Plan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="bg-gray-50 py-16">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-purple-600 mb-8">What Our Customers Say</h2>
            <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <p class="text-lg text-gray-700 mb-4">"The Premium Plan has given me access to incredible resources and courses. I’ve learned so much in such a short time!"</p>
                    <p class="font-semibold text-purple-600">Jane Doe</p>
                    <p class="text-gray-500">Marketing Specialist</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <p class="text-lg text-gray-700 mb-4">"I upgraded to Premium Plus for the 24/7 support and the exclusive workshops. Totally worth it!"</p>
                    <p class="font-semibold text-purple-600">John Smith</p>
                    <p class="text-gray-500">Entrepreneur</p>
                </div>
            </div>
        </div>
    </div>

  $

</div>

@endsection
