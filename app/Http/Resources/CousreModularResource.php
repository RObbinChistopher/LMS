<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CousreModularResource extends JsonResource
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
            'name' => $this->name,
            'courseId' => $this->courseId,
            'Course' => $this->Course ? $this->Course->course_title : null,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : "",
        ];
    }
}
