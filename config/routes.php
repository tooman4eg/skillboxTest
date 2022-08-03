<?php

use App\Controller;

return [
    '/' => fn() => 'hello!',
    '/list' => [new Controller, 'storeProduct'],
    '/create' => [new Controller, 'createProduct'],
    '/delete' => [new Controller, 'deleteProduct'],
];
