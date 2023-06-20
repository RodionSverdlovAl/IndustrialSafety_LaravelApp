@extends('layouts.admin')
@section('content')

    <div class="card card-primary mt-3">
        <div class="card-header">
            <h3 class="card-title">Редактирование теста</h3>
        </div>
        <!-- form start -->
        <form action="{{route('admin.test.update')}}" method="POST">
            @csrf
            @method('patch')
            <input name="id" type="number" value="{{$test->id}}" style="display: none">
            <div class="card-body">
                <div class="form-group">
                    <label for="document-name">Название теста</label>
                    <input value="{{$test->title}}" name="title" type="text" class="form-control" id="document-name" placeholder="Название">
                </div>
                <div class="form-group">
                    <label for="document-name">Укажимте период прохождения теста (в сутках)</label>
                    <input value="{{$test->period}}" name="period" type="number" class="form-control" id="document-name" placeholder="период">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </div>
        </form>
    </div>
@endsection



