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
        $category_id = $request->input('category_id');
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
    public function editCategory($id){
       $category = Categories::find($id);
        return view('categories.edit', compact('category'));
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


    public function updateCategory(Request $request, $id)
{
    // Validate the request
    $validated = $request->validate([
        'name' => 'required',
        'status' => 'nullable|boolean', // Optional: ensure status is a boolean if provided
    ]);

    // Find the category by ID
    $category = Categories::findOrFail($id);

    // Update the category fields
    $category->name = $request->input('name');
    $category->status = $request->input('status', $category->status); 
    $category->user_id = Auth::id();

    // Save the changes
    $category->save();

    // Redirect with success message
    return redirect('categories')->with('success', 'Category updated successfully.');
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
            $order = Order::with('product')->orderBy('id', 'Desc')->get();
            return view("order.index",compact('order'));
        }else{
            $order = Order::where('user_id',Auth::id())->orderBy('id', 'Desc')->get();
            return view("order.index",compact('order'));
        }
    }
    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->order_status = $request->input('order_status');
            $order->save();
    
            return response()->json(['success' => 'Order status updated to ' . $request->input('order_status')]);
        }
    
        return response()->json(['error' => 'Order not found'], 404);
    }

}
