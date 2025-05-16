<?php
namespace App\Repositories;

use App\Models\Product;
class ProductRepository
{
    public function get()
    {
    return Product::all();
    }

    public function details(int $id)
    {
        return Product::find($id);
    }
    
    public function store(array $data)
    {
        return Product::create($data);
    }

    public function update(int $id, array $data){
        $product = $this->details($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id)
    {
        $product = $this->details($id);
        $product->delete();
        return $product;
    }

    public function getWithCategory()
    {
        $products = Product::with('category')->get();
        return $products;
    }

    public function findCategory(int $id)
    { 
        $product = $this->details($id);
        $category = $product->category;
        return $category;
    }
}



