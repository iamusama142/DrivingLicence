@extends('Backend.Layouts.master')
@section('class_dashboard', 'active')
@section('title', 'Driving School Managenment Admin Dashboard')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @php
            $students = \App\Models\User::where('type', 'user')->count();
            $revenue = \App\Models\Enrollment::join('courses', 'courses.id', '=', 'enrollments.course_id')->sum('courses.price');
            $enrollments_month = \App\Models\Enrollment::whereMonth('created_at', now()->format('m'))->count();
            $exams_attempt = \App\Models\ParticapateQuiz::whereMonth('created_at', now()->format('m'))->count();

            // Fetch enrollment data grouped by month, course, and course name
            $enrollments = \App\Models\Enrollment::join('courses', 'enrollments.course_id', '=', 'courses.id')->select(DB::raw('MONTH(enrollments.created_at) as month'), 'enrollments.course_id', 'courses.title as course_name', DB::raw('count(*) as enrollments_count'))->groupBy('month', 'enrollments.course_id', 'course_name')->orderBy('month')->get();

            // Process data to find the best-selling course for each month
            $bestSellingCourses = [];
            foreach ($enrollments as $enrollment) {
                $month = $enrollment->month;
                $courseId = $enrollment->course_id;
                $courseName = $enrollment->course_name;
                $enrollmentsCount = $enrollment->enrollments_count;

                if (!isset($bestSellingCourses[$month]) || $enrollmentsCount > $bestSellingCourses[$month]['enrollments_count']) {
                    $bestSellingCourses[$month] = [
                        'course_id' => $courseId,
                        'course_name' => $courseName,
                        'enrollments_count' => $enrollmentsCount,
                    ];
                }
            }

        @endphp
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Students</h6>
                                <h3>{{ number_format($students) }}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('Backend/assets/img/icons/dash-icon-01.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Enrollments This Month</h6>
                                <h3>{{ number_format($enrollments_month) }}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('Backend/assets/img/icons/dash-icon-02.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Exams Attended This Month</h6>
                                <h3>{{ number_format($exams_attempt) }}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="http://127.0.0.1:8000/Backend/assets/img/icons/student-icon-01.svg"
                                    alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Revenue</h6>
                                <h3>$ {{ number_format($revenue) }}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('Backend/assets/img/icons/dash-icon-04.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="card-title">Best Selling Course</h5>
                            </div>
                            <div class="col-6">
                                <ul class="chart-list-out">
                                    @if(count($bestSellingCourses) > 0)
                                    @foreach ($bestSellingCourses as $month => $data)
                                        <li><span class="circle-blue"></span>{{ $data['course_name'] }}</li>
                                    @endforeach
                                    @else
No Record Found
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="apexcharts-area-1"></div>
                    </div>
                </div>

            </div>
        </div>



    </div>
@endsection

@section('script')
    @if (count($bestSellingCourses) > 0)
        <script>
            var bestSellingCourses = @json($bestSellingCourses);
            var data = [];
            var categories = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec'];

            for (var i = 1; i <= categories.length; i++) {
                var bestCourse = bestSellingCourses[i] || {
                    course_id: null
                };
                var courseId = bestCourse.course_id;
                var enrollmentsCount = bestCourse.enrollments_count || 0;
                data.push(enrollmentsCount);
            }

            var options = {
                chart: {
                    height: 350,
                    type: "line",
                    toolbar: {
                        show: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: "smooth"
                },
                series: [{
                    name: "Best-Selling Course",
                    color: '#3D5EE1',
                    data: data
                }],
                xaxis: {
                    categories: categories
                }
            };
            var chart = new ApexCharts(document.querySelector("#apexcharts-area-1"), options);
            chart.render();
        </script>
    @endif


@endsection
