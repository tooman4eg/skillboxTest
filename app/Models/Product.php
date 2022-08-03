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
//        var_dump($fields);
        if (isset($fields)) {
            $id = $_SESSION['nextId'] ?? 1;
            $product = [
                'id'=>$id,
                'name'=>$fields['name'],
                'price'=>$fields['price'],
            ];
            $_SESSION['products'][$id] = $product;
            echo " успешно создан товар $id : ".print_r($product,1);
            $_SESSION['nextId'] = ++$id;

            return true;
        }
        return false;
    }

    public function delete($id)
    {
//        var_dump('delete' .$id);

        if (isset($_SESSION['products'][$id])) {
            unset($_SESSION['products'][$id]);
            echo " успешно удален товар $id  ";
            return true;
        }
        echo "nothing to delete";
        return false;
    }
}