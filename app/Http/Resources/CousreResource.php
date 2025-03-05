<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CousreResource extends JsonResource
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
            'course_thumbnail_images' => $this->course_thumbnail_images ?? "",
            'course_title' => $this->course_title ?? "",
            'instructor_name' => $this->instructor_name ?? "",
            'catId' => $this->catId ?? "",
            'subCatId' => $this->subCatId ?? "",
            'childCatId' => $this->childCatId ?? "",
            'level' => $this->level ?? "",
            'course_language' => $this->course_language ?? "",
            'course_description' => $this->course_description ?? "",
            'user_f' => $this->user ? $this->user->first_name : null,
            'user_l' => $this->user ? $this->user->last_name : null,
            'category' => $this->category ? $this->category->name : null,
            'Subcategory' => $this->Subcategory ? $this->Subcategory->name : null,
            'Childcategory' => $this->Childcategory ? $this->Childcategory->name : null,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : "",
        ];
    }
}
