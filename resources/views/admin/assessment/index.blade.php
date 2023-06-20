@extends('layouts.admin')
@section('content')
    <h3 class="mt-3">Результаты тестов</h3>
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">Результаты</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>Тест</th>
                    <th>Сотрудник</th>
                    <th>Результат</th>
                    <th>Дата</th>
                </tr>
                </thead>
                <tbody>
                @foreach($assessments as $assessment)
                    <tr>
                        <td>{{$assessment->test->title}}</td>
                        <td>{{$assessment->user->name}}{{$assessment->user->surname}}</td>
                        <td>{{$assessment->mark}} %</td>
                        <td>{{$assessment->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
