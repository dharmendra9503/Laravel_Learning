<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs', function () {
    return view('jobs', [
        "jobs" => [
            [
                "id" => 1,
                "title" => "Director",
                "salary" => "$50,0000"
            ],
            [
                "id" => 2,
                "title" => "Programmer",
                "salary" => "$10,000"
            ],
            [
                "id" => 3,
                "title" => "Teacher",
                "salary" => "$40,000"
            ]
        ]
    ]);
});

ROute::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            "id" => 1,
            "title" => "Director",
            "salary" => "$50,0000"
        ],
        [
            "id" => 2,
            "title" => "Programmer",
            "salary" => "$10,000"
        ],
        [
            "id" => 3,
            "title" => "Teacher",
            "salary" => "$40,000"
        ]
    ];

    /*
     * In above method we don't have access of external variable so to use that external variable we need to use "use" keyword
     */
    // $job = Arr::first($jobs, function ($job) use ($id) {
    //     return $job['id'] == $id;
    // });

    $job = Arr::first($jobs, fn ($job) => $job['id'] == $id);

    return view('job', ['job' => $job]);
});
