<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    function handleMiddleware(Request $request) {}

    function index()
    {
        $user = User::all();
        $user_profile = UserProfile::all();
        return view("user.index", ["users" => $user, "userProfile" => $user_profile]);
    }

    function delete(string $id)
    {
        $data  = User::find($id);

        $data->deleted_at = now();

        $save = $data->save();

        return response()->json([
            "success" => $save,
            "message" => $save ? "The data has been deleted" : "failed to delete data",
        ]);
    }
    public function show(string $id): View
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    function create(Request $request)
    {
        $request->validate([
            "name" => ["required"],
            "email" => ["required"],
            "user_id" => ["required"],
        ]);
    }

    function list()
    {

        $userData = DB::table("users")->whereNull("deleted_at")->get();

        return $userData;
    }
}
