<?php

namespace SeekableIteratorTask;

use http\Exception\InvalidArgumentException;
use SeekableIterator;

class FileSeekableIterator implements SeekableIterator
{
    public const FULL_MODE = 0;
    public const BLOCK_MODE = 1;
    public const STRING_MODE = 2;

    private $position;

    private $fileDescriptor;

    public function __construct(FileFactoryInterface $fileFactory, string $fileName, int $readMode = self::STRING_MODE)
    {
        $this->fileDescriptor = $fileFactory->openFile($fileName);
    }

    public function configure(int $mode){
        if ($mode < 0 || $mode > 2)
            throw new InvalidArgumentException("Некорректный режим считывания файла");

        $this->rewind();
        $this->fileDescriptor->setReadMode($mode);
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return $this->fileDescriptor->getToken($this->position);
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->position;
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
        return $this->position >= 0 && $this->position < $this->fileDescriptor->reachedEOF();
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this -> position = 0;
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
        if ($position < 0 || $position >= $this->fileDescriptor->reachedEOF())
            throw new \OutOfBoundsException("Некорректная позиция для просмотра");

        $this->$position = $position;
    }
}