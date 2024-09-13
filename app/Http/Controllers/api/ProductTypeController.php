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

        return response()->json([
            'status' => 'success',
            'data' => is_null($product_type) ? [] : $product_type
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $product_type = new ProductType();

        $product_type->name = $request->name;

        $product_type->save();

        return response()->json([
            'status' => 'success',
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
        $product_type =  ProductType::find($id);

        $product_type->name = $request->name;
        $product_type->save();

        return response()->json([
            'status' => 'success',
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
            'status' => 'success'
        ], 200);
    }
}
