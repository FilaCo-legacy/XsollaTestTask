<?php


namespace NewsFeedModule\Architecture;

/**
 * Интерфейс новостной ленты
 * @package NewsFeedModule
 */
interface NewsFeed
{
    /**
     * Получить модуль взаимодействий ленты
     * @return InteractionModuleInterface - ссылка на модуль взаимодействий
     */
    function getInteractionModule(): InteractionModuleInterface;

    /**
     * Получить модуль категорий
     * @return CategoriesModuleInterface - ссылка на модуль категорий
     */
    function getCategoriesModule(): CategoriesModuleInterface;

    /**
     * Получить модуль новостей
     * @return NewsModule - ссылка на модуль новостей
     */
    function getNewsModule(): NewsModule;
}