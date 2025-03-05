<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CousreBillingResource extends JsonResource
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
            'user_id' => $this->user_id ?? "",
            'course_id' => $this->course_id ?? "",
            'course_price' => $this->course_price ?? "",
            'course_discount_price' => $this->course_discount_price ?? "",
            'course_subscription_model' => $this->course_subscription_model ?? "",
            'course_access' => $this->course_access ?? "",
            'course' => $this->course ? $this->course->course_title : null,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : "",
        ];
    }
}
