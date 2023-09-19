<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index-categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create-categories');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
       //validate
       $request->validate([
        'name'=>'required | unique:categories'
       ]);
       
       $name = $request->input('name');
       $categories = new Category();

       $categories->name = $name;
       
       $categories->save();
       return redirect()->back()->with('status', '👍' .$name.' Category Created Successfully');
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
       
        return view('categories.edit-categories', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        
       //validate
       $request->validate([
        'name'=>'required | unique:categories'
       ]);
       
       $name = $request->input('name');
       
       $category->name = $name;
       
       $category->save();
       return redirect(route('categories.index'))->with('status', '👍Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $name = $category->name; 
        $category->delete();
       return redirect()->back()->with('status', '👍' . $name . ' Category Deleted Successfully');

    }
}
