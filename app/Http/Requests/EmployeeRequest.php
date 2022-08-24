<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'gender' => 'required',
            'phone' => 'numeric',
            'email' => 'email',
            'birthdate' => 'date',
            'religion' => 'required',
            'address' => 'required',
            'city' => 'required',
            'district' => 'required',
            'province' => 'required',
            'nationality' => 'required',
            'postal_code' => 'required|numeric',
        ];
    }
}
