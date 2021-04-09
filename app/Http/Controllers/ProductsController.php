<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductReq;
use App\Models\Category;
use App\Models\Products;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Traits\ImgTrait;

class ProductsController extends Controller
{

    public function index($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $products = $subCategory->products;
        return view('admin.product.show',compact(['products','id']));
    }


    public function create($id)
    {
        return view('admin.product.create',compact('id'));
    }


    public function store(ProductReq $request,$id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $category_id = $subcategory->category['id'];
        $request_data=$request->except(['category_id','subCategory_id']);
        $request_data['category_id']=$category_id;
        $request_data['subCategory_id']=$subcategory;
        $product = Products::create($request_data);
        !$request->hasFile("photo") ?: $product->addMediaFromRequest('photo')->toMediaCollection('photos');

        return redirect()->route('product-show',[$id]);
    }


    public function show($id)
    {
        $product =Products::findOrFail($id);
        return view('admin.product.showDetail',compact('product'));
    }


    public function edit($id)
    {
        $product =Products::findOrFail($id);
        return view('admin.product.edit',compact('product'));
    }


    public function update(ProductReq $request, $id)
    {
        $product = Products::findOrFail($id);
       $subCatId=$product->subCategory_id;
        if ($request->hasFile("photo")) {
            $product->clearMediaCollection('photos');
            $product->addMediaFromRequest('photo')->toMediaCollection('photos');
        }
        $product ->update($request->all());
        return redirect()->route('product-show',[$subCatId]);
    }


    public function destroy($id)
    {
        $product =Products::findOrFail($id);
        $product->delete();
        return redirect()->back();
    }

    public function getAllProduct(){
        $cats=Category::select('id','name')->get();
        $subCats=SubCategory::select('id','name')->get();
        $products=Products::all();
        return view('admin.product.all_products',get_defined_vars());
    }
    public function storeProduct(ProductReq $request){
        if (!$request->has('status')) {
            $request->request->add(['status' => 0]);
        } else {
            $request->request->add(['status' => 1]);
        }
        if (!$request->has('hot_new')) {
            $request->request->add(['hot_new' => 0]);
        } else {
            $request->request->add(['hot_new' => 1]);
        }
        if (!$request->has('best_rated')) {
            $request->request->add(['best_rated' => 0]);
        } else {
            $request->request->add(['best_rated' => 1]);
        }
        if (!$request->has('trend_product')) {
            $request->request->add(['trend_product' => 0]);
        } else {
            $request->request->add(['trend_product' => 1]);
        }
        if (!$request->has('slider_discount')) {
            $request->request->add(['slider_discount' => 0]);
        } else {
            $request->request->add(['slider_discount' => 1]);
        }
        $product = Products::create($request->all());
        !$request->hasFile("photo") ?: $product->addMediaFromRequest('photo')->toMediaCollection('photos');
        return redirect()->route('all.product');

    }
}
