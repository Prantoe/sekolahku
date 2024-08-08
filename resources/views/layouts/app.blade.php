<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body style="background: lightgray">
    <div class="container mt-5">
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <!-- Navbar with tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="users-tab" href="{{ route('users.index') }}" role="tab" aria-controls="users" aria-selected="true">Users</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="courses-tab" href="{{ route('courses.index') }}" role="tab" aria-controls="courses" aria-selected="false">Courses</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="userCourses-tab" href="{{ route('userCourses.index') }}" role="tab" aria-controls="userCourses" aria-selected="false">User Courses</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <!-- Users Tab -->
                    <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                        @yield('users-content')
                    </div>
                    <!-- Courses Tab -->
                    <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                        @yield('courses-content')
                    </div>
                    <!-- User Courses Tab -->
                    <div class="tab-pane fade" id="userCourses" role="tabpanel" aria-labelledby="userCourses-tab">
                        @yield('userCourses-content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
