<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/dd', function() {

    $data = [
        'satu' => 'data 1',
        'dua' => 'data 2',
        'tiga' => 'data 3',
    ];

    //$result = json_encode($data);
    $result = json_decode(json_encode($data), false);

    return $result->satu;
});
