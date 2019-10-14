<?php

namespace SeekableIteratorTask;

interface FileFactoryInterface
{
    public function openFile($path) : FileInterface;
}