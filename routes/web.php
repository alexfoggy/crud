<?php

use Illuminate\Support\Facades\Route;

//Create and Update category 
Route::post('/categoryCreate', 'CategoryController@create');

//Delete category
Route::post('/categoryDelete/{alias?}', 'CategoryController@destroy');  

//Edit category page
Route::get('/categoryEdit/{alias?}', 'CategoryController@edit');

//Main page and in this Test Create category form page
Route::get('/', 'CategoryController@index');