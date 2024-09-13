<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ProductBrand;
use Illuminate\Http\Request;

class ProductBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $product_brand =  ProductBrand::all();

        return response()->json([
            'status' => 'success',
            'data' => is_null($product_brand) ? [] : $product_brand
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        //
        $product_brand = new ProductBrand();

        $product_brand->name = $request->name;

        $product_brand->save();

        return response()->json([
            'status' => 'success',
            'data' => $product_brand
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $product_type =  ProductBrand::find($id);

        if (is_null($product_type)) {
            return response()->json([
                'status' => 'error',
                'message' => sprintf('id %s not found', $id)
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $product_type
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product_brand =  ProductBrand::find($id);

        $product_brand->name = $request->name;
        $product_brand->save();

        return response()->json([
            'status' => 'success',
            'data' => $product_brand
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        $product_brand =  ProductBrand::find($id);
        $product_brand->delete();

        return response()->json([
            'status' => 'success'
        ], 200);
    }
}
