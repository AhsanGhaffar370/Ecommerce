<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'parent_id',
        'status',
    ];

    // Each category may have one parent
    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Each category may have multiple children
    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function productCategory() {
        return $this->hasMany(ProductCategory::class, 'category_id');
    }
}
