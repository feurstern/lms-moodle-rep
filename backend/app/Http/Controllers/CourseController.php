<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{

    function index($title)
    {

        $course = [
            (object)[
                "course" => "Programming with C++",
                "fee" => 40
            ],
            (object)[
                "course" => "Game Dev",
                "fee" => 60
            ],
            (object)[
                "course" => "Machine Learning Developer",
                "fee" => 65
            ]
        ];

        $description = "This is where the description will appear.";
        return view('course.index', [
            'course' => $course,
            "title" => $title,
            "desc" => $description

        ]);
    }


    function courseDetail($id)
    {
        return Course::whereNull("deleted_at")->get();
    }


    function contact()
    {
        return view("contact.index");
    }

    function create(Request $request) {
        
    }


    function edit(string $id)
    {
        $edit = DB::table('courses')->where('id', $id)->update([
            "course_name" => "Go with GIn for backend service"
        ]);

        return $edit;
    }


    function maxPrice()
    {
        return Course::whereNull('deleted_at')->max("price")->get();
    }


    function count()
    {
        return DB::table('courses')->whereNull("deleted_at")->count();
    }

    function getData()
    {
        // for alll record -> use get()
        $data = DB::table("courses")->where("category", "!=", "IT")->whereNull("deleted_at")->get();
        //  to get thee first data -> use first()

        $firstData = DB::table("courses")->where("category", "IT",)->whereNull("deleted_at");
        //  echo json_decode(count($data));

        // get certain of collumns

        $allData = Course::whereNull("deleted_at")->get();
        $getCourseName = DB::table('courses')->select('course_name')->whereNull("deleted_at")->get();
        // or you can use pluck method
        $getDescCourse = DB::table("courses")->pluck("description");
        return $allData;
    }

    function delete(string $id)
    {

        $data = DB::table("courses")->where("id", $id)->update([
            "deleted_at" => now(),
        ]);
    }
}
