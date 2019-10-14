<?php


namespace SeekableIteratorTask;


class File implements FileInterface
{
    private $handler;

    private $readMode;

    public function __construct($handler)
    {
        $this->handler=$handler;
    }

    public function getToken(int $index): string
    {
        // TODO: Implement getToken() method.
    }

    public function reachedEOF(): bool
    {
        // TODO: Implement reachedEOF() method.
    }
}