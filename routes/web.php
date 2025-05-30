<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard',['title'=>'Dashboard']);
});

Route::get('/books', function () {
    return view('books',['title'=>'Books']);
});

Route::get('/transactions', function () {
    return view('transactions',['title'=>'Transactions']);
});

Route::get('/community', function () {
    return view('community',['title'=>'Community']);
});

Route::get('/leaderboard', function () {
    return view('leaderboard',['title'=>'Event']);
});