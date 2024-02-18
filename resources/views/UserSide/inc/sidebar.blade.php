<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="submenu @yield('dashboard_li')">
                    <a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('student.dashboard') }}" class="@yield('dashboard_a')">Student Dashboard</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu @yield('s_enrollment')">
                    <a href="#"><i class="fas fa-book-reader"></i> <span> Courses</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('student.enrollments.history') }}" class="@yield('s_enrollment_history')">Enrollments History</a>
                        </li>

                    </ul>
                </li>
                <li class="submenu @yield('s_exam')">
                    <a href="#"><i class="fas fa-graduation-cap"></i> <span> Exams</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('student.result') }}" class="@yield('s_result_1')">Results</a></li>
                        <li><a href="{{ route('student.result.inquiry') }}" class="@yield('s_result_2')">Result Inquiry</a></li>

                    </ul>
                </li>


            </ul>
        </div>
    </div>
</div>
