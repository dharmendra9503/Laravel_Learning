<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->cursorPaginate(4);
        return view('jobs.index', [
            "jobs" => $jobs
        ]);
    }

    public function create()
    {
        return view("jobs.create");
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
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
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        // Validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        // Authorize (On hold...)

        // Update the job
        // $job = Job::findOrFail($id);
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
    }

    public function destroy(Job $job)
    {
        // Authorize (On hold...)

        // Delete job
        // $job = Job::findOrFail($id);
        $job->delete();

        // Redirect
        return redirect('/jobs');
    }
}
