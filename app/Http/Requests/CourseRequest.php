<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * @OA\Schema(
 *     schema="ProductRequest",
 *     type="object",
 *     required={"name", "category_id", "status", "quantity", "price", "weight"},
 *     @OA\Property(property="title", type="string", example="Web Development", description="Unique product name"),
 *     @OA\Property(property="category_id", type="integer", example=1, description="Must exist in the categories table"),
 *     @OA\Property(property="status", type="integer", enum={0,1}, example=1, description="0 for inactive, 1 for active"),
 *     @OA\Property(property="is_approved", type="integer", enum={0,1}, example=50, description="0 for notapproved, 1 for approved"),
 *     @OA\Property(property="svp_points", type="integer", nullable=true, example=10, description="SVP points, optional"),
 *     @OA\Property(property="price", type="number", format="float", example=299.99, description="Product price"),
 *     @OA\Property(property="weight", type="string", example="500g", description="Product weight"),
 * )
 */
class CourseRequest extends FormRequest
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
            'title' => 'required|string',
            // 'category_id' => 'required|exists:course_categories,id',
            'thumbnail' => 'required',
            'status' => 'required|in:0,1',
            'is_approved' => 'required|in:0,1',
            'price' => 'required|numeric',
        ];
    }

    /**
     * Custom error messages for validation.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'course title is required.',
            // 'name.unique' => 'product name is already taken.',
            // 'category_id' => 'category is required',
            'thumbnail.required' => 'thumbnail is required',
            'status.required' => 'status is required.',
            'status.in' => 'status must be either active or inactive.',
            'is_approved.required' => 'is_approved field is required.',
            'is_approved.in' => 'is_approved must be either 1 or 0.',
            'price' => 'price field is required',
        ];
    }

    /**
     * Customize validation response structure.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation error',
            'status' => 422,
            'errors' => $validator->errors()
        ], 422));
    }
}
