@extends('layouts.admin')
@section('content')

    <div class="card card-primary mt-3">
        <div class="card-header">
            <h3 class="card-title">Добавление теста</h3>
        </div>
        <!-- form start -->
        <form action="{{route('admin.test.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="document-name">Название теста</label>
                    <input name="title" type="text" class="form-control" id="document-name" placeholder="Название">
                </div>
                <div class="form-group">
                    <label for="user_ids">Выберите участников теста</label>
                    <select class="form-select" name="user_ids[]" id="user_ids" multiple required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{$user->surname}} {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="document-name">Укажимте период прохождения теста (в сутках)</label>
                    <input name="period" type="number" class="form-control" id="document-name" placeholder="период">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Создать тест</button>
            </div>
        </form>
    </div>
@endsection



