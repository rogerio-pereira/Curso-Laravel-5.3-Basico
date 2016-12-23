<?php

//Rotas do tipo "/painel/*"
Route::group(['prefix' => '/painel', 'middleware' => 'auth'], function()
{
    Route::get('/users', function()
    {
        return 'Controle de Users';
    });

    Route::get('/financeiro', function()
    {
        return 'Financeiro do Painel';
    });

    Route::get('/', function()
    {
        return 'Dashboard';
    });
});

Route::get('/login', function(){
    return '#form login';
});

Route::get('/categoria2/{$idCat?}', function($idCat=null){
    return "Posts da categoria {$idCat}";
});

Route::get('/categoria/{$idCat}', function($idCat){
    return "Posts da categoria {$idCat}";
});

Route::get('/nome/nome2/nome7', function(){
    return 'Rota grande';
})->name('rota.nomeada');

Route::any('/any', function () {
    return 'Route any';
});

Route::match(['get', 'post'], '/match', function () {
    return 'Route match';
});

Route::post('/post', function () {
    return 'Route Post';
});

Route::get('/contato', function () {
    return 'Contato';
});

Route::any('/empresa', function () {
    return view('empresa');
});

Route::get('/', function () {
    return redirect()->route('rota.nomeada');
});

/*Route::get('/', function () {
    return view('welcome');
});*/
