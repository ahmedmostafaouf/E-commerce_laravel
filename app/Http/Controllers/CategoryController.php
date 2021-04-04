<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\ImgTrait;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryReq;

class CategoryController extends Controller
{
    use ImgTrait;

    public function index()
    {
        $categories =Category::all();
        return view('admin.category.show',compact('categories'));
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(CategoryReq $request)
    {
        $categories=Category::create($request->all());
        !$request->hasFile("photo") ?: $categories->addMediaFromRequest('photo')->toMediaCollection('photos');
        return redirect()->route('category-show');
    }



    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }



    public function update(CategoryReq $request, $id)
    {


        $category =Category::findOrFail($id);
        if ($request->hasFile("photo")) {
            $category->clearMediaCollection('photos');
            $category->addMediaFromRequest('photo')->toMediaCollection('photos');
        }
        $category->update($request->all());


        return redirect()->route('category-show');
    }


    public function destroy($id)
    {
        $category =Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category-show');
    }
}
