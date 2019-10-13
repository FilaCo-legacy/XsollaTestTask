<?php


namespace NewsFeedModule\Architecture;

use Doctrine\Common\Collections\Collection;
use NewsFeedModule\NewsInterface;

/**
 * Интерфейс категории
 */
interface CategoryInterface
{
    /**
     * Получить идентификатор категории из БД
     * @return int - идентификатор категории
     */
    function getId(): int;
    /**
     * Получить название категории
     * @return string - название категории
     */
    function getName(): string;
    /**
     * Получить список новостей, относящихся к категории
     * @return Collection - коллекция, хранящая новости, относящиеся к категории
     */
    function getNews(): Collection;
    /**
     * Привязать новость к категории
     * @param NewsInterface $news - ссылка на пост
     */
    function bindNews(NewsInterface $news): void;
}