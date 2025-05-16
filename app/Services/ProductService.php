<?php

namespace App\Services;
use App\Repositories\ProductRepository;
use PhpParser\Node\Stmt\Return_;

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

    public function update(int $id, array $data)
    {
        return $this->productRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->productRepository->delete($id);
    }

    public function getWithCategory()
    {
        return $this->productRepository->getWithCategory();
    }

    
    public function findCategory(int $id)
    {
        return $this->productRepository->findCategory($id);
    }
}
