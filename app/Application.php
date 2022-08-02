<?php

namespace App;

use Core\ErrorHandler;
use Core\Request;
use Core\Session\SessionHandler;


class Application
{
    protected string $configPath;
    protected string $routesPath;

    protected static string $root;

    protected ?Request $request = null;
    protected array $config = [];


    public function setConfigPath(string $configPath)
    {
        $this->configPath = self::$root . $configPath;
        return $this;
    }


    /**
     * @param string $routesPath
     * @return Application
     */
    public function setRoutesPath(string $routesPath): Application
    {
        $this->routesPath = self::$root . $routesPath;
        return $this;
    }

    public function __construct()
    {
        self::$root = getcwd();
        $this->configPath = self::$root . '/config/config.php';
        $this->routesPath = self::$root . '/config/routes.php';

    }

    public function run()
    {
        $this->init()->startSession()->dispatch();
    }

    protected function startSession()
    {
        session_save_path(self::$root . $this->config['app']['session_save_path']);
        session_set_save_handler(new SessionHandler());
        session_start();

        $_SESSION['authorized'] ??= false;
        return $this;
    }

    protected function dispatch()
    {
        Router::dispatch($this->request);
        return $this;
    }

    protected function init()
    {
        $this->config = include $this->configPath;

        $this->request = Request::init();
        Router::setRoutes($this->routesPath);

        set_error_handler([ErrorHandler::class, 'error']);
        set_exception_handler([ErrorHandler::class, 'exception']);


        return $this;
    }


}