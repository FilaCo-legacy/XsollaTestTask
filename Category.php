<?php


namespace NewsFeedModule;

// Интерфейс категории
interface Category
{
    // Получить идентификатор категории из БД
    function getId(): int;
    // Получить название категории
    function getName(): string;
    // Получить список новостей, относящихся к категории
    function getNews(): array;
    // Привязать новость к категории
    function bindNews(News $news): void;
}