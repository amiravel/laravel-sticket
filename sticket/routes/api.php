<?php

use Illuminate\Support\Facades\Route;
use Sticket\Src\Http\Controllers\CategoriesController;
use Sticket\Src\Enums\TicketStatus;
use Sticket\Src\Enums\TicketPriority;
use Sticket\Src\Http\Controllers\TicketsController;

Route::group(['prefix' => 'categories'], function(){
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
    Route::post('/store', [CategoriesController::class, 'store'])->name('categories.store');
    Route::patch('/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
});

Route::get('/tickets', [TicketsController::class, 'index']);
Route::get('/tickets/{id}', [TicketsController::class, 'show']);

Route::get('/status', function (){
   return response()->json(TicketStatus::cases());
});

Route::get('/priorities', function (){
    return response()->json(TicketPriority::cases());
 });
