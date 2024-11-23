<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Cipheredu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .home-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #6B47DC;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 15px 20px;
            font-size: 24px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s;
        }
        .home-btn:hover {
            background-color: #5a3cb7;
        }
    </style>
</head>
<body class="bg-white font-sans">

    <div class="flex justify-center py-12">
        <img src="{{ asset('storage/profile_pictures/main.png') }}" class="w-80 h-w-80 object-cover" alt="Cipheredu Logo">
    </div>

    <section class="py-16 px-8">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-bold text-purple-700 mb-6">Welcome to Cipheredu</h1>
            <p class="text-2xl text-gray-600 mb-8">Empowering Minds, Shaping Futures through Quality E-Learning</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div>
                    <h3 class="text-3xl font-semibold text-purple-700 mb-6">Our Mission</h3>
                    <p class="text-xl text-gray-700 leading-relaxed mb-8">At Cipheredu, we aim to revolutionize education by offering innovative and accessible online learning experiences. We empower learners with the tools and skills they need to succeed in their academic and professional lives, at their own pace and from anywhere in the world.</p>

                    <p class="text-xl text-gray-700 leading-relaxed mb-8">Our mission is to break down barriers to education and provide equal opportunities for growth. We believe that education should be flexible, interactive, and adaptable to the diverse needs of learners everywhere. Whether you're looking to upgrade your skills, prepare for a new career, or simply expand your knowledge, Cipheredu is here to guide you every step of the way.</p>
                </div>
                <div>
                    <h3 class="text-3xl font-semibold text-purple-700 mb-6">What We Offer</h3>
                    <ul class="list-inside list-disc text-left text-xl text-gray-700 space-y-4">
                        <li><i class="bi bi-person-check text-purple-700 mr-2"></i>Expert-led courses in a variety of fields including technology, business, design, and more.</li>
                        <li><i class="bi bi-clipboard-data text-purple-700 mr-2"></i>Interactive learning tools and real-world case studies to apply your skills.</li>
                        <li><i class="bi bi-file-earmark-person text-purple-700 mr-2"></i>Access to personalized learning pathways based on your goals and preferences.</li>
                        <li><i class="bi bi-chat-left-text text-purple-700 mr-2"></i>24/7 support from educators and community forums to keep you engaged and on track.</li>
                        <li><i class="bi bi-award text-purple-700 mr-2"></i>Certifications and accreditation that are recognized globally.</li>
                    </ul>
                </div>
            </div>

            <h3 class="text-3xl font-semibold text-purple-700 mt-12 mb-6">Why Choose Us?</h3>
            <p class="text-xl text-gray-700 leading-relaxed mb-6">Cipheredu offers more than just an educational platform — we provide an entire learning ecosystem that prepares you for the challenges of today’s fast-evolving world. Whether you are a beginner or an expert, our diverse course offerings can help you reach your full potential.</p>

            <p class="text-xl text-gray-700 leading-relaxed mb-6">Here are some reasons to choose Cipheredu:</p>
            <ul class="list-inside list-disc text-left text-xl text-gray-700 space-y-4">
                <li><i class="bi bi-person-check text-purple-700 mr-2"></i>Highly qualified instructors with years of experience in their fields.</li>
                <li><i class="bi bi-people text-purple-700 mr-2"></i>Flexible learning formats, including video lectures, quizzes, and live discussions.</li>
                <li><i class="bi bi-credit-card text-purple-700 mr-2"></i>Affordable pricing with flexible payment options to suit any budget.</li>
                <li><i class="bi bi-people-fill text-purple-700 mr-2"></i>A supportive community of learners who share your passion and drive for success.</li>
            </ul>
        </div>
    </section>

    <section class="bg-gray-100 py-16 px-8">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold text-purple-700 mb-6">Why E-Learning?</h2>
            <p class="text-2xl text-gray-600 mb-8">In the digital age, education should be accessible, flexible, and effective. E-learning offers numerous benefits that traditional learning environments can't match.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h4 class="text-2xl font-semibold text-purple-700 mb-4">Flexibility</h4>
                    <p class="text-xl text-gray-700"><i class="bi bi-clock text-purple-700 mr-2"></i>With Cipheredu, you can learn at your own pace. There are no rigid schedules — study when it's most convenient for you, whether that's during the day or night.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h4 class="text-2xl font-semibold text-purple-700 mb-4">Cost-Effective</h4>
                    <p class="text-xl text-gray-700"><i class="bi bi-wallet text-purple-700 mr-2"></i>E-learning eliminates the need for commuting, accommodation, and other expenses. Get access to world-class education at a fraction of the cost.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h4 class="text-2xl font-semibold text-purple-700 mb-4">Diverse Courses</h4>
                    <p class="text-xl text-gray-700"><i class="bi bi-layers text-purple-700 mr-2"></i>From programming to project management, we offer a vast array of courses to suit your interests and career aspirations.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-purple-700 py-16 px-8 text-center text-white">
        <h2 class="text-4xl font-bold mb-6">Join Us Today</h2>
        <p class="text-2xl mb-8">Unlock your potential with our expertly designed courses. Join Cipheredu and start your learning journey now!</p>
        <a href="/" class="bg-white text-purple-700 py-3 px-6 rounded-full text-lg hover:bg-gray-100 transition duration-300">Join Us Now</a>
    </section>

    <a href="/" class="home-btn flex items-center justify-center">
        <span class="text-white text-3xl">&larr;</span>
    </a>

</body>
</html>
