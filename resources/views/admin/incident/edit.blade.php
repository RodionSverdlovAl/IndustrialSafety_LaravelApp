@extends('layouts.admin')
@section('content')

    <div class="card card-primary mt-3">
        <div class="card-header">
            <h3 class="card-title">Редактирование инцидента</h3>
        </div>
        <!-- form start -->
        <form action="{{route('admin.incident.update')}}" method="POST">
            @csrf
            @method('patch')
            <input name="id" type="text" value="{{$incident->id}}" style="display:none">
            <div class="card-body">
                <div class="form-group">
                    <label for="document-name">Заголовок инцидента</label>
                    <input value="{{$incident->name}}" name="name" type="text" class="form-control" id="document-name" placeholder="Название">
                </div>
                <div class="form-group">
                    <label for="description">Описание инцидента</label>
                    <textarea name="description" type="text" class="form-control" id="description" placeholder="Описание">{{$incident->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Статус инцидента</label>
                    <select class="form-select" name="status">
                        <option value="Новый" {{$incident->status == "Новый" ? "selected" : ""}}>Новый</option>
                        <option value="На расмотрении" {{$incident->status == "На расмотрении" ? "selected" : ""}}>На рассмотрении</option>
                        <option value="Завершен" {{$incident->status == "Завершен" ? "selected" : ""}}>Завершен</option>
                        <option value="Отклонен" {{$incident->status == "Отклонен" ? "selected" : ""}}>Отклонен</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </div>
        </form>
    </div>
@endsection



