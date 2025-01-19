<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    function index()
    {
        return DB::table("blogs")->whereNull("deleted_at")->get();
    }

    function detail(string $id)
    {
        return DB::table("blogs")->where("id", $id)->whereNull("deleted_at")->first();
    }

    function create(Request $request)
    {
        // dd($request->all());

        $request->validate([
            "creator_id" => "required",
            "title" => "required|max:220|min:5",
            "category" => "required|max:200|min:2",
            "content" =>  "required"
        ]);

        $data = $request->all();
        $blogs = new Blog();

        $blogs->creator_id  = $data['creator_id'];
        $blogs->title = $data['title'];
        $blogs->category = $data['category'];
        $blogs->content = $data['content'];

        $save = $blogs->save();

        return response()->json([
            'messsage' => $save ? "Data has been inserted" : "failed during inserting the data",
            "data" => $data
        ]);
    }
}
