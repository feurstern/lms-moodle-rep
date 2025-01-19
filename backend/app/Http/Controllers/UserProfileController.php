<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserProfileRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // user query builder
        // return DB::table('user_profiles')->whereNull("deleted_at")->get();
        $userProfile = UserProfile::Country()->get();
        return $userProfile;
    }


    function selectedCountry()
    {
        // return UserProfile::whereIn("country", ["Japan", "USA"])->get();
        return UserProfile:: whereBetween("user_id", ["5","8"])->whereNull("deleted_at")->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userProfile = new UserProfile();
        $userProfile->user_id = "9";
        $userProfile->country = "Japan";
        $userProfile->province = "Saito-kun";
        $userProfile->city = "Ohime";
        $userProfile->address = "6 Neva Lakes\nOndrickaberg, OK 82943";
        $userProfile->postal_code = "82943";

        $save = $userProfile->save();

        return $save ? "Data has been inserted ssuccesfully" : "error during inserting the data";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return UserProfile::find($id)->whereNull("deleted_at")->first();
        // or we can use just get the data 

        return UserProfile::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = UserProfile::find($id);

        $data->country = "Japan";
        $data->province = "Nagaski";
        $data->city = "Tokyo";
        $data->updated_at = now();
        $save = $data->save();

        return $save ? "Edited succesfully" : "faield to edit the data";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserProfileRequest $request, UserProfile $userProfile)
    {
        //
    }

    function delete(string $id)
    {
        $data = UserProfile::find($id);

        $data->deleted_at = now();

        $save = $data->save();

        return $save ? "the data has beeen deleted" : "error during deleting teh data!";
        // you can perfromr dellet method
        $data->delete();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
