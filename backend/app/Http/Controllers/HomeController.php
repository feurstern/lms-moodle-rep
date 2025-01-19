<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index(){
        // DB::table('courses')->insert([
        //     "course_name" => "Programming Language",
        //     "description" => "Learn how to create the backend service",
        //     "category" => 'IO'
        // ]);
        return view('welcome'); 
    }
}
