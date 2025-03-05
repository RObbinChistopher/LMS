<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChildCategoryResource extends JsonResource
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
            'name' => $this->name ?? "",
            'catId' => $this->catId ?? "",
            'subCatId' => $this->subCatId ?? "",
            'Category_name' => $this->category ? $this->category->name : null,
            'SubCategory_name' => $this->subCategory ? $this->subCategory->name : null,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y') : "",
        ];
    }
}
