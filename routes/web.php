<?php

Route::get('/painel/produtos/tests', 'Painel\ProdutoController@tests');
Route::resource('/painel/produtos', 'Painel\ProdutoController');

//Middleware para todas as rodas
//Route::group(['middleware' => 'auth'], function(){
Route::group(['namespace' => 'Site'], function(){
    Route::get('/categoria/{id}', 'SiteController@categoria');
    Route::get('/categoria2/{id?}', 'SiteController@categoriaOp');

    Route::get('/contato', 'SiteController@contato');
    Route::get('/', 'SiteController@index');
});