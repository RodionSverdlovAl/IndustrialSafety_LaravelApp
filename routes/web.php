<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// маршруты администратора
Route::group(['middleware'=>'admin'],function (){

    Route::get('admin/employees', [App\Http\Controllers\Admin\UserController::class, 'index'])
        ->name('admin.user.index');
    Route::get('admin/user/show/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])
        ->name('admin.user.show');
    Route::get('admin/user/register', [App\Http\Controllers\Admin\UserController::class, 'showRegistrationForm'])
    ->name('admin.user.register');
    Route::get('admin/user/edit/{user}', [App\Http\Controllers\Admin\UserController::class, 'edit'])
        ->name('admin.user.edit');
    Route::patch('admin/user/update', [App\Http\Controllers\Admin\UserController::class, 'update'])
        ->name('admin.user.update');

    Route::post('admin/document/upload', [App\Http\Controllers\Admin\DocumentController::class, 'upload'])
        ->name('upload');
    Route::get('admin/document/create', [App\Http\Controllers\Admin\DocumentController::class, 'create'])
        ->name('admin.document.create');
    Route::get('admin/document/index', [App\Http\Controllers\Admin\DocumentController::class, 'index'])
        ->name('admin.document.index');
    Route::get('/files/{id}/download', [App\Http\Controllers\Admin\DocumentController::class, 'downloadFile'])
        ->name('files.download');

    Route::get('admin/incident/create', [App\Http\Controllers\Admin\IncidientController::class, 'create'])
        ->name('admin.incident.create');
    Route::post('admin/incident/store', [App\Http\Controllers\Admin\IncidientController::class, 'store'])
        ->name('admin.incident.store');
    Route::get('admin/incident/index', [App\Http\Controllers\Admin\IncidientController::class, 'index'])
        ->name('admin.incident.index');
    Route::get('admin/incident/edit/{incident}', [App\Http\Controllers\Admin\IncidientController::class, 'edit'])
        ->name('admin.incident.edit');
    Route::patch('admin/incident/update', [App\Http\Controllers\Admin\IncidientController::class, 'update'])
        ->name('admin.incident.update');
    Route::delete('admin/incident/delete/{incident}', [App\Http\Controllers\Admin\IncidientController::class, 'destroy'])
        ->name('admin.incident.delete');

    Route::get('admin/test/index', [App\Http\Controllers\Admin\TestController::class, 'index'])
        ->name('admin.test.index');
    Route::get('admin/test/create', [App\Http\Controllers\Admin\TestController::class, 'create'])
        ->name('admin.test.create');
    Route::post('admin/test/store', [App\Http\Controllers\Admin\TestController::class, 'store'])
        ->name('admin.test.store');
    Route::get('admin/test/show/{test}', [App\Http\Controllers\Admin\TestController::class, 'show'])
        ->name('admin.test.show');
    Route::get('admin/test/edit/{test}', [App\Http\Controllers\Admin\TestController::class, 'edit'])
        ->name('admin.test.edit');
    Route::patch('admin/test/update', [App\Http\Controllers\Admin\TestController::class, 'update'])
        ->name('admin.test.update');
    Route::delete('admin/test/delete/{test}', [App\Http\Controllers\Admin\TestController::class, 'destroy'])
        ->name('admin.test.delete');

    Route::get('admin/question/create/{test}', [App\Http\Controllers\Admin\QuestionController::class, 'create'])
        ->name('admin.question.create');
    Route::post('admin/question/store', [App\Http\Controllers\Admin\QuestionController::class, 'store'])
        ->name('admin.question.store');
    Route::delete('admin/question/delete/{question}', [App\Http\Controllers\Admin\QuestionController::class, 'destroy'])
        ->name('admin.question.delete');

    Route::get('admin/assessment/index', [App\Http\Controllers\AssesmentController::class, 'index'])
        ->name('admin.assessment.index');

});

// маршруты пользователя
Route::get('user/profile', [App\Http\Controllers\User\ProfileController::class, 'profile'])->name('user.profile');
Route::get('user/assesment/create/{test}', [App\Http\Controllers\AssesmentController::class, 'create'])
    ->name('user.assesment.create');
Route::post('user/assesment/store', [App\Http\Controllers\AssesmentController::class, 'store'])
    ->name('user.assesment.store');
Route::get('user/document/index', [App\Http\Controllers\User\ProfileController::class, 'documentIndex'])
    ->name('user.document.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
