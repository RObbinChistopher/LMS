<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseMaterialsResource extends JsonResource
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
            'course_id' => $this->course_id ?? "",
            'course_modular' => $this->course_modular ?? "",
            'textbook_link' => $this->textbook_link ?? "",
            'online_resource' => $this->online_resource ?? "",
            'lecture_notes' => $this->lecture_notes ?? "",
            'Assignments' => $this->Assignments ?? "",
            'Course' => $this->Course ? $this->Course->course_title : null,
            'CourseModular' => $this->CourseModular ? $this->CourseModular->name : null,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : "",
        ];
    }
}
