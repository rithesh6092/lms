<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="InstructorDetailResource",
 *     title="Instructor Detail",
 *     description="Detailed information about an instructor",
 *     type="object",
 *     @OA\Property(
 *         property="id",
 *         description="Unique identifier for the instructor",
 *         type="integer",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         description="Instructor's full name",
 *         type="string",
 *         example="John Doe"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         description="Instructor's email address",
 *         type="string",
 *         format="email",
 *         example="johndoe@example.com"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         description="Instructor's phone number",
 *         type="string",
 *         example="79999999999"
 *     ),
 *     @OA\Property(
 *         property="city",
 *         description="Instructor's city",
 *         type="string",
 *         example="New York"
 *     ),
 *     @OA\Property(
 *         property="state",
 *         description="Instructor's state",
 *         type="string",
 *         example="NY"
 *     ),
 *     @OA\Property(
 *         property="country",
 *         description="Instructor's country",
 *         type="string",
 *         example="USA"
 *     ),
 *     @OA\Property(
 *         property="pincode",
 *         description="Instructor's postal code",
 *         type="string",
 *         example="10001"
 *     ),
 *     @OA\Property(
 *         property="status",
 *         description="Current status of the instructor",
 *         type="string",
 *         enum={"active", "inactive", "banned"},
 *         example="active"
 *     )
 * )
 */
class InstructorDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this?->name,
            'email' => $this->email,
            'phone' => $this?->phone,
            // 'profile_image' => $this->profile_image,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'pincode' => $this->pincode,
            'status' => $this->status,
            'experience' => $this->when($this->isInstructor(), $this->experience),
            'job_type' => $this->when($this->isInstructor(), $this->job_type),
            'organization_name' => $this->when($this->isInstructor(), $this->organization_name),
            'RegisteredOn' => Carbon::parse($this->created_at)->format('d M Y'),
        ];
    }
}
