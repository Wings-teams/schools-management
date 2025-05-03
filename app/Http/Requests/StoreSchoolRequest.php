<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
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
            'app_icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB Max
            'name' => 'required|string|max:50',
            'domain' => 'required|string|max:50|unique:schools,domain',
            'school_id' => 'required|string|max:20|unique:schools,school_id',
        ];
    }
}
