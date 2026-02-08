<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'gender' => $this->gender,
            'job' => $this->job,
            'for_program' => $this->for_program,

            'dob' => $this->dob?->format('Y-m-d'),
            'user_date' => $this->user_date?->format('Y-m-d'),
            'user_time' => $this->user_time?->format('Y-m-d H:i:s'),

            'created_by' => $this->creator ? [
                'id' => $this->creator->id,
                'name' => $this->creator->name,
            ] : null,

            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}
