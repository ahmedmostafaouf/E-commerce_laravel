<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoryReq;
use App\Models\SubCategory;
use App\Models\Category;
use App\Traits\ImgTrait;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index($id)
    {
        $category = Category::findOrFail($id);
        $subCategories=$category->subCategories;
        return view('admin.subcategory.show',compact('subCategories','id'));
    }

    public function getAllSubCat(){
        $subCats=SubCategory::all();
        $cats=Category::select('id','name')->get();
        return view('admin.subcategory.all_subCat',get_defined_vars());
    }
    public function storeSubCat(SubCategoryReq $request){
       $subCat=SubCategory::create($request->all());
        !$request->hasFile("photo") ?: $subCat->addMediaFromRequest('photo')->toMediaCollection('photos');
         return redirect()->route('all.sub.category');
    }


    public function create($id)
    {
        return view('admin.subcategory.create',compact('id'));
    }


    public function store(SubCategoryReq $request,$id)
    {
        return $request;

        $subCategory = SubCategory::create($request->all());
        !$request->hasFile("photo") ?: $subCategory->addMediaFromRequest('photo')->toMediaCollection('photos');
        return redirect()->route('sub-category-show',[$id]);
    }




    public function edit($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        return view('admin.subcategory.edit',compact('subCategory'));
    }


    public function update(SubCategoryReq $request, $id)
    {
        $subCategory =SubCategory::findOrFail($id);
        if ($request->hasFile("photo")) {
            $subCategory->clearMediaCollection('photos');
            $subCategory->addMediaFromRequest('photo')->toMediaCollection('photos');
        }
        $subCategory ->update($request->all());
        return redirect()->route('all.sub.category');
    }


    public function destroy($id)
    {
        $subCategory =SubCategory::findOrFail($id);
        $subCategory->delete();
        return redirect()->back();
    }
}
