<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::prefix('item')->group(
            function () {

                $idPattern = '[1-9][0-9]{0,9}';

                Route::get('/list', 'ItemController@index');

                Route::get('/create/{todo}', 'ItemController@create')
                    ->where('todo', $idPattern)
                    ->name('item.create');
                
                Route::post('/store', 'ItemController@store')
                    ->name('item.store');

                Route::get('/view/{item}', 'ItemController@show')
                    ->where('item', $idPattern)
                    ->name('item.view');

                Route::get('/edit/{item}', 'ItemController@edit')
                    ->where('item', $idPattern)
                    ->name('item.edit');

                Route::put('/update/{item}', 'ItemController@update')
                    ->where('item', $idPattern)
                    ->name('item.update');

                Route::delete('/delete/{item}', 'ItemController@destroy')
                    ->where('item', $idPattern)
                    ->name('item.delete');

                Route::get('/status/{item}', 'ItemController@status')
                    ->where('item', $idPattern)
                    ->name('item.status');
            }
        );
    }
);