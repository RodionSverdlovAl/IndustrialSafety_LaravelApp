@extends('layouts.admin')
@section('content')
    <h3 class="mt-3">Тест: {{$test->title}}</h3>
    <a type="button" href="{{route('admin.question.create', $test->id)}}" class="btn btn-outline-success">Добавить вопрос</a>
    <a type="button" href="{{route('admin.test.edit', $test->id)}}" class="btn btn-outline-success">Редактировать тест</a>
    <form class="mt-3" action="{{route('admin.test.delete', $test->id)}}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-outline-danger" type="submit">удалить</button>

    </form>
    <h4 class="mt-3">Подписчики теста</h4>
    <ul>
        @foreach($test->user_ids  as $user_id)
            <li>
                @foreach($users as $user)
                    {{$user_id == $user->id ? $user->name . " " . $user->surname : ""}}
                @endforeach
            </li>
        @endforeach
    </ul>
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">Список вопросов</h3>
            <div class="card-tools">

            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>Вопрос</th>
                    <th>Варианты</th>
                    <th>Ответ</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($test->questions as $question)
                    <tr>
                        <td>{{$question->title}}</td>
                        <td>
                            <ul>
                                @foreach($question->variants as $key=>$value)
                                    <li>{{$key}}) {{$value}}</li>
                                @endforeach
                            </ul>

                        </td>
                        <td>{{$question->answer}}</td>
                        <td>
                            <form action="{{route('admin.question.delete', $question->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger" >удалить</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
