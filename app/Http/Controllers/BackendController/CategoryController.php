<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller

   {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoris = Category::all();
        return view('backend.admin.categories.index', ['categoris'=>$categoris]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug =Str::slug($request->name);
        $category->description = $request->description;
        $category->status = $request->status;

        $category->save();
        return redirect()->route('admin.categories.index')->with('success', 'Category Create SuccessFully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.admin.categories.edit', ['category'=>$category] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->slug =Str::slug($request->name);
        $category->description = $request->description;
        $category->status = $request->status;

        $category->update();
        return redirect()->route('admin.categories.index')->with('success', 'Category Update SuccessFully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success','Category Deleted');
    }
}

