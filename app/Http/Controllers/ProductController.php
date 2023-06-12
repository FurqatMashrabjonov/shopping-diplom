<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::query()
            ->when($request->exists('type'), function ($query) use ($request) {
                $query->where('type', 'like', '%'. $request->input('type') .'%');
            })
            ->when($request->exists('company'), function ($query) use ($request) {
                $query->where('company', 'like', '%'. $request->input('company') .'%');
            })
            ->when($request->exists('ram'), function ($query) use ($request) {
                $query->where('ram', 'like', '%'. $request->input('ram') .'%');
            })
            ->when($request->exists('color'), function ($query) use ($request) {
                $query->where('color', 'like', '%'. $request->input('color') .'%');
            })
            ->when($request->exists('name'), function ($query) use ($request) {
                $query->where('name', 'like', '%'. $request->input('name') .'%');
            })
            ->get();

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
