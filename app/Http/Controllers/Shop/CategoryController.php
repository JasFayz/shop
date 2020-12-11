<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\ShopCategory;
use App\Models\ShopProduct;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //


    public function show($slug)
    {
        $categories = $this->categories;

        $category = ShopCategory::where('slug', $slug)->first();

        $ids = ShopCategory::getCategoriesById($category->id);
        $products = ShopProduct::whereIn('category_id', $ids)->paginate(20);




        return view('shop.category.show', compact('categories', 'products'));
    }
}
