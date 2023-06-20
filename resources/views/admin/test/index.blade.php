@extends('layouts.admin')
@section('content')
    <h3 class="mt-3">Тесты</h3>
    <a type="button" href="{{route('admin.test.create')}}" class="btn btn-outline-success">Добавть тест</a>
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">Список тестов</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input id="searchInput" type="text" name="table_search" class="form-control float-right" placeholder="поиск">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table id="dataTable" class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Подписчики теста</th>
                    <th>Вопросов</th>
                    <th>Период прохождения</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tests as $test)
                    <tr>
                        <td>{{$test->title}}</td>
                        <td>
                            <ul>
                            @foreach ($test->user_ids as $user_id)
                                <li>
                                @foreach($users as $user)
                                        {{$user->id == $user_id ? $user->name . " " . $user->surname: ""}}
                                @endforeach
                                </li>
                            @endforeach
                            </ul>
                        </td>
                        <td>{{count($test->questions)}}</td>
                        <td>{{$test->period}} Дней</td>
                        <td><a class="btn btn-outline-info" href="{{route('admin.test.show', $test->id)}}">перейти</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Получаем элементы таблицы и поле ввода
        var table = document.getElementById('dataTable');
        var searchInput = document.getElementById('searchInput');
        var rows = table.getElementsByTagName('tr');

        // Обработчик события ввода текста
        searchInput.addEventListener('input', function() {
            var searchText = this.value.toLowerCase();

            // Проходим по каждой строке таблицы, начиная с индекса 1 (пропускаем заголовки)
            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var rowData = row.innerHTML.toLowerCase();

                if (rowData.indexOf(searchText) === -1) {
                    row.style.display = 'none';
                } else {
                    row.style.display = '';
                }
            }
        });
    </script>
@endsection
