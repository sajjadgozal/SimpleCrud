<?php

use sajjadgozal\SimpleCrud\Http\Controllers\Api\ItemController;
use sajjadgozal\SimpleCrud\Http\Middleware\ExtractItem;
use sajjadgozal\SimpleCrud\Http\Middleware\ExtractModel;

Route::group(
    ['middleware' => [ExtractModel::class , ExtractItem::class ] ],function () {

    $prefix = '/'.config('simple_crud.api_route_prefix');

    Route::get($prefix.'/{item_name}',[ItemController::class,'index'])->name('api.crudIndex');
    Route::post($prefix.'/{item_name}',[ItemController::class,'store'])->name('api.crudStore');
    Route::get($prefix.'/{item_name}/{id}',[ItemController::class,'show'])->name('api.crudShow');
    Route::patch($prefix.'/{item_name}/{id}',[ItemController::class,'update'])->name('api.crudUpdate');
    Route::delete($prefix.'/{item_name}/{id}',[ItemController::class,'destroy'])->name('api.crudDelete');

});
