<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function categories()
    {
        $categories = Category::query();

        if ($keyword = request('search')) {
            $categories->where('name', 'LIKE', "%{$keyword}%");
        }

        $categories = $categories->paginate(20);

        return view('admin.category.categories', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255|unique:categories,name',
        ]);

        // save data
        Category::create($data);

        alert('', 'Category Saved!','success');
        return back();
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        alert('', 'Category Deleted!', 'success');
        return back();
    }

    public function editCategory(Category $category)
    {
        return view('admin.category.editCategory', compact('category'));
    }

    public function updateCategory(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|max:255|unique:categories,name',
        ]);

        // update data
        $category->update($data);

        alert('', 'Category Updated!', 'success');
        return back();
    }
}
