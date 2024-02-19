@extends('Backend.Layouts.master')
@section('s_exam', 'active')
@section('s_result_2', 'active')
@section('title', 'Inqery Results')
@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Questions</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Questions</li>
                    </ul>
                </div>
            </div>
        </div>



        <div class="col-md-12">


            <section class="mt-4">
                <div class="container">
                    <form class="card">

                        <div class="card-body">
                            @foreach ($questions as $key => $question)
                                @php
                                    $correct_answers = \App\Models\Quiz::where('id', $question->question_id)->first();

                                    $user_answer = $question->answer;
                                @endphp
                                <div class="tab d-none">
                                    <div class="mb-3">
                                        <input type="hidden" name="question" value="{{ $question->id }}">
                                        <label class="form-label">{{ $key + 1 }}.
                                            {{ $correct_answers->questions }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <input type="radio" name="answer" value="A" disabled>
                                        <label
                                            class="form-label @if ($user_answer == 'A' && $user_answer == $correct_answers->correct_options) text-success fw-bold @elseif($user_answer == 'A') text-danger fw-bold @endif">{{ $correct_answers->options_a }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <input type="radio" name="answer" value="B" disabled>
                                        <label
                                            class="form-label @if ($user_answer == 'B' && $user_answer == $correct_answers->correct_options) text-success fw-bold @elseif($user_answer == 'B') text-danger fw-bold @endif">{{ $correct_answers->options_b }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <input type="radio" name="answer" value="C" disabled>
                                        <label
                                            class="form-label @if ($user_answer == 'C' && $user_answer == $correct_answers->correct_options) text-success fw-bold @elseif($user_answer == 'C') text-danger fw-bold @endif">{{ $correct_answers->options_c }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <input type="radio" name="answer" value="D" disabled>
                                        <label
                                            class="form-label @if ($user_answer == 'D' && $user_answer == $correct_answers->correct_options) text-success fw-bold @elseif($user_answer == 'D') text-danger fw-bold @endif">{{ $correct_answers->options_d }}</label>
                                    </div>
                                    @if ($user_answer == $correct_answers->correct_options)
                                        <p
                                            class="float-end font-weight-bold @if ($user_answer == $correct_answers->correct_options) text-success fw-bold @else text-danger fw-bold @endif">
                                            <img width="26" height="26"
                                                src="https://img.icons8.com/external-tal-revivo-green-tal-revivo/36/external-checkmark-sign-with-outline-effect-isolated-on-white-background-votes-green-tal-revivo.png"
                                                alt="external-checkmark-sign-with-outline-effect-isolated-on-white-background-votes-green-tal-revivo" />
                                            Correct Answer!
                                        </p>
                                    @else
                                        <p
                                            class="float-end font-weight-bold @if ($user_answer == $correct_answers->correct_options) text-success fw-bold @else text-danger fw-bold @endif">
                                            <img width="26" height="26"
                                                src="https://img.icons8.com/emoji/48/cross-mark-emoji.png"
                                                alt="cross-mark-emoji" /> Incorrect Answer. The correct answer is:
                                            {{ $correct_answers->correct_options }}
                                        </p>
                                    @endif
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


        // Attach event listener for unload event
        window.addEventListener('unload', handleWindowUnload);
        var currentQuestion = 0;
        var numQuestions = {{ count($questions) }};

        function loadQuestion(index) {
            var tabs = $(".tab");
            tabs.addClass("d-none");
            $(tabs[index]).removeClass("d-none");

            $("#back_button").prop("disabled", index === 0);
            $("#next_button").text(index === numQuestions - 1 ? "Return Results" : "Next");
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

            setTimeout(function() {
                // Redirect to the next URL
                window.location.href =
                    "{{ route('result.index') }}"; // Replace 'next_url' with your Laravel route name
            }); // Change 3000 to the time it takes to submit the quiz (in milliseconds)
        }

        function next() {
            var selectedAnswer = $("input[name='answer']:checked").val();

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




@endsection
