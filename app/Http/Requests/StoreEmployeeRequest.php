<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'photo' => 'Allowed image types are jpeg,png,jpg',
            'photo.size' => 'Allowed image size 5mb and 300x300 pixels',
            'photo.dimensions' => 'Allowed image dimensions 300x300 pixels',
             ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // when true you can create and update posts
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'name' => ['required', 'min:2', 'max:256'],
//            'photo' => ['image','mimes:jpeg,png,jpg', 'dimensions:min_width=300,min_height=300'],
            'phone' => ['required', 'min:10', 'max:10',  Rule::unique('employees', 'phone')],
            'salary' => ['required', 'numeric'],
            'position_id' => 'required',
            'email' => ['required', 'email', Rule::unique('employees', 'email')],
            'head' => 'required',
            'date_of_employment' => 'required'
        ];
    }

}
