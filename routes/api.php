<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\TicketsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Auth::routes();


Route::post('register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });


   // Route::get('new-ticket', [TicketsController::class, 'create']);

    Route::post('new-ticket', [TicketsController::class, 'store']);

    Route::get('my_tickets', [TicketsController::class, 'userTickets']);

    Route::get('tickets/{ticket_id}', [TicketsController::class, 'show']);

    Route::post('comment', [CommentsController::class, 'postComment']);
    // Route::resource('posts', PostController::class)->only(['update', 'store', 'destroy']);


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('tickets', [TicketsController::class, 'index']);

    Route::put('close_ticket/{ticket_id}', [TicketsController::class, 'close']);
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



