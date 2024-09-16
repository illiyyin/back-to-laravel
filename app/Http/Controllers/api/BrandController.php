<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $brand =  Brand::all();
        $brand = Brand::select('brand.name as name', 'brand.id as id', 'product.name as product_name','product.id as product_id')
            ->join('product_sku', 'product_sku.brand_id', '=', 'brand.id')
            // ->join('product_sku','product_sku.product_id','=','product.id')
            ->join('product', 'product.id', '=', 'product_sku.product_id')
            ->groupBy('brand.id', 'brand.name', 'product.name','product.id')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => is_null($brand) ? [] : $brand
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
        ]);
        $brand = new Brand();

        $brand->name = $validatedData['name'];

        $brand->save();

        return response()->json([
            'status' => 'success',
            'data' => $brand
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $product_type =  Brand::find($id);

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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $brand =  Brand::find($id);

        $brand->name = $validatedData['name'];

        $brand->save();

        return response()->json([
            'status' => 'success',
            'data' => $brand
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        $brand =  Brand::find($id);
        $brand->delete();

        return response()->json([
            'status' => 'success'
        ], 200);
    }
}
