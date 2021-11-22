<?php

use sajjadgozal\SimpleCrud\Http\Controllers\ItemController;
use sajjadgozal\SimpleCrud\Http\Middleware\ExtractItem;
use sajjadgozal\SimpleCrud\Http\Middleware\ExtractModel;


Route::group(
    ['middleware' => ['web' ,ExtractModel::class , ExtractItem::class ] ],function () {

    $prefix = '/'.config('simple_crud.route_prefix');

    Route::get($prefix.'/{item_name}',[ItemController::class,'index'])->name('crudIndex');
    Route::get($prefix.'/{item_name}/create',[ItemController::class,'create'])->name('crudCreate');
    Route::post($prefix.'/{item_name}',[ItemController::class,'store'])->name('crudStore');
    Route::get($prefix.'/{item_name}/{id}',[ItemController::class,'show'])->name('crudShow');
    Route::get($prefix.'/{item_name}/{id}/edit',[ItemController::class,'edit'])->name('crudEdit');
    Route::patch($prefix.'/{item_name}/{id}',[ItemController::class,'update'])->name('crudUpdate');
    Route::delete($prefix.'/{item_name}/{id}',[ItemController::class,'destroy'])->name('crudDelete');

});

