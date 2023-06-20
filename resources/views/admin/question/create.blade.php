@extends('layouts.admin')
@section('content')

    <div class="card card-primary mt-3">
        <div class="card-header">
            <h3 class="card-title">Создание вопроса</h3>
        </div>
        <!-- form start -->
        <form action="{{route('admin.question.store')}}" method="POST">
            <input name="test_id" type="number" style="display:none" value="{{$test->id}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="document-name">Вопрос</label>
                    <input name="title" type="text" class="form-control" id="document-name" placeholder="Вопрос">
                </div>
                <div class="form-group">
                    <label for="description">Варианты ответа</label>
                    <input name="var1" type="text" class="form-control mt-1" id="document-name" placeholder="1 вариант ответа">
                    <input name="var2" type="text" class="form-control mt-1" id="document-name" placeholder="2 вариант ответа">
                    <input name="var3" type="text" class="form-control mt-1" id="document-name" placeholder="3 вариант ответа">
                    <input name="var4" type="text" class="form-control mt-1" id="document-name" placeholder="4 вариант ответа">
                </div>
                <div class="form-group">
                    <label for="description">Правильный ответ</label>
                    <select name="answer" id="">
                        <option value="1">1 вариант</option>
                        <option value="2">2 вариант</option>
                        <option value="3">3 вариант</option>
                        <option value="4">4 вариант</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </form>
    </div>
@endsection



