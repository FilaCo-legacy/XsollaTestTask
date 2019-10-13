<?php


namespace NewsFeedModule\Architecture;

/**
 * Интерфейс для модуля взаимодействий новостной ленты
 * @package NewsFeedModule
 */
interface InteractionModuleInterface
{
    /**
     * Проверить, может ли пользователь связывать новости и категории
     * @param User $user - ссылка на пользователя
     * @param CategoryInterface $category - ссылка на категорию
     * @param News $news - ссылка на новость
     * @return bool - возвращает true, если пользователь может привязать категорию к новости, иначе - false
     */
    function canBindNewsToCategory(User $user, CategoryInterface $category, News $news): bool;

    /**
     * Привязать новость к категории
     * @param User $user - ссылка на пользователя
     * @param CategoryInterface $category - ссылка на категорию
     * @param News $news - ссылка на новость
     */
    function bindNewsToCategory(User $user, CategoryInterface $category, News $news): void;

    /**
     * Получить все новости, которые которые удовлетворяют хотя бы одной категории
     * @param array $categories - список категорий
     * @return array - список новостей, удовлетворяющих хотя бы одной категории
     */
    function getNewsByCategories(array $categories): array;
}