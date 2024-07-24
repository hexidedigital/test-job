<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/test-jobs', function () {
    $service = new \App\Services\ParseService();
    $input = request()->get('secondsToWait') ?? '2,3,1,2';
    $seconds = explode(',', $input);
    $secondsToWait = [];
    foreach ($seconds as $second) {
        $secondsToWait[] = ['secondsToWait' => (int) $second];
    }
    if (empty($secondsToWait)) {
        dd('empty');
    }
    $batch = $service->parse($secondsToWait);

    dd("worked $batch", time(), $secondsToWait);
});
