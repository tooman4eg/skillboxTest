<?php

namespace App;

use App\Models\Product;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    public Product $product;
    protected Environment $view;

    public function __construct()
    {
        $this->product = new Product();
        $this->view = new Environment(new FilesystemLoader('templates'));
    }

    /**
     * @throws \Twig\Error\SyntaxError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\LoaderError
     */
    public function storeProduct()
    {
        $list = (new Product())->list();

        return $this->view->load('list.twig')->render(['products' => $list]);
    }

    public function createProduct(): string
    {
        if (!empty ($_GET['name']) && !empty($_GET['price'])) {
            $id = (new Product())->create([
                'name' => $_GET['name'],
                'price' => $_GET['price']]);
        }
        $result = isset($id) ? "Успешно создан товар id:$id" : '';

        return $this->view->load('form.twig')->render(['result' => $result]);
    }

    public function deleteProduct()
    {
        $result = (new Product())->delete($_GET['id']);

        return $this->view->load('delete_result.twig')->render(['result' => $result ? 'success' : 'fault']);

    }

    public function index()
    {
        return $this->view->load('list.twig')->render(['index.twig']);
    }
}