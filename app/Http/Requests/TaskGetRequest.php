<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskGetRequest extends FormRequest
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
            'id_status' => 'nullable|integer',
            'date' => 'nullable|date_format:Y-m-d',
        ];
    }
}
