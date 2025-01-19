<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customer::whereNull("deleted_at")->get();
        return view("customer.customer-index", [
            "customers" => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createForm()
    {
        return view("customer.customer-create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $data = $request->all();

        $file = $request->file("image_path")->store("/", "public");
        $customer = new Customer();
        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->phone = $data['phone'];
        $customer->email = $data['email'];
        $customer->bank_account_number = $data['bank_account_number'];
        $file != null ? $customer->image_path = $data['image_path'] : 0;
        $customer->birth_date = $data['birth_date'] != null ? $data['birth_date']  : now();

        $save = $customer->save();

        return $save ? redirect(route("customer.index")) : redirect(route("customer.create"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data =  Customer::find($id);

        if ($data == null) {
            return response()->json([
                "success" => false,
                "message" => "Data with id: " . $id . " not found!"
            ]);
        }

        return view("customer.customer-detail", [
            "data" => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $data = Customer::find($id);

        return view("customer.customer-edit", ["data" => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {

        $new_data = $request->all();
        $file = $request->file("image_path")->store('/', "public");
        
        $data = Customer::find($id);

        
        if ($data == null) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "The data not found!"
                ]
            );
        }

        $data->first_name = $new_data["first_name"];
        $data->last_name = $new_data["last_name"];
        $data->phone = $new_data["phone"];
        $data->email = $new_data["email"];
        $data->bank_account_number = $new_data["bank_account_number"];
        $data->image_path = $new_data["image_path"] != null ? $new_data["image_path"]  : 0;

        $save = $data->save();

        return $save ? redirect(route("customer.index")) : redirect(route("customer.edit"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data =  Customer::find($id);
        if ($data == null) {
            return response()->json([
                "messagee" => "Data of the " . $id . " is not found!"
            ]);
        }


        $data->deleted_at = now();

        $save = $data->save();

        return $save ? redirect(route("customer.index"))  : response()->json(
            [
                "success" => false,
                "message" => "Failed to delet the selected data"
            ]
        );
    }
}
