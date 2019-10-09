<?php


namespace NewsFeedModule;

/**
 * Интерфейс пользователя ленты новостей
*/
interface User
{
    /**
     * Получить идентификатор пользователя из БД
     * @return int - идентификатор пользователя
     */
    function getId(): int;
    /**
     * Получить никнейм пользователя
     * @return string - строка, хранящая никнейм пользователя
     */
    function getNickName(): string;
    /**
     * Получить маску прав пользователя
     * @return int - число, двоичная запись которого используется в качестве маски прав
     */
    function getAccessRights(): int;

    /**
     * Получить массив новостей, созданных пользователем
     * @return array - массив новостей
     */
    function getCreatedNews(): array;
    /**
     * Получить массив новостей, лайкнутых пользователем
     * @return array - массив новостей
     */
    function getLikedNews(): array;

    /**
     * Ставит посту "лайк"
     * Если лайк уже был установлен, то отменяет его
     * @param News $news - ссылка на пост
     */
    function like(News $news): void;
}