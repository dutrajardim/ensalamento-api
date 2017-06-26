<?php

use Illuminate\Http\Request;


Route::group(['prefix' => 'v1'], function () {

    Route::resource('salas', 'SalasController');
    Route::resource('disciplinas', 'DisciplinasController');

    Route::resource('turmas', 'TurmasController');
    Route::post('/turmas/{id}/disciplinas', 'TurmasController@storeDisciplina');
    Route::get('/turmas/{id}/disciplinas', 'TurmasController@disciplinas');
    Route::get('/disciplinasTurmas', 'TurmasController@disciplinasTurmas');

    Route::resource('horarios', 'HorariosController');
    Route::post('/horarios/{id}/ensalamentos', 'HorariosController@storeEnsalamento');
    Route::get('/horarios/{id}/ensalamentos', 'HorariosController@ensalamentos');

});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});