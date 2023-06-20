@extends('layouts.admin')
@section('content')

    <div class="card card-primary mt-3">
        <div class="card-header">
            <h3 class="card-title">Добавление документа</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="document-name">Название документа</label>
                    <input name="name" type="text" class="form-control" id="document-name" placeholder="Название">
                </div>
                <div class="form-group">
                    <label for="description">Описание документа</label>
                    <textarea name="description" type="text" class="form-control" id="description" placeholder="Описание"></textarea>
                </div>
                <div class="form-group">
                    <label for="department">Отдел</label>
                    <input name="department" type="text" class="form-control" id="department" placeholder="Отдел">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Загрузите файл</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="pdf" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Загрузить</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </form>
    </div>
@endsection
