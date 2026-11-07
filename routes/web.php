<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'portfolio.home')->name('home');

Route::get('/projects/{project}', function (string $project) {
    $projects = collect(config('portfolio.projects'))->keyBy('slug');

    abort_unless($projects->has($project), 404);

    return view('portfolio.project', [
        'project' => $projects->get($project),
    ]);
})->name('project.show');

Route::view('/dashboard', 'portfolio.dashboard')->name('dashboard');
