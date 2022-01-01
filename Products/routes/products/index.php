<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/**
 * Products Routes Group:
 *  - IndexController
 *      https://xxx.test/products/
 */

Route::group(
    [
        'namespace' => 'Products',
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
    }
);
