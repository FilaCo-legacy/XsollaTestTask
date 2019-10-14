<?php


namespace NewsFeedModule\Architecture;


use App\Entity\Category;
use App\Entity\User;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\Collection;
use http\Exception;

class CategoriesModule implements CategoriesModuleInterface
{
    private $categoryRepository;

    public function getCategoryRepository():CategoryRepository{
        return $this->getCategoryRepository();
    }

    /**
     * Проверить, имеет ли юзер права на добавление категорий
     * @param User $user - ссылка на пользователя
     * @return bool - true, если пользователь имеет права добавлять категории, иначе false
     */
    public function canAddCategories(User $user): bool
    {
        // TODO: Implement canAddCategories() method.
    }

    /**
     * Добавить новую категорию в список
     * @param User $author - автор категории
     * @param string $categoryName - название категории
     * @return Category - ссылка на новый объект категории
     * @throws \Exception
     */
    public function addCategory(User $author, string $categoryName): Category
    {
        if (!$this->canAddCategories($author))
            throw new \Exception("Пользователь не обладает правами на добавление категорий");


    }

    /**
     * Вернуть список всех категорий
     * @return Collection - коллекция, содержащая все категории, существующие на момент вызова
     */
    function getAllCategories(): Collection
    {
        // TODO: Implement getAllCategories() method.
    }
}