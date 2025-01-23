<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // $user = User::all();
        // $user_profile = UserProfile::all();
        $user= Auth::user();

        // dd($user);
        return view("user.dashboard", ["user" => $user]);
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
