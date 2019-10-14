<?php


namespace NewsFeedModule\Architecture;

use App\Entity\Category;
use App\Entity\User;
use Doctrine\Common\Collections\Collection;

/**
 * Интерфейс к модулю новостной ленты, который отвечает за работу с категориями
*/
interface CategoriesModuleInterface
{
    /**
     * Проверить, имеет ли юзер права на добавление категорий
     * @param User $user - ссылка на пользователя
     * @return bool - true, если пользователь имеет права добавлять категории, иначе false
     */
    public function canAddCategories(User $user): bool;

    /**
     * Добавить новую категорию в список
     * @param User $author - автор категории
     * @param string $categoryName - название категории
     * @return Category - ссылка на новый объект категории
     */
    public function addCategory(User $author, string $categoryName): Category;

    /**
     * Вернуть список всех категорий
     * @return Collection - коллекция, содержащая все категории, существующие на момент вызова
     */
    public function getAllCategories(): Collection;
}