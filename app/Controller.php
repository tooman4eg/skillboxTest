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
        $list = (new Product())->list();
        echo "<h2>Products</h2>";
        echo "<A href=/products/create> Add product</A>";
        if ($list) {
            echo "<table cellspacing='5' cellpadding='5' border='1' width='100%'>";
            foreach ($list as $id => $product) {
                echo "<tr>"
                    . "<td>" . $id . "</td>"
                    . "<td>" . $product['name'] . "</td>"
                    . "<td>" . $product['price'] . "</td>"
                    . "<td><a href ='/products/delete?id=$id'>delete</a></td>"
                    . "</tr>";
            }
            echo "</table>";
        } else

            return "nothig found";
    }

    public function createProduct()
    {

        if (!empty ($_GET['name']) && !empty($_GET['price'])) {

            (new Product())->create([
                'name' => $_GET['name'],
                'price' => $_GET['price']]);
        }

        echo "
<form method=\"post\">
    <label>Product name</label><br>
    <input type=\"text\" name=\"name\">
    <label>price</label>
    <input name=\"price\" type=\"text\">
    <input type=\"submit\" value=\"add\">

</form>";


    }

    public function deleteProduct()
    {

        $id = $_GET['id'];

        $result = (new Product())->delete($id);
        echo "<br><A HREF='/products'>Product list</A>";
    }

    public function index()
    {
        return "index ok";
    }
}