<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function categories()
    {
        $categories = Category::all();

        return view('admin.categories', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create($data);
        toast('Category Saved!','success');
        return to_route('admin.categories');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        return back();
    }

    public function editCategory(Category $category)
    {

    }
}
