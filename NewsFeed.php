<?php


namespace NewsFeedModule;

/**
 * Интерфейс новостной ленты
 * @package NewsFeedModule
 */
interface NewsFeed
{
    /**
     * Получить модуль взаимодействий ленты
     * @return InteractionModule - ссылка на модуль взаимодействий
     */
    function getInteractionModule(): InteractionModule;

    /**
     * Получить модуль категорий
     * @return CategoriesModule - ссылка на модуль категорий
     */
    function getCategoriesModule(): CategoriesModule;

    /**
     * Получить модуль новостей
     * @return NewsModule - ссылка на модуль новостей
     */
    function getNewsModule(): NewsModule;
}