@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактирование пользователя</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.user.update') }}">
                            @csrf
                            @method('patch')

                            <input style="display:none" name="id" type="number" value="{{$user->id}}">

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="surname" class="col-md-4 col-form-label text-md-end">Фамилия</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{$user->surname}}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="department" class="col-md-4 col-form-label text-md-end">Отдел</label>

                                <div class="col-md-6">
                                    <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{$user->department}}" required autocomplete="department" autofocus>

                                    @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="position" class="col-md-4 col-form-label text-md-end">Должность</label>

                                <div class="col-md-6">
                                    <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{$user->position}}" required autocomplete="position" autofocus>

                                    @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                       Сохранить изменения
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
