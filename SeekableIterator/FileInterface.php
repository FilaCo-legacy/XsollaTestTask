<?php

namespace SeekableIteratorTask;

interface FileInterface
{
    public function getToken(int $index):string;

    public function reachedEOF(): bool;

    public function setReadMode(int $mode): void;

    public function getReadMode(): int;
}