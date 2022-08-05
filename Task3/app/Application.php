<?php

namespace App;

use Core\ErrorHandler;
use Core\Request;
use Core\Session\SessionHandler;


class Application
{
    public const CACHE_SESSIONS = '/cache/sessions';

    protected Router $router;

    protected ?Request $request = null;


    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run()
    {
        $response = $this->init()->startSession()->dispatch();

        $this->terminate($response);
    }

    protected function startSession()
    {
        session_save_path(Application . phpgetcwd());
        session_set_save_handler(new SessionHandler());
        session_start();

        $_SESSION['authorized'] ??= false;
        return $this;
    }

    protected function dispatch()
    {
        return $this->router->dispatch($this->request);
    }

    protected function init()
    {
        $this->request = Request::init();

        set_error_handler([ErrorHandler::class, 'error']);
        set_exception_handler([ErrorHandler::class, 'exception']);

        return $this;
    }

    protected function terminate($response)
    {
        exit($response);
    }

}