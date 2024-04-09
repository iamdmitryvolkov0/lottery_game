<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api'], function () {
    Route::post('/users/register', [
        'middleware' => 'guest',
        'uses' => 'UserController@register'
    ]);
    Route::put('/users/{id}', [
        'middleware' => 'owner',
        'uses' => 'UserController@update'
    ]);
    Route::delete('/users/{id}', [
        'middleware' => 'owner',
        'uses' => 'UserController@delete'
    ]);
    Route::get('/users', [
        'middleware' => 'admin',
        'uses' => 'UserController@getAllUsers'
    ]);

    Route::get('/lottery_games', [
        'uses' => 'LotteryGameController@getAllGames'
    ]);
    Route::post('/lottery_game_matches', [
        'middleware' => 'admin',
        'uses' => 'LotteryGameController@createMatch'
    ]);
    Route::put('/lottery_game_matches/{id}', [
        'middleware' => 'admin',
        'uses' => 'LotteryGameController@finishMatch'
    ]);
    Route::post('/lottery_game_match_users', [
        'middleware' => 'owner',
        'uses' => 'LotteryGameController@createMatchUser'
    ]);
    Route::get('/lottery_game_matches/{game_id}', [
        'uses' => 'LotteryGameController@getMatchesByGameId'
    ]);

    Route::group([
        'prefix' => 'auth'
    ], function () {
        Route::post('/login', [
            'middleware' => 'guest',
            'uses' => 'AuthController@login'
        ]);
        Route::post('/logout', 'AuthController@logout');
        Route::post('/refresh', 'AuthController@refresh');
        Route::get('/me', 'AuthController@me');
    });
});
