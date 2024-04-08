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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/users/register', 'UserController@register');
    $router->post('/users/login', 'UserController@login');
    $router->put('/users/{id}', 'UserController@update');
    $router->delete('/users/{id}', 'UserController@delete');
    $router->get('/users', 'UserController@getAllUsers');

    $router->get('/lottery_games', 'LotteryGameController@getAllGames');
    $router->post('/lottery_game_matches', 'LotteryGameController@createMatch');
    $router->put('/lottery_game_matches/{id}', 'LotteryGameController@updateMatch');
    $router->post('/lottery_game_match_users', 'LotteryGameController@createMatchUser');
    $router->get('/lottery_game_matches/{lottery_game_id}','LotteryGameController@getMatchesByLotteryId');
});
