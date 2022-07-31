<?php

namespace App;

use Core\ErrorHandler;

class Application
{
    protected string $configPath;
    protected string $routesPath;

    protected static string $root;
    protected $config = [];

    /**
     * @return string
     */
    public function getConfigPath(): string
    {
        return $this->configPath;
    }

    /**
     * @param string $configPath
     * @return Application
     */
    public function setConfigPath(string $configPath): Application
    {
        $this->configPath = self::$root . $configPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoutesPath(): string
    {
        return $this->routesPath;
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
        return $this;
    }

    public function startSession()
    {
        session_save_path($this->configPath['app']['session_save_path']);
        session_set_save_handler(new \SessionHandler());
        session_start();
        return $this;
    }

    public function dispatch()
    {
        return $this;
    }

    public function init()
    {
        set_error_handler([ErrorHandler::class, 'error']);
        set_exception_handler([ErrorHandler::class, 'exception']);

        $this->config = include $this->configPath;
        return $this;
    }


}