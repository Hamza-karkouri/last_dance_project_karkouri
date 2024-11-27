@extends('dashboard')

@section('content')

<div class="min-h-screen max-w-[80%] m-auto pl-32 flex">
    <div class="flex flex-col px-4">
        <div id="carouselExample" class="carousel slide mb-10" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.inc.com/uploaded_files/image/1920x1080/getty_933383882_2000133420009280345_410292.jpg" class="d-block rounded-md  h-[600px] bg-cove w-100" alt="Learning Image 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-purple font-bold text-3xl">Welcome to Our Online Learning Platform</h5>
                        <p class="text-white text-xl">Expand your knowledge with top-rated courses.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://th.bing.com/th/id/OIP.gtVaQrpobi85JFEMHv2zAQHaEK?rs=1&pid=ImgDetMain" class="d-block h-[600px] rounded-md bg-cove w-100" alt="Learning Image 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-purple font-bold text-3xl">Learn From the Best</h5>
                        <p class="text-white text-xl">Get insights from expert instructors and improve your skills.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://th.bing.com/th/id/R.2d6bfe7d8baed4a2c49961ff4836d4c8?rik=OMZzYXDwJTvUcw&pid=ImgRaw&r=0" class="d-block  rounded-md h-[600px] bg-cove w-100" alt="Learning Image 3">
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
        <div st class="flex flex-col   ml-48 md:flex-row items-center justify-between mb-10 gap-10">
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
                    <img src="https://www.upwork.com/catalog-images-resized/f82d685e709202128bca3cb4f68a219c/large" class="card-img-top h-48 rounded-lg" alt="Course 1">
                    <div class="card-body">
                        <h5 class="text-purple text-lg font-semibold">Web Development</h5>
                        <p class="text-gray-700">Learn HTML, CSS, and JavaScript to build websites and web applications.</p>
                        <a href="#" class="btn bg-purple-600 text-white w-full py-2 mt-4 rounded-lg hover:bg-purple-700 transition-all">
                            <i class="bi bi-pencil-square"></i> Enroll Now
                        </a>
                    </div>
                </div>
                <div class="card w-full sm:w-64 md:w-1/4 p-4 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <img src="https://cdn3.wpbeginner.com/wp-content/uploads/2019/07/createonlinecoursewp.png" class="card-img-top h-48 rounded-lg" alt="Course 2">
                    <div class="card-body">
                        <h5 class="text-purple text-lg font-semibold">Python Programming</h5>
                        <p class="text-gray-700">Master Python for data science, machine learning, and more.</p>
                        <a href="#" class="btn bg-purple-600 text-white w-full py-2 mt-4 rounded-lg hover:bg-purple-700 transition-all">
                            <i class="bi bi-pencil-square"></i> Enroll Now
                        </a>
                    </div>
                </div>
                <div class="card w-full sm:w-64 md:w-1/4 p-4 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <img src="https://thepowerhunt.in/wp-content/uploads/2023/06/Web-Development-Full-course-300x169.png" class="card-img-top h-48 rounded-lg" alt="Course 3">
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

        <div class="p-4 py-8  mb-10 text-xl text-center bg-purple-50 rounded-lg shadow-lg">
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
                <div class=" mb-14 w-full md:w-1/3">
                    <h5 class="text-purple font-semibold mb-2"><i class="bi bi-broadcast text-purple"></i> Live Sessions</h5>
                    <p class="text-gray-700">Participate in live Q&A sessions with instructors and network with fellow students in real-time.</p>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
