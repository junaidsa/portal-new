<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index(Request $request)
    {
        // Check if a category is selected
        $category_id = $request->input('category_id');

        // Get all categories
        $category = Categories::all();

        // Filter products based on selected category
        if ($category_id) {
            $products = Product::where('category_id', $category_id)->get();
        } else {
            // Show all products if no category is selected
            $products = Product::all();
        }

        return view('library.index', compact('products', 'category', 'category_id'));
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
    public function place_order($id){
       $product = Product::find($id);
        return view('library.order_place', compact('product','id'));
    }

    public function order() {
        if(Auth::user()->role == "super"){
            $order = Order::where('user_id',Auth::id())->orderBy('id', 'Desc')->get();
            return view("order.index",compact('order'));
        }else{
            $order = Order::where('user_id',Auth::id())->orderBy('id', 'Desc')->get();
            return view("order.index",compact('order'));
        }
    }
}
