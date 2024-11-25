@extends('dashboard')

@section('content')

<div class="min-h-screen max-w-[80%] m-auto pl-32 flex">
    <div class="flex flex-col px-4">
        <div id="carouselExample" class="carousel slide mb-10" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/1200x400?text=Online+Learning+1" class="d-block w-100" alt="Learning Image 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-purple font-bold text-3xl">Welcome to Our Online Learning Platform</h5>
                        <p class="text-white text-xl">Expand your knowledge with top-rated courses.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x400?text=Online+Learning+2" class="d-block w-100" alt="Learning Image 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-purple font-bold text-3xl">Learn From the Best</h5>
                        <p class="text-white text-xl">Get insights from expert instructors and improve your skills.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x400?text=Online+Learning+3" class="d-block w-100" alt="Learning Image 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-purple font-bold text-3xl">Flexible Learning</h5>
                        <p class="text-white text-xl">Learn at your own pace from anywhere in the world.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-between mb-10 gap-10">
            <div class="w-full md:w-1/2 px-4">
                <h3 class="text-purple text-2xl font-semibold mb-4">Did You Know?</h3>
                <p class="text-gray-700 text-lg mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus, sapien sit amet facilisis fermentum, est ligula consequat sapien, vel efficitur erat enim vitae lectus. Curabitur non neque in velit ullamcorper gravida.
                </p>
                <ul class="list-disc pl-6 space-y-2 text-gray-700">
                    <li>The world's largest online learning platform is Coursera with over 45 million learners!</li>
                    <li>Did you know you can learn a new language in just 3 months if you dedicate an hour per day?</li>
                    <li>Online education is expected to reach $375 billion in market value by 2026.</li>
                </ul>
            </div>
            <div class="w-full md:w-1/2 px-4">
                <img src="https://www.21kschool.com/th/wp-content/uploads/sites/2/2022/09/5-Benefits-of-Personalized-Learning.png" class="rounded-lg " alt="Curiosity Image">
            </div>
        </div>

        <div class="mb-10">
            <h3 class="text-purple text-2xl font-semibold text-center mb-8">Our Courses</h3>
            <div class="flex flex-wrap justify-center gap-6">
                <div class="card w-full sm:w-64 md:w-1/4 p-4 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <img src="https://via.placeholder.com/350x200?text=Course+1" class="card-img-top rounded-lg" alt="Course 1">
                    <div class="card-body">
                        <h5 class="text-purple text-lg font-semibold">Web Development</h5>
                        <p class="text-gray-700">Learn HTML, CSS, and JavaScript to build websites and web applications.</p>
                        <a href="#" class="btn bg-purple-600 text-white w-full py-2 mt-4 rounded-lg hover:bg-purple-700 transition-all">
                            <i class="bi bi-pencil-square"></i> Enroll Now
                        </a>
                    </div>
                </div>
                <div class="card w-full sm:w-64 md:w-1/4 p-4 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <img src="https://via.placeholder.com/350x200?text=Course+2" class="card-img-top rounded-lg" alt="Course 2">
                    <div class="card-body">
                        <h5 class="text-purple text-lg font-semibold">Python Programming</h5>
                        <p class="text-gray-700">Master Python for data science, machine learning, and more.</p>
                        <a href="#" class="btn bg-purple-600 text-white w-full py-2 mt-4 rounded-lg hover:bg-purple-700 transition-all">
                            <i class="bi bi-pencil-square"></i> Enroll Now
                        </a>
                    </div>
                </div>
                <div class="card w-full sm:w-64 md:w-1/4 p-4 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <img src="https://via.placeholder.com/350x200?text=Course+3" class="card-img-top rounded-lg" alt="Course 3">
                    <div class="card-body">
                        <h5 class="text-purple text-lg font-semibold">Data Science & ML</h5>
                        <p class="text-gray-700">Learn the essentials of data analysis, visualization, and machine learning.</p>
                        <a href="#" class="btn bg-purple-600 text-white w-full py-2 mt-4 rounded-lg hover:bg-purple-700 transition-all">
                            <i class="bi bi-pencil-square"></i> Enroll Now
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-8 mb-10 bg-purple-50 rounded-lg shadow-lg">
            <h3 class="text-purple text-2xl font-semibold text-center mb-5">Why Choose Us?</h3>
            <div class="flex flex-col md:flex-row justify-between gap-10">
                <div class="w-full md:w-1/3">
                    <h5 class="text-purple font-semibold mb-2"><i class="bi bi-person-check-fill text-purple"></i> Expert Instructors</h5>
                    <p class="text-gray-700">Learn from experienced industry professionals who bring real-world expertise into their teaching.</p>
                </div>
                <div class="w-full md:w-1/3">
                    <h5 class="text-purple font-semibold mb-2"><i class="bi bi-clock-fill text-purple"></i> Flexible Learning</h5>
                    <p class="text-gray-700">Take courses on your own schedule. Learn whenever and wherever it’s convenient for you.</p>
                </div>
                <div class="w-full md:w-1/3">
                    <h5 class="text-purple font-semibold mb-2"><i class="bi bi-clipboard-check-fill text-purple"></i> Certifications</h5>
                    <p class="text-gray-700">Get certified upon completing courses to showcase your newly acquired skills to employers.</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between gap-10 mt-10">
                <div class="w-full md:w-1/3">
                    <h5 class="text-purple font-semibold mb-2"><i class="bi bi-phone-fill text-purple"></i> 24/7 Support</h5>
                    <p class="text-gray-700">We provide 24/7 customer support to help you with any course-related questions or issues.</p>
                </div>
                <div class="w-full md:w-1/3">
                    <h5 class="text-purple font-semibold mb-2"><i class="bi bi-card-checklist text-purple"></i> Interactive Content</h5>
                    <p class="text-gray-700">Our courses are designed to be engaging and interactive, with quizzes and hands-on projects.</p>
                </div>
                <div class="w-full md:w-1/3">
                    <h5 class="text-purple font-semibold mb-2"><i class="bi bi-broadcast text-purple"></i> Live Sessions</h5>
                    <p class="text-gray-700">Participate in live Q&A sessions with instructors and network with fellow students in real-time.</p>
                </div>
            </div>
        </div>

        <div class="mb-10">
            <h3 class="text-purple text-2xl font-semibold text-center mb-8">What Our Students Say</h3>
            <div class="flex justify-center gap-10">
                <div class="card w-full sm:w-64 p-4 bg-white rounded-lg shadow-md">
                    <img src="https://th.bing.com/th/id/OIP.bE09uhYSj6XHxQhrKFnOwQHaJL?rs=1&pid=ImgDetMain" class="rounded-full mb-4" alt="Student 1">
                    <h5 class="text-purple font-semibold">Sarah K.</h5>
                    <p class="text-gray-700">"This platform helped me learn web development from scratch. I now work as a junior developer!"</p>
                </div>
                <div class="card w-full sm:w-64 p-4 bg-white rounded-lg shadow-md">
                    <img src="https://offertabs.s3.amazonaws.com/offer/qy9s4z/large/810_6063895fc7eaa-headshot.JPG" class="rounded-full mb-4" alt="Student 2">
                    <h5 class="text-purple font-semibold">Mark T.</h5>
                    <p class="text-gray-700">"I completed a machine learning course and was able to secure a job as a data scientist. Highly recommend!"</p>
                </div>
                <div class="card w-full sm:w-64 p-4 bg-white rounded-lg shadow-md">
                    <img src="https://th.bing.com/th/id/R.5082f5f44efe5e090fc3ca3c2397c5e8?rik=hOu%2fP51KmAJZ%2fA&pid=ImgRaw&r=0" class="rounded-full mb-4" alt="Student 3">
                    <h5 class="text-purple font-semibold">Emily S.</h5>
                    <p class="text-gray-700">"The interactive content and flexible schedules helped me balance my learning with a full-time job." </p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
