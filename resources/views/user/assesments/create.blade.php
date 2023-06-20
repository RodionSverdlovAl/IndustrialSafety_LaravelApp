@extends('layouts.user')
@section('content')
{{--    <h3 class="mt-3">Тест: {{$test->title}}</h3>--}}
{{--    <div class="card mt-2">--}}
{{--        <div class="card-header">--}}
{{--            <h3 class="card-title">Список вопросов</h3>--}}
{{--            <div class="card-tools">--}}
{{--                <div class="input-group input-group-sm" style="width: 150px;">--}}
{{--                    <input type="text" name="table_search" class="form-control float-right" placeholder="поиск">--}}

{{--                    <div class="input-group-append">--}}
{{--                        <button type="submit" class="btn btn-default">--}}
{{--                            <i class="fas fa-search"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="card-body table-responsive p-0">--}}
{{--            <table class="table table-hover text-nowrap">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th>Вопрос</th>--}}
{{--                    <th>Варианты</th>--}}
{{--                    <th style="display:none">Ответ</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($test->questions as $question)--}}
{{--                    <tr>--}}
{{--                        <td>{{$question->title}}</td>--}}
{{--                        <td id="my-answer">--}}
{{--                            <ul>--}}
{{--                                @foreach($question->variants as $key => $value)--}}
{{--                                    <li>--}}
{{--                                        <input type="radio" name="{{$question->id}}" value="{{$key}}" />--}}
{{--                                        <label>{{$key}}){{$value}}</label>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}

{{--                        </td>--}}
{{--                        <td id="rigth-answer" style="display:none">{{$question->answer}}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <form action="#">--}}
{{--        <input type="text" name="test_id" value="{{$test->id}}">--}}
{{--        <input type="text" name="user_id" value ="{{auth()->user()->id}}">--}}
{{--        <input type="text" name="test_result" id="test_result">--}}
{{--        <a type="button" href="{{route('admin.question.create', $test->id)}}" class="btn btn-outline-success">Завершить тест и отправить результаты</a>--}}
{{--    </form>--}}

{{--    <script>--}}
{{--        // Обработчик нажатия на кнопку формы--}}
{{--        document.querySelector('form').addEventListener('submit', function(event) {--}}
{{--            event.preventDefault(); // Отменяем отправку формы--}}

{{--            // Получаем все выбранные варианты ответов--}}
{{--            var selectedOptions = document.querySelectorAll('input[type="radio"]:checked');--}}

{{--            // Подсчитываем количество правильных ответов--}}
{{--            var correctAnswers = 0;--}}
{{--            selectedOptions.forEach(function(option) {--}}
{{--                // Проверяем, является ли выбранный ответ правильным--}}
{{--                if (option.parentElement.parentElement.querySelector('#rigth-answer').textContent === option.value) {--}}
{{--                    correctAnswers++;--}}
{{--                }--}}
{{--            });--}}

{{--            // Рассчитываем процент правильных ответов--}}
{{--            var totalQuestions = {{$test->questions->count()}}; // Общее количество вопросов--}}
{{--            var percentage = (correctAnswers / totalQuestions) * 100;--}}

{{--            // Устанавливаем значение в поле формы--}}
{{--            document.querySelector('#test_result').value = percentage.toFixed(2) + '%';--}}

{{--            // Отправляем форму--}}
{{--            this.submit();--}}
{{--        });--}}
{{--    </script>--}}


<h3 class="mt-3">Тест: {{$test->title}}</h3>
<div class="card mt-2">
    <div class="card-header">
        <h3 class="card-title">Список вопросов</h3>
        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="поиск">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>Вопрос</th>
                <th>Варианты</th>
                <th style="display:none">Ответ</th>
            </tr>
            </thead>
            <tbody>
            @foreach($test->questions as $question)
                <tr>
                    <td>{{$question->title}}</td>
                    <td class="my-answer">
                        <ul>
                            @foreach($question->variants as $key => $value)
                                <li>
                                    <input type="radio" name="question_{{$question->id}}" value="{{$key}}" />
                                    <label>{{$key}}) {{$value}}</label>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="right-answer" style="display:none">{{$question->answer}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<form id="test-form" action="{{route('user.assesment.store')}}" method="POST">
    @csrf
    <input type="hidden" name="test_id" value="{{$test->id}}">
    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
    <input style="display:none" type="text" name="test_result" id="test_result" readonly>
    <button type="submit" class="btn btn-outline-success">Завершить тест и отправить результаты</button>
</form>

<script>
    document.getElementById('test-form').addEventListener('submit', function(event) {
        event.preventDefault();

        var selectedOptions = document.querySelectorAll('input[type="radio"]:checked');
        var correctAnswers = 0;

        selectedOptions.forEach(function(option) {
            var questionRow = option.closest('tr');
            var rightAnswer = questionRow.querySelector('.right-answer').textContent;

            if (option.value === rightAnswer) {
                correctAnswers++;
            }
        });

        var totalQuestions = {{$test->questions->count()}};
        var percentage = (correctAnswers / totalQuestions) * 100;

        document.getElementById('test_result').value = percentage.toFixed(2);

        this.submit();
    });
</script>


@endsection
