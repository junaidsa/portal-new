<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Psy\debug;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();
        return view('product.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required|exists:categories,id',
            'pdf_file' => 'mimes:pdf',
            // 'description' => 'required|string',
        ]);

        if ($validated) {
            // Handle image file upload
            $document = $request->file('image');
            $name = now()->format('Y-m-d_H-i-s') . '-image';
            $file = $name . '.' . $document->getClientOriginalExtension();
            $targetDir = public_path('./files');
            $document->move($targetDir, $file);

            // Handle PDF file upload (if provided)
            $pdf = null;
            if ($request->hasFile('pdf_file')) {
                $docpdf = $request->file('pdf_file');
                $pdfname = now()->format('Y-m-d_H-i-s') . '-pdf';
                $pdf = $pdfname . '.' . $docpdf->getClientOriginalExtension();
                $targetPDF = public_path('./files');
                $docpdf->move($targetPDF, $pdf);
            }

            // Create new product with description
            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'image' => $file,
                'tags' => $request->tags,
                'type' => $request->type,
                'pdf_file' => $pdf,
                'short_description' => $request->short_description,
                // 'description' => $request->description,  // Store the description
            ]);

            return redirect()->route('products.index')->with('success', 'Product added successfully.');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Categories::all();
        return view('product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the request
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'category_id' => 'required|exists:categories,id',
        'pdf_file' => 'nullable|mimes:pdf',
    ]);

    // Find the product by ID
    $product = Product::findOrFail($id);

    // Update image if provided
    if ($request->hasFile('image')) {
        // Process the new image file
        $document = $request->file('image');
        $name = now()->format('Y-m-d_H-i-s') . '-image';
        $file = $name . '.' . $document->getClientOriginalExtension();
        $targetDir = public_path('./files');
        $document->move($targetDir, $file);

        // Update the image path
        $product->image = $file;
    }

    // Update PDF file if provided
    if ($request->hasFile('pdf_file')) {
        $docpdf = $request->file('pdf_file');
        $pdfname = now()->format('Y-m-d_H-i-s') . '-pdf';
        $pdf = $pdfname . '.' . $docpdf->getClientOriginalExtension();
        $targetPDF = public_path('./files');
        $docpdf->move($targetPDF, $pdf);

        // Update the PDF path
        $product->pdf_file = $pdf;
    }

    // Update other fields
    $product->name = $validated['name'];
    $product->price = $request->price; // Assuming price is part of the request
    $product->category_id = $request->category_id;
    $product->tags = $request->tags;
    $product->type = $request->type;
    $product->short_description = $request->short_description;

    // Save the updated product
    $product->save();

    // Redirect with success message
    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['success' => 'Product deleted successfully.']);
        } else {
            return response()->json(['error' => 'Product not found.'], 404);
        }
    }
}
