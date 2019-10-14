<?php

namespace SeekableIteratorTask;

class FileFactory implements FileFactoryInterface{

    public function openFile($path): FileInterface
    {
        return new FileDescriptor(fopen($path, "r"));
    }
}