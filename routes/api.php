<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\BorrowRecordController;
// use App\Http\Controllers\BorrowRecordController;

// مسار للطلب المستخدم، محمي بميدل وير سانكتوم
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// مجموعة مسارات auth
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/info', [AuthController::class, 'info'])->middleware('auth:api')->name('info');
});

// مسارات الـ apiResource للمستخدمين
Route::middleware(['auth:api'])->group(function () {
    Route::apiResource('auth/users', UserController::class);
});
Route::apiResource('books', BookController::class);
Route::apiResource('BorrowRecord', BorrowRecordController::class);
Route::apiResource('Rating', RatingController::class);
// Route::post('createBorrowRecord', BorrowRecordController::class);
// Route::post('/BorrowRecord/createBorrowRecord', [BorrowRecordController::class, 'createBorrowRecord']);
