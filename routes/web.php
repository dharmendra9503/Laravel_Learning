<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

// $jobs = [
//     [
//         "id" => 1,
//         "title" => "Director",
//         "salary" => "$50,0000"
//     ],
//     [
//         "id" => 2,
//         "title" => "Programmer",
//         "salary" => "$10,000"
//     ],
//     [
//         "id" => 3,
//         "title" => "Teacher",
//         "salary" => "$40,000"
//     ]
// ];

// class Job {
//     public static function all() {
//         return [
//             [
//                 "id" => 1,
//                 "title" => "Director",
//                 "salary" => "$50,0000"
//             ],
//             [
//                 "id" => 2,
//                 "title" => "Programmer",
//                 "salary" => "$10,000"
//             ],
//             [
//                 "id" => 3,
//                 "title" => "Teacher",
//                 "salary" => "$40,000"
//             ]
//         ];
//     }
// }

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
    $jobs = Job::with('employer')->get();
    return view('jobs', [
        "jobs" => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    /*
     * In above method we don't have access of external variable so to use that external variable we need to use "use" keyword
     */
    // $job = Arr::first(Job::all(), function ($job) use ($id) {
    //     return $job['id'] == $id;
    // });

    $job = Job::find($id);

    return view('job', ['job' => $job]);
});
