<?php
declare(strict_types=1);

use App\Http\Controllers\Products\CreateController;
use App\Http\Controllers\Products\DeleteController;
use App\Http\Controllers\Products\ForceDeleteController;
use App\Http\Controllers\Products\IndexController;
use App\Http\Controllers\Products\RestoreDeletedController;
use App\Http\Controllers\Products\ShowController;
use App\Http\Controllers\Products\TrashController;
use App\Http\Controllers\Products\UpdateController;
use Illuminate\Support\Facades\Route;

/**
 * Products Routes Group:
 *  - IndexController
 *      https://xxx.test/products/
 */

Route::group(
    [
        'prefix' => '/products',
        'as' => 'products:'
    ],
    function () {

        // get all
        Route::get('/', IndexController::class)->name('index');

        // create new
        Route::post('/', CreateController::class)->name('create');

        // show by id
        Route::get('/{id}', ShowController::class)->name('show');

        // update by id
        Route::put('/{id}', UpdateController::class)->name('update');

        // delete by id
        Route::delete('/{id}', DeleteController::class)->name('delete');

        // get trash
        Route::get('/trash/all', TrashController::class)->name('trash');

        // restore by id
        Route::patch('/restore/{id}', RestoreDeletedController::class)->name('restore');

        // delete permanently by id
        Route::delete('/permanently/{id}', ForceDeleteController::class)->name('delete_permanently');
    }
);
