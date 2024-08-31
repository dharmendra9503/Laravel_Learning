<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });
Route::view('', 'home');

// Route::get('/about', function () {
//     return view('about');
// });
Route::view('/about', 'about');

// Route::get('/contact', function () {
//     return view('contact');
// });
Route::view('/contact', 'contact');

//Index
// Route::get('/jobs', function () {
//     // $jobs = Job::with('employer')->paginate(4);
//     // $jobs = Job::with('employer')->simplePaginate(4);
//     $jobs = Job::with('employer')->latest()->cursorPaginate(4);
//     return view('jobs.index', [
//         "jobs" => $jobs
//     ]);
// });

Route::get('/jobs', [JobController::class, 'index']);

//Create
// Route::get('/jobs/create', function () {
//     return view("jobs.create");
// });

Route::get('/jobs/create', [JobController::class, 'create']);

//Show
// Route::get('/jobs/{job}', function (Job $job) {
//     /*
//      * In above method we don't have access of external variable so to use that external variable we need to use "use" keyword
//      */
//     // $job = Arr::first(Job::all(), function ($job) use ($id) {
//     //     return $job['id'] == $id;
//     // });

//     // $job = Job::find($id);

//     return view('jobs.show', ['job' => $job]);
// });

Route::get('/jobs/{job}', [JobController::class, 'show']);

//Edit
// Route::get('/jobs/{job}/edit', function (Job $job) {
//     // $job = Job::find($id);

//     return view('jobs.edit', ['job' => $job]);
// });

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit-job', 'job');

//Update
// Route::patch('/jobs/{job}', function (Job $job) {
//     // Validate
//     request()->validate([
//         'title' => ['required', 'min:3'],
//         'salary' => ['required'],
//     ]);

//     // Authorize (On hold...)

//     // Update the job
//     // $job = Job::findOrFail($id);
//     $job->title = request('title');
//     $job->salary = request('salary');
//     $job->save();

//     //Also can use this.
//     // $job->update([
//     //     'title'=> request('title'),
//     //     'salary'=> request('salary'),
//     // ]);

//     // Redirect to the job page
//     return redirect('/jobs/' . $job->id);
// });

Route::patch('/jobs/{job}', [JobController::class, 'update']);

//Destroy
// Route::delete('/jobs/{job}', function (Job $job) {
//     // Authorize (On hold...)

//     // Delete job
//     // $job = Job::findOrFail($id);
//     $job->delete();

//     // Redirect
//     return redirect('/jobs');
// });

Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

//Store
// Route::post('/jobs', function () {
//     request()->validate([
//         'title' => ['required', 'min:3'],
//         'salary' => ['required'],
//     ]);

//     request()->all();    //To get all request data.

//     Job::create([
//         "title" => request("title"),
//         "salary" => request("salary"),
//         "employer_id" => 1
//     ]);

//     return redirect("/jobs");
// });

Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');

/**
 * Route Group
 */
// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
//     Route::post('/jobs', 'store');
// });


/**
 * Route Resources
 * 
 * This line of code registers a resource route for the 'jobs' endpoint.
 * It maps various HTTP requests (GET, POST, PUT, DELETE) to the corresponding methods
 * in the JobController class, enabling RESTful CRUD operations for the 'jobs' resource.
 */
// Route::resource('jobs', JobController::class);


//Auth
Route::get('register', [RegisteredUserController::class, 'create']);
Route::post('register', [RegisteredUserController::class, 'store']);
Route::get('login', [SessionController::class, 'create']);
Route::post('login', [SessionController::class, 'store']);
Route::post('logout', [SessionController::class, 'destroy']);
