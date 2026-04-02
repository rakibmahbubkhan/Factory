<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Search functionality
        if ($request->has('search')) {
            $query->where('product_name', 'like', '%' . $request->search . '%')
                ->orWhere('category', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Sort functionality
        if ($request->has('sort_by')) {
            $query->orderBy($request->sort_by, $request->sort_order ?? 'asc');
        } else {
            $query->orderBy('created_at', 'desc'); // Default sort by creation date
        }

        // Pagination
        $products = $query->paginate(10);

        return view('Admin.pages.Products.index', compact('products'));
    }

    public function create()
    {
        return view('Admin.pages.Products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name'  => 'required|string',
            'description'   => 'string',
            'key_features'  => 'nullable|string',
            'applications'  => 'nullable|string',
            'benefits'      => 'nullable|string',
            'price'         => 'numeric',
            'category'      => 'required|string',
            'contact'       => 'required|string',
            'isActive'      => 'required|boolean',
            'image1'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image2'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image3'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image4'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        

        // Handle each image upload
        foreach (['image1', 'image2', 'image3', 'image4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $data[$imageField] = $request->file($imageField)->store('products', 'public');
            }
        }

        $data['created_by'] = auth()->user()->id; // or however you're tracking the creator

        $product = Product::create($data);

        // Handle Dynamic FAQs
        if ($request->has('faqs')) {
            foreach ($request->faqs as $faq) {
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    $product->faqs()->create($faq);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'product_name'  => 'required|string',
            'description'   => 'string',
            'key_features'  => 'nullable|string',
            'applications'  => 'nullable|string',
            'benefits'      => 'nullable|string',
            'price'         => 'numeric',
            'category'      => 'required|string',
            'contact'       => 'required|string',
            'isActive'      => 'required|boolean',
            'image1'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image2'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image3'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image4'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Handle each image upload
        foreach (['image1', 'image2', 'image3', 'image4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                // Delete the old image if a new one is uploaded
                if ($product->$imageField) {
                    Storage::delete('public/' . $product->$imageField);
                }
                $data[$imageField] = $request->file($imageField)->store('products', 'public');
            }
        }

        $data['updated_by'] = auth()->user()->id; // or however you're tracking the updater

        $product->update($data);

        // Handle Dynamic FAQs
        if ($request->has('faqs')) {
            foreach ($request->faqs as $faq) {
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    $product->faqs()->create($faq);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

//    public function show(Product $product)
//    {
//        return view('Product.productDetail', compact('product'));
//    }

    public function updateDescription(Request $request, Product $product)
    {
        // Optional: Add authorization check
        // $this->authorize('update', $product);
        
        $request->validate([
            'description' => 'required|string'
        ]);
        
        $product->description = $request->description;
        $product->save();
        
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Description updated successfully',
                'description' => $product->description
            ]);
        }
        
        return redirect()->back()->with('success', 'Description updated successfully');
    }


    public function __construct()
    {
        $this->middleware('isAdmin')->except('show');
    }

    public function show($id)
    {
        $company = Company::first();
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->limit(5)
            ->get();

        return view('Product.productDetail', compact('product', 'relatedProducts', 'company'));
    }

    public function edit(Product $product)
    {
        return view('Admin.pages.Products.edit', compact('product'));
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
    
}
