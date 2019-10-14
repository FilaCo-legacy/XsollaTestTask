<?php

namespace SeekableIteratorTask;

use SeekableIterator;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class FileSeekableIterator implements SeekableIterator
{
    private $fileDescriptor;

    private $blockSize;

    public function __construct(string $path, int $blockSize = 255)
    {
        $this->fileDescriptor = fopen($path, "r");
        $this->blockSize = $blockSize;
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        $result = fread($this->fileDescriptor, $this->blockSize);

        if ($result === false)
            throw new FileException("Невозможно прочитать блок: файл закончился");

        return $result;
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $result = fseek($this->fileDescriptor,$this->blockSize, SEEK_CUR);

        if ($result === -1)
            throw new FileException("Невозможно передвинуть указатель блока");

        return $result;
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return ftell($this->fileDescriptor);
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return bool The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return !feof($this->fileDescriptor);
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        rewind($this->fileDescriptor);
    }

    /**
     * Seeks to a position
     * @link https://php.net/manual/en/seekableiterator.seek.php
     * @param int $position <p>
     * The position to seek to.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function seek($position)
    {
        $result = fseek($this->fileDescriptor, $this->blockSize * $position);

        if ($result === -1)
            throw new FileException("Невозможно передвинуть указатель блока");

        return $result;
    }
}