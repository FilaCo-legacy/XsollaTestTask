<?php


namespace NewsFeedModule;

// Интерфейс новости
interface News
{
    // Получить идентификатор новости из БД
    function getId(): int;
    // Получить дату и время добавления новости в ленту
    function getDateAdded(): \DateTimeInterface;
    // Получить полный текст новости
    function getText(): string;

    // Получить все категории, к которым относится новость
    function getCategories(): array;
    // Получить автора новости
    function getAuthor(): User;
    // Получить пользователей, которым понравилась новость
    function getLikedUsers(): array;

    // Привязать категорию к новости
    function bindCategory(Category $category): void;
}