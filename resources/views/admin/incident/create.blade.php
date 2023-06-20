@extends('layouts.admin')
@section('content')

    <div class="card card-primary mt-3">
        <div class="card-header">
            <h3 class="card-title">Регистрация инцидента</h3>
        </div>
        <!-- form start -->
        <form action="{{route('admin.incident.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="document-name">Заголовок инцидента</label>
                    <input name="name" type="text" class="form-control" id="document-name" placeholder="Название">
                </div>
                <div class="form-group">
                    <label for="description">Описание инцидента</label>
                    <textarea name="description" type="text" class="form-control" id="description" placeholder="Описание"></textarea>
                </div>
                <div class="form-group">
                    <label for="user_ids">Выберите участников инцидента</label>
                    <select class="form-select" name="user_ids[]" id="user_ids" multiple required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{$user->surname}} {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Статус инцидента</label>
                    <select class="form-select" name="status">
                        <option value="Новый">Новый</option>
                        <option value="На расмотрении">На рассмотрении</option>
                        <option value="Завершен">Завершен</option>
                        <option value="Отклонен">Отклонен</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Зарегистрировать инцидент</button>
            </div>
        </form>
    </div>
@endsection



