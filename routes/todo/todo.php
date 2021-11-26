<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::prefix('todo')->group(
            function () {

                Route::get('/list', 'TodoController@index');

                Route::get('/create', 'TodoController@create')
                    ->name('todo.create');
                
                Route::post('/store', 'TodoController@store')
                    ->name('todo.store');
            }
        );
    }
);

Route::prefix('todo')->group(
    function () {
        
        $idPattern = '[1-9][0-9]{0,9}';

        Route::get('/view/{todo}', 'TodoController@show')
            ->where('todo', $idPattern)
            ->name('todo.view');
    }
);