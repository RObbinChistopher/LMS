<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CousreLessonResource extends JsonResource
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
            'course_modular_id' => $this->course_modular_id ?? "",
            'lesson_name' => $this->lesson_name ?? "",
            'lesson_type' => $this->lesson_type ?? "",
            'duration' => $this->duration ?? "",
            'resource' => $this->resource_field ?? "", // Change 'resource' to the actual field name
            'video_upload' => $this->video_upload ?? "",
            'course' => $this->course ? $this->course->course_title : null,
            'courseModular' => $this->courseModular ? $this->courseModular->name : null,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : "",
        ];
    }
}
