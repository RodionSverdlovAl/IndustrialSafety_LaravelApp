@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">

                <h3 class="profile-username text-center">{{$user->surname}} {{$user->name}}</h3>

                <p class="text-muted text-center">{{$user->position}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Отдел</b> <a class="float-right">{{$user->department}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Инцедентов</b> <a class="float-right">0</a>
                    </li>
                    <li class="list-group-item">
                        <b>Тестов пройдено</b> <a class="float-right">0</a>
                    </li>
                </ul>

                <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-primary btn-block"><b>Редактированить</b></a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <div class="post">
                            <div class="card mt-2">
                                <div class="card-header">
                                    <h3 class="card-title">Список тестов</h3>

                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Название</th>
                                            <th>Вопросов</th>
                                            <th>Результат</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($myTests as $test)
                                            <tr>
                                                <td>{{$test->title}}</td>
                                                <td>{{count($test->questions)}}</td>
                                                <td>
                                                    @foreach($assessments as $assessment)
                                                        @if($assessment->test_id == $test->id)
                                                            <ul>
                                                                <li>Тест пройден: {{$assessment->created_at}}</li>
                                                                <li>Результат: {{$assessment->mark}}%</li>
                                                                <li style="color:red">Следующий тест: {{$assessment->created_at->copy()->addDays($test->period)}}</li>
                                                            </ul>
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.post -->
                        <!-- Post -->
                        <div class="post">
                            <div class="card mt-2">
                                <div class="card-header">
                                    <h3 class="card-title">Инцеденты</h3>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Название</th>
                                            <th>Описание</th>
                                            <th>Ответсвенный</th>
                                            <th>Статус</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($myIncidents as $incident)
                                            <tr style="white-space:normal">
                                                <td>{{$incident->name}}</td>
                                                <td>{{$incident->description}}</td>
                                                <td>{{$incident->user->name}} {{$incident->user->surname}}</td>
                                                <td>{{$incident->status}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@endsection
