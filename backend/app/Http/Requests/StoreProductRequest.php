<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PDO;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required",
            "desc" => "required",
            "qty" => "required",
            "price" => "required",
            "category" => "required"
        ];
    }


    function message(): array
    {
        return [
            "name.required" => "Please insert the name of fucking product!",
            "desc.required" => "Please insert the product's description!",
            "qty.required" => "Please insert the qty",
            "price.required" => "please insert the price of product!"
        ];
    }
}
