<?php


namespace NewsFeedModule\Architecture;

use NewsFeedModule\NewsInterface;

/**
 * Интерфейс модуля для работы с постами новостной ленты
 * @package NewsFeedModule
 */
interface NewsModuleInterface
{
    /**
     * Проверить, имеет ли юзер права на добавление новостей
     * @param UserInterface $user - ссылка на пользователя
     * @return bool - true, если пользователь имеет права добавлять новости, иначе false
     */
    function canAddNews(UserInterface $user): bool;

    /**
     * Добавить новый пост в ленту
     * @param UserInterface $author - автор поста
     * @param string $text - текст новости
     * @return NewsInterface - ссылка на новый объект новости
     */
    function addNews(UserInterface $author, string $text): NewsInterface;

    /**
     * Получить все новости из ленты, сущетсвующие на момент вызова
     * @return array - массив новостей
     */
    function getAllNews(): array;
}