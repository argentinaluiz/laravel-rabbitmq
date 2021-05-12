<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    \Amqp::publish(
        '', 
        json_encode(['key' => 'value']), ['queue' => 'test']
    );
    // \Amqp::publish(
    //     'product.created', 
    //     json_encode(['key' => 'product-direct']), 
    //     ['exchange' => 'amq.direct', 'exchange_type' => 'direct']
    // );
    // \Amqp::publish(
    //     'product.created', 
    //     json_encode(['key' => 'product-routing']), 
    //     ['exchange' => 'amq.topic']
    // );
    return view('welcome');
});
