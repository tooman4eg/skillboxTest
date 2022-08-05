<?php

namespace App\Models;

class Product implements \App\Models\ModelInterface
{

    private $price;
    private $name;
    private $id = 1;

    public function __construct()
    {

    }

    public function list()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    public function create($fields)
    {
        if (isset($fields)) {
            $id = $_SESSION['nextId'] ?? 1;
            $product = [
                'id'=>$id,
                'name'=>$fields['name'],
                'price'=>$fields['price'],
            ];
            $_SESSION['products'][$id] = $product;

            $_SESSION['nextId'] = ++$id;

            return $id;
        }
        return false;
    }

    public function delete($id)
    {
        if (isset($_SESSION['products'][$id])) {
            unset($_SESSION['products'][$id]);
            return $id;
        }
        return false;
    }
}