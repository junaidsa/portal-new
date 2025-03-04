<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Psy\debug;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('product.index',compact('products'));
    }
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
            'pdf_file' => 'mimes:pdf',
        ]);

        if ($validated) {
          
            $document = $request->file('image');
            $name = now()->format('Y-m-d_H-i-s') . '-image';
            $file = $name . '.' . $document->getClientOriginalExtension();
            $targetDir = public_path('./files');
            $document->move($targetDir, $file);
            $pdf = null;
            if ($request->hasFile('pdf_file')) {
                $docpdf = $request->file('pdf_file');
                $pdfname = now()->format('Y-m-d_H-i-s') . '-pdf';
                $pdf = $pdfname . '.' . $docpdf->getClientOriginalExtension();
                $targetPDF = public_path('./files');
                $docpdf->move($targetPDF, $pdf);
            }
            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'image' => $file,
                'tags' => $request->tags,
                'type' => $request->type,
                'pdf_file' => $pdf,
                'short_description' => $request->short_description,
                'description' => $request->description, 
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
        return view('product.edit',compact('product'));
    }

    public function update(Request $request, $id)
{
    // Validate the request
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
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
    $product->price = $request->price;
    $product->tags = $request->tags;
    $product->type = $request->type;
    $product->short_description = $request->short_description;
    $product->description = $request->description;
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
