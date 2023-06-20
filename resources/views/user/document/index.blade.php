@extends('layouts.user')
@section('content')
    <h3 class="mt-3">Документы</h3>
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">Список документов</h3>

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
@endsection
