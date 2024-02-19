<div class="header">

    <div class="header-left">
        <a href="{{ route('student.dashboard') }}" class="logo">
            <img src="{{ asset('logo.png') }}" alt="Logo">
        </a>
        <a href="{{ route('student.dashboard') }}" class="logo logo-small">
            <img src="{{ asset('logo.png') }}" alt="Logo" width="30" height="30">
        </a>
    </div>

    <div class="menu-toggle">
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
        </a>
    </div>

    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>


    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>


    <ul class="nav user-menu">

        @php
            $notifications = \App\Models\Notification::whereDate('created_at', now())
                ->where('student_id', auth()->user()->id)
                ->where('type', '!=', 'user_register')
                ->where('type', '!=', 'enrollments')
                ->where('type', '!=', 'exam_attempt')

                ->orderBy('created_at', 'DESC')
                ->get();
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
                                                src="@if ($notifications_details->type == 'announcement') {{ asset('logo.png') }} @else assets/img/profiles/avatar-02.jpg @endif">

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
                    <a href="{{ route('user.notifications') }}">View all Notifications</a>
                </div>
            </div>
        </li>

        <li class="nav-item dropdown has-arrow new-user-menus">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle"
                        src="@if (auth()->user()->avatar != null) {{ asset('uploads/all/' . auth()->user()->avatar) }} @else https://img.icons8.com/pastel-glyph/64/person-male--v1.png @endif"
                        width="31" alt="{{ auth()->user()->name }}">
                    <div class="user-text">
                        <h6>{{ auth()->user()->name }}</h6>
                        <p class="text-muted mb-0">Student</p>
                    </div>
                </span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="@if (auth()->user()->avatar != null) {{ asset('uploads/all/' . auth()->user()->avatar) }} @else https://img.icons8.com/pastel-glyph/64/person-male--v1.png @endif"
                            alt="User Image" class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6>{{ auth()->user()->name }}</h6>
                        <p class="text-muted mb-0">Student</p>
                    </div>
                </div>
                <a class="dropdown-item" href="{{ route('student.profile') }}">My Profile</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </div>
        </li>

    </ul>

</div>
