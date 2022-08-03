<?php

namespace App;

use App\Models\Product;

class Controller
{
    public Product $product;

    public function __invoke()
    {
        $this->product = new Product();
    }

    public function storeProduct()
    {
        return $this->product->list();
    }

    public function createProduct()
    {
        $fields = $_GET['fields'];
        var_dump($_GET);
        return (new Product())->create($fields);
    }

    public function deleteProduct()
    {
        $id = $_POST['product_id'];
        return (new Product())->delete($id);
    }

    public function index()
    {
        return "index ok";
    }
}