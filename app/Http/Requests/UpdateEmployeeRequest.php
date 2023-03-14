<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required|unique:employees,phone,'.$this->employee,
            'salary' => 'required',
            'position_id' => 'required',
            'email' => 'required|email|unique:employees,email,'.$this->employee,
            'head' => 'required',
            'date_of_employment' => 'required'
        ];
    }
}
