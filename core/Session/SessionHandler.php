<?php

namespace Core\Session;

class SessionHandler implements \SessionHandlerInterface
{
    protected string $savePath = '';

    /**
     * @inheritDoc
     */
    public function close()
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    /**
     * @inheritDoc
     */
    public function gc($max_lifetime)
    {
        // TODO: Implement gc() method.
    }

    /**
     * @inheritDoc
     */
    public function open($path, $name): bool
    {
        $this->savePath = $path;
        if (!dir($this->savePath)) {
            mkdir($this->savePath, 0777, true);
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function read($session_id)
    {
        $file = $this->savePath . DIRECTORY_SEPARATOR . $session_id;
        if (!file_exists($file)) {
            touch($file);
        }
        return file_get_contents($file);

    }

    /**
     * @inheritDoc
     */
    public function write($id, $data)
    {

//        var_dump(file_put_contents($this->savePath . DIRECTORY_SEPARATOR . $id, $data)!== false);
       return   file_put_contents($this->savePath . DIRECTORY_SEPARATOR . $id, $data) !== false;
    }
}