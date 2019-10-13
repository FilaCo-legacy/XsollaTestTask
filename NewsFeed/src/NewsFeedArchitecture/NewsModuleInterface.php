<?php


namespace NewsFeedModule\Architecture;

/**
 * Интерфейс модуля для работы с постами новостной ленты
 * @package NewsFeedModule
 */
interface NewsModule
{
    /**
     * Проверить, имеет ли юзер права на добавление новостей
     * @param User $user - ссылка на пользователя
     * @return bool - true, если пользователь имеет права добавлять новости, иначе false
     */
    function canAddNews(User $user): bool;

    /**
     * Добавить новый пост в ленту
     * @param User $author - автор поста
     * @param string $text - текст новости
     * @return News - ссылка на новый объект новости
     */
    function addNews(User $author, string $text): News;

    /**
     * Получить все новости из ленты, сущетсвующие на момент вызова
     * @return array - массив новостей
     */
    function getAllNews(): array;
}