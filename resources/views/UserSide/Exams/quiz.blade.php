@extends('UserSide.layouts.app')
@section('exam_li', 'active')
@section('exam_a', 'active')
@section('title', 'Exam Lists')
@section('content')
    <style>
        .loader {
            border: 8px solid #f3f3f3;
            /* Light grey */
            border-top: 8px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 1;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .submitting-message {
            color: white;
            font-size: 20px;
            text-align: center;
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Questions</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Questions</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Total Time : {{ $exam->timer }} Minutes</h5>
                    </div>
                    <div class="card-body">
                        <h6>Remaining Time</h6>
                        <span id="timer-countdown"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-12">


                <section class="mt-4">
                    <div class="container">
                        <form class="card">

                            <div class="card-body">
                                @foreach ($questions as $key => $question)
                                    <div class="tab d-none">
                                        <div class="mb-3">
                                            <input type="hidden" name="question" value="{{ $question->id }}">
                                            <label class="form-label">{{ $key + 1 }}.
                                                {{ $question->questions }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <input type="radio" name="answer" value="A">
                                            <label class="form-label">{{ $question->options_a }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <input type="radio" name="answer" value="B">
                                            <label class="form-label">{{ $question->options_b }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <input type="radio" name="answer" value="C">
                                            <label class="form-label">{{ $question->options_c }}</label>
                                        </div>
                                        <div class="mb-3">
                                            <input type="radio" name="answer" value="D">
                                            <label class="form-label">{{ $question->options_d }}</label>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                            <div class="card-footer text-end">
                                <div class="d-flex">
                                    {{-- <button type="button" id="back_button" class="btn btn-link"
                                        onclick="back()">Back</button> --}}
                                    <button type="button" id="next_button" class="btn btn-primary ms-auto"
                                        onclick="next()">Next</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Function to handle window unload
        function handleWindowUnload(event) {
            // Redirect to main page if user clicked on "Reload"
            if (event.currentTarget.performance.navigation.type === PerformanceNavigation.TYPE_RELOAD) {
                window.location.href = 'student/dahboard'; // Replace '/main-page' with your main page URL
            }
        }

        // Attach event listener for unload event
        window.addEventListener('unload', handleWindowUnload);

        var currentQuestion = 0;
        var numQuestions = {{ count($questions) }};

        function loadQuestion(index) {
            var tabs = $(".tab");
            tabs.addClass("d-none");
            $(tabs[index]).removeClass("d-none");

            $("#back_button").prop("disabled", index === 0);
            $("#next_button").text(index === numQuestions - 1 ? "Submit" : "Next");
        }

        loadQuestion(currentQuestion);

        function saveAnswer(questionId, answer) {


            $.ajax({
                type: "POST",
                url: "/save-answer",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    question_id: questionId,
                    answer: answer
                },
                success: function(response) {
                    console.log("Answer saved successfully.");
                },
                error: function(xhr, status, error) {
                    console.error("Error saving answer:", error);
                }
            });
        }

        function submitQuiz() {
            // Add loader
            var loader = document.createElement("div");
            loader.className = "loader";
            document.body.appendChild(loader);
            // Display "Submitting quiz..." message
            var submittingMessage = document.createElement("div");
            submittingMessage.textContent = "Submitting quiz...";
            submittingMessage.style.color = "white"; // Set the text color to white
            document.body.appendChild(submittingMessage);
            // Set body opacity
            document.body.style.opacity = "0.1";
            document.body.backgroundColor = "black";
            setTimeout(function() {
                // Redirect to the next URL
                window.location.href = "{{route('exam.result.student')}}"; // Replace 'next_url' with your Laravel route name
            }, 5000); // Change 3000 to the time it takes to submit the quiz (in milliseconds)
        }

        function next() {
            var selectedAnswer = $("input[name='answer']:checked").val();
            if (!selectedAnswer) {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                }
                toastr.error("Please Select an Answer")
                return;
            }
            // Retrieve the question ID from the hidden input field
            var questionId = $("input[name='question']").eq(currentQuestion).val();
            saveAnswer(questionId, selectedAnswer); // Use questionId here
            currentQuestion++;
            if (currentQuestion >= numQuestions) {
                // Handle submission
                submitQuiz();
                // You can submit the answers via AJAX or regular form submission here
            } else {
                loadQuestion(currentQuestion);
            }
        }



        function back() {
            currentQuestion--;
            loadQuestion(currentQuestion);
        }
    </script>


    <script>
        $(document).ready(function() {
            var timerInMinutes = {{ $exam->timer }} * 60; // Convert minutes to seconds
            if ($('#timer-countdown').length > 0) {
                $('#timer-countdown').countdown({
                    from: timerInMinutes, // Start from {{ $exam->timer }} minutes
                    to: 0, // Countdown to 0
                    movingUnit: 1000,
                    timerEnd: undefined,
                    outputPattern: '$minute Min : $second Sec',
                    autostart: true
                });
            }
        });
    </script>

@endsection
