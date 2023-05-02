<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $categories = Category::all();
        return view('items', compact('items', 'categories'));
    }

    public function subCategories(int $categoryId)
    {
        return SubCategory::whereCategoryId($categoryId)->get();
    }

    public function store(Request $request)
    {
        Item::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
        ]);
    }
}
