@extends('layouts.admin')
@section('content')
    <h3 class="mt-3">Документы</h3>
    <a type="button" href="{{route('admin.document.create')}}" class="btn btn-outline-success">Загрузить документ</a>
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">Список документов</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" id="searchInput" name="table_search" class="form-control float-right" placeholder="поиск">

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
                <th>Пользователь</th>
                <th>Отдел</th>
                <th>Дата/Время</th>
                <th>Скачивание</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>{{$document->name}}</td>
                    <td>{{$document->description}}</td>
                    <td>{{$document->user->name}}  {{$document->user->surname}}</td>
                    <td>{{$document->department}}</td>
                    <td>{{$document->created_at}}</td>
                    <td><a href="{{ route('files.download', $document->id) }}">скачать</a></td>
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
