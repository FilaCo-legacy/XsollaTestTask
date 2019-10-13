<?php


namespace NewsFeedModule;

/**
 * Интерфейс новости
 */
interface NewsInterface
{
    /**
     * Получить идентификатор новости из БД
     */
    function getId(): int;
    /**
     * Получить дату и время добавления новости в ленту
     */
    function getDateAdded(): \DateTimeInterface;
    /**
     * Получить полный текст новости
     */
    function getText(): string;

    /**
     * Получить все категории, к которым относится новость
     */
    function getCategories(): array;
    /**
     * Получить автора новости
     */
    function getAuthor(): User;
    /**
     * Получить пользователей, которым понравилась новость
     */
    function getLikedUsers(): array;

    /**
     * Привязать категорию к новости
     * @param $category - ссылка на категорию
     */
    function bindCategory(NewsCategory $category): void;
}