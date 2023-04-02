<?php

namespace App\Http\Requests\Admin\Office;

use Illuminate\Foundation\Http\FormRequest;

class AddOfficeRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:offices,name', 'min:4'],
            'address' => 'required|string',
            'department_id' => 'required|numeric|exists:departments,id',
            // 'faculty_id' => 'required|numeric|exists:faculties,id'
        ];
    }
}
