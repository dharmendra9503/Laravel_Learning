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
    // $jobs = Job::with('employer')->paginate(4);
    // $jobs = Job::with('employer')->simplePaginate(4);
    $jobs = Job::with('employer')->latest()->cursorPaginate(4);
    return view('jobs.index', [
        "jobs" => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view("jobs.create");
});

Route::get('/jobs/{id}', function ($id) {
    /*
     * In above method we don't have access of external variable so to use that external variable we need to use "use" keyword
     */
    // $job = Arr::first(Job::all(), function ($job) use ($id) {
    //     return $job['id'] == $id;
    // });

    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

Route::patch('/jobs/{id}', function ($id) {
    // Validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    // Authorize (On hold...)

    // Update the job
    $job = Job::findOrFail($id);
    $job->title = request('title');
    $job->salary = request('salary');
    $job->save();

    //Also can use this.
    // $job->update([
    //     'title'=> request('title'),
    //     'salary'=> request('salary'),
    // ]);

    // Redirect to the job page
    return redirect('/jobs/' . $job->id);
});

Route::delete('/jobs/{id}', function ($id) {
    // Authorize (On hold...)

    // Delete job
    $job = Job::findOrFail($id);
    $job->delete();

    // Redirect
    return redirect('/jobs');
});

Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    request()->all();    //To get all request data.

    Job::create([
        "title" => request("title"),
        "salary" => request("salary"),
        "employer_id" => 1
    ]);

    return redirect("/jobs");
});
