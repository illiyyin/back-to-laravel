<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductType;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $product_type =  ProductType::all();
        $status_code = 200;
        // if (is_null($product_type)) {
        //     $status_code = 204;
        //     return response()->json([
        //         'message' => 'success',
        //         'data' => $product_type
        //     ], $status_code);
        // }
        return response()->json([
            'message' => 'success',
            'data' => $product_type
        ], $status_code);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $product_type = new ProductType;
        $product_type->name = $request->name;

        $product_type->save();

        return response()->json([
            'message' => 'success',
            'data' => $product_type
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product_type =  ProductType::find($id);
        $status_code = 200;
        // if (is_null($product_type)) {
        //     $status_code = 204;
        //     return response()->json([
        //         'message' => 'success',
        //         'data' => $product_type
        //     ], $status_code);
        // }
        return response()->json([
            'message' => 'success',
            'data' => $product_type
        ], $status_code);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product_type =  ProductType::find($id);
        $product_type->name = $request->name;
        $product_type->save();

        return response()->json([
            'message' => 'success',
            'data' => $product_type
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        $product_type =  ProductType::find($id);
        $product_type->delete();
        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
