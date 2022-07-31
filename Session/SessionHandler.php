<?php

class SessionHandler implements SessionHandlerInterface
{
    protected string $savePath = '';

    /**
     * @inheritDoc
     */
    public function close()
    {
        // TODO: Implement close() method.
    }

    /**
     * @inheritDoc
     */
    public function destroy(string $id)
    {
        // TODO: Implement destroy() method.
    }

    /**
     * @inheritDoc
     */
    public function gc(int $max_lifetime)
    {
        // TODO: Implement gc() method.
    }

    /**
     * @inheritDoc
     */
    public function open(string $path, string $name): bool
    {
        $this->savePath = $path;
        if (!dir($this->savePath) && !mkdir($concurrentDirectory = $this->savePath, 777, true) && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function read(string $id)
    {
        $file = $this->savePath . DIRECTORY_SEPARATOR . $id;
        if (!file_exists($file)) {
            touch($file);
        }
        return file_get_contents($file);

    }

    /**
     * @inheritDoc
     */
    public function write(string $id, string $data)
    {
        return file_put_contents($this->savePath . DIRECTORY_SEPARATOR . $id, $data) !== false;
    }
}