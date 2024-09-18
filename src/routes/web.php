<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SessionController;
use App\Models\Person;

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

Route::get('/', [AuthorController::class, 'index']);
Route::get('/add', [AuthorController::class, 'add']);
Route::post('/add', [AuthorController::class, 'create']);
Route::get('/edit', [AuthorController::class, 'edit']);
Route::post('/edit', [AuthorController::class, 'update']);
Route::get('/delete', [AuthorController::class, 'delete']);
Route::post('/delete', [AuthorController::class, 'remove']);
Route::get('/relation', [AuthorController::class, 'relate']);

Route::prefix('book')->group(function(){
    Route::get('/', [BookController::class, 'index']);
    Route::get('/add', [BookController::class, 'add']);
    Route::post('/add', [BookController::class, 'create']);
});

Route::get('/session', [SessionController::class, 'getSes']);
Route::post('/session', [SessionController::class, 'postSes']);

// 論理削除の実行
Route::get('/softdelete', function(){
    Person::find(1)->delete();
});

// 論理削除されたレコードの確認
Route::get('/softdelete/store', function(){
    $person = Person::onlyTrashed()->get();
    dd($person);
});

// 論理削除されたレコードの復元
Route::get('/softdelete/store', function(){
    $result = Person::onlyTrashed()->restore();
    echo $result;
});

// 論理削除されたレコードの完全削除
Route::get('/softdelete/adsolute', function(){
    $result = Person::onlyTrashed()->forceDelete();
    echo $result;
});
