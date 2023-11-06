<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFilterRequest extends FormRequest
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
            'search' => [
                'sometimes',
                'string',
                'max:255'
            ],
            'company_id' => [
                'sometimes',
                'integer',
                'exists:companies,id'
            ],
            'sort_by' => [
                'sometimes',
                'string',
                'in:first_name,last_name,email,company',
            ],
            'order' => [
                'sometimes',
                'string',
                'in:asc,desc',
            ],

        ];
    }
}
