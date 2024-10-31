<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function categoryPost()
    {
        # To count how many posts doed the category have
        # See admin/categories/index table.
        return $this->hasMany(CategoryPost::class);

    }
}
