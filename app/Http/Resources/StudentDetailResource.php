<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="StudentDetailResource",
 *     description="Student Detailed Resource",
 *
 *     @OA\Xml(
 *         name="StudentDetailResource"
 *     )
 * )
 */
class StudentDetailResource extends JsonResource
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
            'status' => $this->status,
            'is_banned' => $this->is_banned == 1 ? 'true' : 'false',
            'RegisteredOn' => Carbon::parse($this->created_at)->format('d M Y'),
        ];
    }
}
