<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;

class CategoryController extends Controller
{
    public function create(){
        return view('category.create-category');
    }

    public function store(Request $request) {
        $request->validate(
            [
                
                'name'=> 'required'
                
            ]);
        $user_id = Auth::user()->id;
        $name = $request->input('name');

        $category = new Category();

       $category->user_id = $user_id;
       $category->name = $name;

       $category->save();
       return redirect()->back()->with('status', '👍Category Created Successfully');
    }

    public function show(){
        $user_id = Auth::user()->id;
        $categories = Category::where('user_id', $user_id)->get();
        return view('category.show-category', compact('categories'));
    }
    public function edit(Category $category){

        return view('category.edit-category', compact('category'));

      
    }

    public function update(Request $request, Category $category){
        $request->validate(
            ['name'=>'required']
        );
        $name = $request->input('name');
        $category->name = $name;

        $category->save();
        return redirect()->back()->with('status', '👍Post Updated Successfully');
        
    }

    public function destroy(Category $category){
       
        $category->delete();
        return redirect()->back()->with('status', '👍Post Deleted Successfully');
    }

}
