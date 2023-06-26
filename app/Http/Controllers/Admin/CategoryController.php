<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public function createCategory()
    {
        return view('admin.category.newCategory');
    }

    public function addCategory(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:100|unique:categories,name',
            'photo' => 'required|image',
        ]);

        // save data
        $category = Category::create($data);

        $file = $request->file('photo');
        $file->move(public_path('category_imgs'), $data['photo_name'] = $category->id . '.' . $file->getClientOriginalExtension());

        $category->photo_name = $data['photo_name'];
        $category->save();

        alert('', 'Category Saved!','success');
        return to_route('admin.categories');
    }

    public function deleteCategory(Category $category)
    {
        // delete profile photo if exists
        if (File::exists(public_path('category_imgs\\' . $category->photo_name))) {
            File::delete(public_path('category_imgs\\' . $category->photo_name));
        }

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
            'name' => 'required|max:100|unique:categories,name',
            'photo' => 'required|image',
        ]);

        $file = $request->file('photo');
        $file->move(public_path('category_imgs'), $data['photo_name'] = $category->id . '.' . $file->getClientOriginalExtension());

        // update data
        $category->update($data);

        alert('', 'Category Updated!', 'success');
        return to_route('admin.categories');
    }
}
