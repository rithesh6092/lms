<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseCategoryStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            // 'icon' => ['required', 'image', 'max:255'],
            'status' => ['required', 'boolean'],
            'publish' => ['required', 'boolean'],
        ];
    }

    function messages(): array
    {
        return [
            'name.required' => __('The name field is required'),
            'name.string' => __('The name must be a string'),
            'name.max' => __('The name may not be greater than 255 characters.'),
            // 'icon.required' => __('The icon field is required'),
            // 'icon.image' => __('The icon must be an image'),
            // 'icon.max' => __('The icon may not be greater than 255 characters.'),
            'status.required' => __('The status field is required'),
            'status.boolean' => __('The status must be a boolean'),
            'publish.required' => __('The show_at_rending field is required'),
        ];
    }
}
