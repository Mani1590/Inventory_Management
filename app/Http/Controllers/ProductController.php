<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('submitted_at', 'desc')->get();
        return view('products', compact('products'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::create([
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'submitted_at' => now()
        ]);

        return response()->json([
            'success' => true, 
            'product' => [
                'id' => $product->id,
                'product_name' => $product->product_name,
                'quantity' => $product->quantity,
                'price' => $product->price,
                'submitted_at' => $product->submitted_at->format('Y-m-d H:i:s'),
                'total_value' => $product->total_value
            ]
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::findOrFail($id);
        $product->update([
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'submitted_at' => now()
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return response()->json(['success' => true]);
    }

    public function getTotal()
    {
        $total = Product::select(DB::raw('SUM(quantity * price) as total'))->first();
        return response()->json(['total' => $total->total ?? 0]);
    }
}