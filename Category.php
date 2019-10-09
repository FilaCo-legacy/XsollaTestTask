<?php


namespace NewsFeedModule;

/**
 * Интерфейс категории
 */
interface Category
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
     * @return array - массив, хранящий новости, относящиеся к категории
     */
    function getNews(): array;
    /**
     * Привязать новость к категории
     * @param News $news - ссылка на пост
     */
    function bindNews(News $news): void;
}