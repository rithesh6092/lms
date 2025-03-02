<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="StudentResource",
 *     description="Student List Resource",
 *
 *     @OA\Xml(
 *         name="StudentResource"
 *     )
 * )
 */
class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    /**
     * @OA\Property(
     *     property="id",
     *     description="Unique identifier for the Student",
     *     type="integer",
     *     example=1
     * )
     * @OA\Property(
     *     property="name",
     *     description="name of the Student",
     *     type="string",
     *     example="John"
     * )
     * @OA\Property(
     *     property="email",
     *     description="email of the student",
     *     type="string",
     *     example="https://www.profileimage.com/image"
     * )
     * @OA\Property(
     *     property="phone",
     *     description="student mobile number",
     *     type="string",
     *     example=9876543210
     * )
     * @OA\Property(
     *     property="status",
     *     description="student status",
     *     type="string",
     *     example="active"
     * )
     * @OA\Property(
     *     property="is_banned",
     *     description="banned student or not",
     *     type="boolean",
     *     example=true
     * )
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this?->name,
            'email' => $this->email,
            'role' => $this->role,
            'phone' => $this?->phone,
            // 'profile_image' => $this->profile_image,
            'status' => $this->status,
            'is_banned' => $this->is_banned == 1 ? 'true' : 'false',
        ];
    }
}
