<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Arr;

class Job extends Model
{
    use HasFactory;
    //This will point to table in database, If you don't want to define this then need to create class with table name.
    protected $table = "job_listing";

    //If this is not defined and someone want to create or update mass data then gives exception : "Illuminate\Database\Eloquent\MassAssignmentException"
    protected $fillable = ["title", "salary"];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    //Now I am extending Model Eloquent which is ORM. So not need to define method.
    // public static function all(): array
    // {
    //     return [
    //         [
    //             "id" => 1,
    //             "title" => "Director",
    //             "salary" => "$50,0000"
    //         ],
    //         [
    //             "id" => 2,
    //             "title" => "Programmer",
    //             "salary" => "$10,000"
    //         ],
    //         [
    //             "id" => 3,
    //             "title" => "Teacher",
    //             "salary" => "$40,000"
    //         ]
    //     ];
    // }

    // public static function find(int $id): array
    // {
    //     $job = Arr::first(static::all(), fn ($job) => $job['id'] == $id);

    //     if (!$job) {
    //         abort(404);
    //     }
    //     return $job;
    // }
}
