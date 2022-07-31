<?php

namespace App;
interface ModelInterface
{
    public function list();

    public function create($fields);

    public function delete($id);
}