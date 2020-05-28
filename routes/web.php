<?php

//----- SITE -----//
Route::get('/', 'HomeController@index')->name('home');
Route::get('/sobre', 'SobreController@index')->name('sobre');
Route::get('/local', 'LocalController@index')->name('local');
Route::get('/vitrine', 'VitrineController@index')->name('vitrine');

//----- SISTEMA -----//
Auth::routes();
Route::get('/sistema', 'Sistema\SistemaController@index')->name('sistema');
Route::get('/sistema/produto', 'Sistema\ProdutoController@index')->name('produto');
Route::post('/sistema/produto', 'Sistema\ProdutoController@store');
Route::get('/sistema/banner', 'Sistema\BannerController@index')->name('banner');
Route::get('/sistema/produto/editar/{id}', 'Sistema\ProdutoController@edit')->name('editar_produto');
Route::post('/sistema/produto/remover/{id}', 'Sistema\ProdutoController@remove')->name('remover_produto');
Route::get('/sistema/produto/validar/{campo}&{valor}', 'Sistema\ProdutoController@validacao')->name('validacao');