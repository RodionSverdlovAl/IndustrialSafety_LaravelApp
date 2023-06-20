@extends('layouts.admin')
@section('content')
    <h3 class="mt-3">Инцеденты</h3>
    <a type="button" href="{{route('admin.incident.create')}}" class="btn btn-outline-success">Регистрация инцидента</a>
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">Список инцидентов</h3>

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
                    <th>Описание</th>
                    <th>Создатель</th>
                    <th>Статус</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($incidents as $incident)
                    <tr>
                        <td>{{$incident->name}}</td>
                        <td>{{$incident->description}}</td>
                        <td>{{$incident->user->name}} {{$incident->user->surname}}</td>
                        <td>{{$incident->status}}</td>
                        <td><a class="btn btn-outline-info" href="{{route('admin.incident.edit', $incident->id)}}">редактировать</a></td>
                        <td>
                            <form action="{{route('admin.incident.delete', $incident->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger">удалить</button>
                            </form>
                        </td>
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
