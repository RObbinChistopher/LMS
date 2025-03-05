<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'catId');
    }
    public function Subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subCatId');
    }
    public function Childcategory()
    {
        return $this->belongsTo(ChildCategory::class, 'childCatId');
    }
}
