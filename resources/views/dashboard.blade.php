<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">



    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cipheredu</title>
</head>

<body class="bg-transparent flex flex-col min-h-screen">

    <div class="flex gap-4 flex-1">
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
                        <strong class="truncate">{{ $message }}</strong>
                        <button @click="show = false" class="text-white ml-4">
                            &times;
                        </button>
                    </div>
                </div>
            @endif
        @endforeach
        </div>

        <div class="flex justify-center items-center flex-col w-full flex-1 h-screen">
            @yield('content')
            @if (Route::is('dashboard'))

            <div class="container">
                <h1 class="text-center text-3xl font-semibold mb-6">All Classes</h1>

                <div class="row">
                    @foreach ($classes as $class)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-lg">

                            <div class="card-body">
                                <h5 class="card-title text-2xl text-center">{{ $class->name }}</h5>

                                <h5 class="card-title text-xl text-center">{{ $class->coach->name }}</h5>
                                <p class="card-text">{{ Str::limit($class->description, 100) }}</p>
                                <h5 class="card-title text-purple-800 text-center">{{ $class->seats }}</h5>
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#courseModal{{ $class->id }}">View Courses</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for courses -->
                    <div class="modal fade" id="courseModal{{ $class->id }}" tabindex="-1" aria-labelledby="courseModalLabel{{ $class->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h5 class="modal-title" id="courseModalLabel{{ $class->id }}">{{ $class->name }} - Courses</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @foreach ($class->courses as $course)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <img src="{{ asset('storage/course_images/'. $course->image) }}" alt="{{ $course->name }}" class="w-full h-48 object-cover">
                                            <h5 class="card-title">{{ $course->name }}</h5>
                                            <p class="card-text">{{ Str::limit($course->description, 100) }}</p>

                                            <!-- Dropdown for lessons ordered by time -->
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="lessonDropdown{{ $course->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                    View Lessons
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="lessonDropdown{{ $course->id }}">
                                                    @foreach ($course->lessons->sortBy('created_at') as $lesson)
                                                    <li>
                                                        <a class="dropdown-item" href="">
                                                            {{ $lesson->name }}
                                                            <form action="" method="POST" class="d-inline">
                                                                @csrf
                                                                <button type="submit" class="btn btn-success btn-sm ml-2">Start Lesson</button>
                                                            </form>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


            @endif
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
    <div class="mt-auto">
        @include('layouts.footer')
    </div>
    <script>
        window.onload = function() {
            setTimeout(function() {
                document.querySelector('.context').classList.add('animate');
            }, 500);
        };





    </script>

<script>
    document.addEventListener('DOMContentLoaded', async function() {
        let response = await axios.get("/calendar/create")
        let events = response.data.events

        let nowDate = new Date()
        let day = nowDate.getDate()
        let month = nowDate.getMonth() + 1
        let hours = nowDate.getHours()
        let minutes = nowDate.getMinutes()
        let minTimeAllowed =
            `${nowDate.getFullYear()}-${month < 10 ? "0"+month : month}-${day < 10 ? "0"+day : day}T${hours < 10 ? "0"+hours : hours}:${minutes < 10 ? "0"+minutes : minutes}:00`
        start.min = minTimeAllowed;


        var myCalendar = document.getElementById('calendar');


        var calendar = new FullCalendar.Calendar(myCalendar, {

            headerToolbar: {
                left: 'dayGridMonth,timeGridWeek,timeGridDay',
                center: 'title',
                right: 'listMonth,listWeek,listDay'
            },


            views: {
                listDay: { // Customize the name for listDay
                    buttonText: 'Day Events',

                },
                listWeek: { // Customize the name for listWeek
                    buttonText: 'Week Events'
                },
                listMonth: { // Customize the name for listMonth
                    buttonText: 'Month Events'
                },
                timeGridWeek: {
                    buttonText: 'Week', // Customize the button text
                },
                timeGridDay: {
                    buttonText: "Day",
                },
                dayGridMonth: {
                    buttonText: "Month",
                },

            },


            initialView: "timeGridWeek", // initial view  =   l view li kayban  mni kan7ol l  calendar
            slotMinTime: "09:00:00", // min  time  appear in the calendar
            slotMaxTime: "19:00:00", // max  time  appear in the calendar
            nowIndicator: true, //  indicator  li kaybyen  l wa9t daba   fin  fl calendar
            selectable: true, //   kankhali l user  i9ad  i selectioner  wast l calendar
            selectMirror: true, //  overlay   that show  the selected area  ( details  ... )
            selectOverlap: false, //  nkhali ktar mn event f  nfs  l wa9t  = e.g:   5 nas i reserviw nfs lblasa  f nfs l wa9t
            weekends: true, // n7ayed  l weekends    ola nkhalihom


            // events  hya  property dyal full calendar
            //  kat9bel array dyal objects  khass  i kono jayin 3la chkl  object fih  start  o end  7it hya li kayfahloha
            events: events,

            selectAllow: (info) => {

                return info.start >= nowDate;
            },

            select: (info) => {


                if (info.end.getDate() - info.start.getDate() > 0 && !info.allDay ) {
                    return
                }

                console.log(info);
                if (info.allDay) {
                    start.value = info.startStr+" 09:00:00"
                    end.value = info.startStr+" 19:00:00"

                }else{
                    start.value = info.startStr.slice(0, info.startStr.length - 6)
                    end.value = info.endStr.slice(0, info.endStr.length - 6)
                }

                submitEvent.click()
            }



        });

        calendar.render();
    })
</script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
</body>
</html>
