<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as HandleFile;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data  = File::all();

        // dd($data);
        return view("file.index", [
            "files" => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    function download(string $id)
    {
        return Storage::disk('dir_public')->download($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileRequest $request)
    {

        // privatee
        // $file = Storage::disk("local")->put('/', $request->file_upload);
        // anothe way to upload file


        // $file = $request->file('file_upload')->store('/', 'dir_public'); //-> save to local-> change 'local' to 'public    
        $file = $request->file('file_upload');

        $customName = "USR-" . random_int(1, 10000);
        $ext = $file->getClientOriginalExtension();
        $fileName = $customName . '.' . $ext;
        $path = $file->storeAs('/', $fileName, "dir_public");

        $filePath = new File();
        $filePath->file_path = "/uploads/" . $path;

        $save = $filePath->save();
        return response()->json([
            "success" => $save,
            "message" => $save ? "The data has been submitted succesfully!" : "Failed to submit the data"
        ]);

        // it will return to the previous
        return redirect()->back();

        /// 
        // return redirect(rp)

        // dd($file);
    }


    // upload directly without changing the naame.
    function upload(StoreFileRequest $request)
    {
        $file = $request->file("file_upload")->store('/', 'public');
    
        $filePath  = new file();

        $filePath->file_path = $file;

        $save = $filePath->save();

        return response()->json([
            "succees" => $save,
            "message" => $save ? "The data has been submitted sucessfully"  : 'error during inserting the data'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        return File::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data =  File::find($id);

        if ($data == null) {
            return response()->json(["messsage" => "Data with id:" . $id . " is not found!"]);
        }

        // conduct deleting the file
        HandleFile::delete(public_path($data->file_path));

        // peform soft delete to the path on database
        $data->deleted_at = now();

        $save = $data->save();

        return response()->json([
            "success" => $save,
            "messagee" => $save ? "The dataa has been deleted succesfully!"  : "failed to delete the data"
        ]);
    }
}
