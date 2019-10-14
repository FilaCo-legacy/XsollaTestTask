<?php


namespace NewsFeedModule\Architecture;

use Doctrine\Common\Collections\Collection;
use NewsFeedModule\NewsInterface;

/**
 * Интерфейс для модуля взаимодействий новостной ленты
 * @package NewsFeedModule
 */
interface InteractionModuleInterface
{
    /**
     * Проверить, может ли пользователь связывать новости и категории
     * @param UserInterface $user - ссылка на пользователя
     * @param CategoryInterface $category - ссылка на категорию
     * @param NewsInterface $news - ссылка на новость
     * @return bool - возвращает true, если пользователь может привязать категорию к новости, иначе - false
     */
    function canBindNewsToCategory(UserInterface $user, CategoryInterface $category, NewsInterface $news): bool;

    /**
     * Привязать новость к категории
     * @param UserInterface $user - ссылка на пользователя
     * @param CategoryInterface $category - ссылка на категорию
     * @param NewsInterface $news - ссылка на новость
     */
    function bindNewsToCategory(UserInterface $user, CategoryInterface $category, NewsInterface $news): void;

    /**
     * Получить все новости, которые которые удовлетворяют хотя бы одной категории
     * @param array $categories - список категорий
     * @return Collection - список новостей, удовлетворяющих хотя бы одной категории
     */
    function getNewsByCategories(array $categories): Collection;
}