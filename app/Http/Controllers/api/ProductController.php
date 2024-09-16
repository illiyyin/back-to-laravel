<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $product =  Product::all();

        return response()->json([
            'status' => 'success',
            'data' => is_null($product) ? [] : $product
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'product_type_id' => 'required|exists:products,id',
        ]);
        $product = new Product();

        $product->name = $validatedData['name'];
        $product_type_id = $validatedData['product_type_id'];

        if (!is_null($product_type_id)) {
            $product_type = ProductType::find($product_type_id);
            if (is_null($product_type)) {
                return response()->json([
                    'status' => 'error',
                    'message' => sprintf('product_type_id %s not found', $product_type_id)
                ], 400);
            }
            $product->product_type_id = $product_type_id;
        }


        $product->save();

        return response()->json([
            'status' => 'success',
            'data' => $product
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product =  Product::find($id);

        if (is_null($product)) {
            return response()->json([
                'status' => 'error',
                'message' => sprintf('id %s not found', $id)
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $product
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'product_type_id' => 'required|exists:products,id',
        ]);
        $product =  ProductType::find($id);

        $product->name = $validatedData['name'];
        $product_type_id = $validatedData['product_type_id'];
        
        if (!is_null($product_type_id)) {
            $product_type = ProductType::find($product_type_id);

            if (is_null($product_type)) {
                return response()->json([
                    'status' => 'error',
                    'message' => sprintf('product_type_id %s not found', $product_type_id)
                ], 400);
            }

            $product->product_type_id = $product_type_id;
        }
        $product->save();

        return response()->json([
            'status' => 'success',
            'data' => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        $product =  Product::find($id);

        $product->delete();

        return response()->json([
            'status' => 'success'
        ], 200);
    }
}
