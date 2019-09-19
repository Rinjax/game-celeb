<?php

Route::prefix('game/celeb')->group(function () {
    Route::view('start', 'celeb::game');
    Route::get('get-questions', '\Rinjax\GameCeleb\Http\Controllers\GameController@getQuestions');
    Route::get('answered/{id}', '\Rinjax\GameCeleb\Http\Controllers\GameController@setQuestionAnswered');
    Route::get('reset', '\Rinjax\GameCeleb\Http\Controllers\GameController@resetQuestions');


});