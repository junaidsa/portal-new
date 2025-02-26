<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class LibraryController extends Controller
{
    // The main index method with pagination
    public function index(Request $request)
    {
        // Search functionality
        $search = $request->input('search');
        $products = Product::query();

        // If there's a search query, filter products by name
        if ($search) {
            $products = $products->where('name', 'LIKE', '%' . $search . '%');
        }

        // Sort products by creation date in descending order (newest first)
          $products = $products->orderBy('created_at', 'desc');
        
        // Paginate 20 products per page
        $products = $products->paginate(20);

        return view('library.index', compact('products', 'search'));
    }

    // Category related methods

    public function createCategory()
    {
        return view('categories.create');
    }

    public function editCategory($id)
    {
        $category = Categories::find($id);
        return view('categories.edit', compact('category'));
    }

    public function storyCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        if ($validated) {
            $category = new Categories();
            $category->name = $request->input('name');
            $category->status = $request->input('status');
            $category->user_id = Auth::id();
            $category->save();
            return redirect('categories')->with('success', 'Category added successfully.');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    public function updateCategory(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'status' => 'nullable|boolean',
        ]);
        
        $category = Categories::findOrFail($id);
        $category->name = $request->input('name');
        $category->status = $request->input('status', $category->status);
        $category->user_id = Auth::id();
        $category->save();
        return redirect('categories')->with('success', 'Category updated successfully.');
    }

    public function indexCategory(Request $request)
    {
        $category = Categories::orderBy('id', 'desc')->get();
        return view('categories.index', compact('category'));
    }

    public function deleteCategory($id)
    {
        $category = Categories::find($id);
        if ($category) {
            $category->delete();
            return redirect()->back()->with('success', 'Category Deleted successfully');
        } else {
            abort('404');
        }
    }

    // Order-related methods

    public function place_order($id)
    {
        $product = Product::find($id);
        return view('library.order_place', compact('product', 'id'));
    }

    public function details($id)
    {
        $product = Product::find($id);
        return view('library.details', compact('product'));
    }

    public function order()
    {
        if (Auth::user()->role == "super") {
            $order = Order::with('product', 'user')->orderBy('id', 'Desc')->get();
            return view("order.index", compact('order'));
        } else {
            $order = Order::where('user_id', Auth::id())->orderBy('id', 'Desc')->get();
            return view("order.index", compact('order'));
        }
    }

    public function generatePdf()
    {
        $order = Order::all();
        $pdf = PDF::loadView('order.index', compact('order'));
        return $pdf->download('orders.pdf');
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

    public function myOrder()
    {
        $order = Order::with('product')->where('user_id', Auth::id())->orderBy('id', 'Desc')->get();
        return view("order.user_order", compact('order'));
    }
}