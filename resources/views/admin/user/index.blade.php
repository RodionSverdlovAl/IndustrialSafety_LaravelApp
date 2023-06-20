@extends('layouts.admin')
@section('content')
    <div class="container mt-2">
        <a type="button" href="{{route('admin.user.register')}}" class="btn btn-block btn-success">Зарегистрировать сотрудника</a>
        <h4 class="mt-2">Список сотрудников</h4>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Сотрудники</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" id="searchInput" placeholder="поиск">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table id="dataTable" class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Отдел</th>
                        <th>Должность</th>
                        <th>Почта</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->department}}</td>
                            <td>{{$user->position}}</td>
                            <td>{{$user->email}}</td>
                            <td><a type="button" href="{{route('admin.user.show', $user->id)}}" class="btn-outline-info">посмотреть</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
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
