<div class="header">

    <div class="header-left">
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ asset('logo.png') }}" alt="Logo">
        </a>
        <a href="{{ route('dashboard') }}" class="logo logo-small">
            <img src="{{ asset('logo.png') }}" alt="Logo" width="30" height="30">
        </a>
    </div>

    <div class="menu-toggle">
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
        </a>
    </div>

    <div class="top-nav-search">

    </div>
    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>
    <ul class="nav user-menu">

        <li class="nav-item zoom-screen me-2">
            <a href="#" class="nav-link header-nav-list">
                <img src="{{ asset('Backend/assets/img/icons/header-icon-04.svg') }}" alt="">
            </a>
        </li>





        @php
            $notifications = \App\Models\Notification::leftjoin('users', 'users.id', '=', 'notifications.student_id')->whereDate('notifications.created_at', now())->where('notifications.type', '!=', 'announcement')->orderBy('notifications.created_at', 'DESC')->select('notifications.*', 'users.avatar')->get();
        @endphp
        <li class="nav-item dropdown noti-dropdown me-2" style="position: relative">
            <span class="bg-danger noti-count text-white">{{ count($notifications) }}</span>
            <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                <img src="{{ asset('Backend/assets/img/icons/header-icon-05.svg') }}" alt="">
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>

                <div class="noti-content">
                    <ul class="notification-list">
                        @foreach ($notifications as $notifications_details)
                            <li class="notification-message">
                                <a href="{{ $notifications_details->url }}">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img class="avatar-img rounded-circle" alt="User Image"
                                                src="@if ($notifications_details->avatar != null) {{ asset('uploads/all/' . $notifications_details->avatar) }} @else https://img.icons8.com/plumpy/24/user.png @endif">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span
                                                    class="noti-title">{{ $notifications_details->title }}</p>
                                            <p class="noti-time"><span
                                                    class="notification-time">{{ $notifications_details->created_at->diffForHumans() }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li>

        <li class="nav-item dropdown has-arrow new-user-menus">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle" src="{{ asset('logo.png') }}" width="31" alt="Soeng Souy">
                    <div class="user-text">
                        <h6>{{ auth()->user()->name }}</h6>
                        <p class="text-muted mb-0">Administrator</p>
                    </div>
                </span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="{{ asset('logo.png') }}" alt="User Image" class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6>{{ auth()->user()->name }}</h6>

                        <p class="text-muted mb-0">Administrator</p>
                    </div>
                </div>
                <a class="dropdown-item" href="#">My Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="dropdown-item">Logout</button>
                </form>


            </div>
        </li>
    </ul>
</div>


<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li><a href="{{ route('dashboard') }}" class="@yield('index_active')">Dashboard</a></li>

                <li class="menu-title">
                    <span>Management</span>

                <li class="submenu  @yield('blog_li')">
                    <a href="#"><i class="fa fa-newspaper"></i> <span> Blogs</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('blogs.index') }}" class="@yield('blog_a_1')">All Blogs</a></li>
                        <li><a href="{{ route('blog-categories.index') }}" class="@yield('blog_a')">Blog
                                Category</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu @yield('contact_li')">
                    <a href="#"><i class="fas fa-file-invoice-dollar"></i> <span> Appointments</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('appointments.request') }}" class="@yield('contact_a')">All
                                Appointments</a>
                        </li>

                    </ul>
                </li>
                <li class="submenu @yield('course_li')">
                    <a href="#"><i class="fas fa-book-reader"></i> <span> Courses</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('courses.index') }}" class="@yield('course_a')">List</a></li>
                        <li><a href="{{ route('courses.enrollments.history') }}"
                                class="@yield('course_a2')">Enrollments</a></li>

                    </ul>
                </li>
                <li class="submenu @yield('exam_li')">
                    <a href="#"><i class="fas fa-book-reader"></i> <span> Exams</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('exam.index') }}" class="@yield('exam_a')">List</a></li>
                    </ul>
                </li>
                <li class="submenu @yield('quiz_li')">
                    <a href="#"><i class="fas fa-clipboard-list"></i> <span> Quizzez</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('quizzez.create') }}" class="@yield('quiz_a1')">Add</a></li>
                        <li><a href="{{ route('quizzez.index') }}" class="@yield('quiz_a2')">List</a></li>
                        <li><a href="{{ route('result.index') }}" class="@yield('quiz_a3')">Results</a></li>
                    </ul>
                </li>

                <li class="submenu @yield('announcement_li')">
                    <a href="#"><i class="fas fa-clipboard-list"></i> <span> Announcements</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('announcement.index') }}" class="@yield('announcement_a1')">Add</a></li>
                    </ul>
                </li>

                <li class="submenu @yield('student_li')">
                    <a href="#"><i class="fas fa-graduation-cap"></i> <span> Students</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('student.list') }}" class="@yield('student_a1')">List</a></li>
                    </ul>
                </li>
                <li class="submenu  @yield('std_gallery_li')">
                    <a href="#"><i class="fa fa-newspaper"></i> <span> Gallery</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('student-gallery.index') }}" class="@yield('std_gallery_1')">Student
                                Gallery</a></li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
