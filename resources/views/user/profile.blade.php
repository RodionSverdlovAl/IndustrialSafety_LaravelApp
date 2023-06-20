@extends('layouts.user')
@section('content')
    <div class="row mt-3">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <h3 class="profile-username text-center">{{auth()->user()->name}} {{auth()->user()->surname}}</h3>

                    <p class="text-muted text-center">{{auth()->user()->position}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Отдел</b> <a class="float-right">{{auth()->user()->department}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Инцедентов</b> <a class="float-right">{{count($myIncidents)}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Тестов</b> <a class="float-right">{{count($myTests)}}</a>
                        </li>
                    </ul>
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
                                                <th>Название</th>
                                                <th>Вопросов</th>
                                                <th>Действие</th>
                                                <th>Статус</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($myTests as $test)
                                                <tr>
                                                    <td>{{$test->title}}</td>
                                                    <td>{{count($test->questions)}}</td>
                                                    <td>
                                                        <a class="btn btn-outline-info" href="{{route('user.assesment.create', $test->id)}}"
                                                        @foreach($assessments as $assessment)
                                                            @if($assessment->test_id == $test->id)
                                                                onclick="return false;"
                                                                style="color: red"
                                                            @endif
                                                        @endforeach
                                                        >Пройти тест</a>
                                                    </td>
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
