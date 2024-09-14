<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductSKU;
use Illuminate\Http\Request;

class ProductSKUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $product_sku =  ProductSKU::all();

        return response()->json([
            'status' => 'success',
            'data' => is_null($product_sku) ? [] : $product_sku
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        //
        $product_sku = new ProductSKU();

        $product_sku->name = $request->name;
        $product_id = $request->product_id;


        $product = Product::find($product_id);

        if (is_null($product)) {
            return response()->json([
                'status' => 'error',
                'message' => sprintf('product_id %s not found', $product_id)
            ], 400);
        }

        $product_sku->product_id = $product_id;

        $brand_id = $request->brand_id;
        $brand = Brand::find($brand_id);

        if (is_null($brand)) {
            return response()->json([
                'status' => 'error',
                'message' => sprintf('brand_id %s not found', $brand_id)
            ], 400);
        }

        $product_sku->brand_id = $brand_id;

        $product_sku->save();

        return response()->json([
            'status' => 'success',
            'data' => $product_sku
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product_sku =  ProductSKU::find($id);

        if (is_null($product_sku)) {
            return response()->json([
                'status' => 'error',
                'message' => sprintf('id %s not found', $id)
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $product_sku
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product_sku =  ProductSKU::find($id);

        $product_sku->name = $request->name;
        $product_id = $request->product_id;


        $product = Product::find($product_id);

        if (is_null($product)) {
            return response()->json([
                'status' => 'error',
                'message' => sprintf('product_id %s not found', $product_id)
            ], 400);
        }

        $product_sku->product_id = $product_id;

        $brand_id = $request->brand_id;
        $brand = Brand::find($brand_id);

        if (is_null($brand)) {
            return response()->json([
                'status' => 'error',
                'message' => sprintf('brand_id %s not found', $brand_id)
            ], 400);
        }

        $product_sku->brand_id = $brand_id;

        $product_sku->save();

        return response()->json([
            'status' => 'success',
            'data' => $product_sku
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        $product_sku =  ProductSKU::find($id);

        $product_sku->delete();

        return response()->json([
            'status' => 'success'
        ], 200);
    }
}
