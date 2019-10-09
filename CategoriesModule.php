<?php


namespace NewsFeedModule;

/**
 * Интерфейс к модулю новостной ленты, который отвечает за работу с категориями
*/
interface CategoriesModule
{
    /**
     * Проверить, имеет ли юзер права на добавление категорий
     * @param User $user - ссылка на пользователя
     * @return bool - true, если пользователь имеет права добавлять категории, иначе false
     */
    function canAddCategories(User $user): bool;

    /**
     * Добавить новую категорию в список
     * @param User $author - автор категории
     * @param string $categoryName - название категории
     * @return Category - ссылка на новый объект категории
     */
    function addCategory(User $author, string $categoryName): Category;

    /**
     * Вернуть список всех категорий
     * @return array - массив, содержащий все категории, существующие на момент вызова
     */
    function getAllCategories(): array;
}