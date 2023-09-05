<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'category_id', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function searchProducts($searchTerm, $filterOption)
    {
        $query = Product::query();

        if($filterOption === '')
        if ($filterOption === 'name') {
            $query->where('name', 'LIKE', '%' . $searchTerm . '%');
        } elseif ($filterOption === 'category_id') {
            $query->where('category_id', 'LIKE', '%' . $searchTerm . '%');
        }

        $products = $query->get();
        return $products;
    }
}
