<?php
declare(strict_types=1);

use App\Http\Controllers\Categories\CreateController;
use App\Http\Controllers\Categories\DeleteController;
use App\Http\Controllers\Categories\ForceDeleteController;
use App\Http\Controllers\Categories\IndexController;
use App\Http\Controllers\Categories\RestoreDeletedController;
use App\Http\Controllers\Categories\ShowController;
use App\Http\Controllers\Categories\TrashController;
use App\Http\Controllers\Categories\UpdateController;
use Illuminate\Support\Facades\Route;

/**
 * Categories Routes Group:
 *  - IndexController
 *      https://xxx.test/categories/
 */

Route::group(
    [
        'prefix' => '/categories',
        'as' => 'categories:'
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
