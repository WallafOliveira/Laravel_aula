<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService =$productService;
    }
    
    public function get()
    {
        $products = $this->productService->get();
        return response()->json($products);
    }
    public function details(int $id)
    {
    
        $product = $this->productService->details($id);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $product = $this->productService->store($data);
        return response()->json($product);
        
    }

    public function update(int $id, Request $request)
    {
        $data = $request->all();
        $product = $this->productService->update($id, $data);
        return response()->json($product);
    }
    
    public function delete(int $id)
    {
        $product = $this->productService->delete($id);
        return response()->json($product);
    }

    public function getWithCategory()
    {
        $product = $this->productService->getWithCategory();
        return response()->json($product);
    }

        public function findCategory()
    {
        $product = $this->productService->getWithCategory();
        return response()->json($product);
    }
}

