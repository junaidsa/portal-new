<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index(){
        return view('library.index');
    }
    public function createCategory(){
        return view('categories.create');
    }
    public function storyCategory(Request $request){
        $validated = $request->validate([
            'name' => 'required',
        ]);


        if ($validated) {
            # code...
        $category = new Categories();
        $category->name = $request->input('name');
        $category->status = $request->input('status');
        $category->user_id = Auth::id();
        $category->save();
        return redirect('categories')->with('success', 'Category Add  successfully.');
        }else{
            return redirect()->back()->withErrors($validated)->withInput();
        }
        

    }
    public function indexCategory(Request $request){
        $category = Categories::get();
        return view('categories.index',compact('category'));
    }
    public function deleteCategory($id){
        $category = Categories::find($id);
        if ($category) {
            $category->delete();
            return redirect()->back()->with('success', 'Category Deleted successfully');
        }else {
            abort('404');
        }
    }
}
