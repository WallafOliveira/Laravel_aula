<?php

namespace App\Services;
use App\Repositories\ProductRepository;

class ProductService
{
    private ProductRepository $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function get()
    {
        $products = $this->productRepository->get();
        return $products;
    }

    public function details(int $id)
    {
        return $this->productRepository->details($id);
    }

    public function store(array $data)
    {
        return $this->productRepository->store($data);
    }

    public function update(int $data, $id)
    {
        
    }
}
