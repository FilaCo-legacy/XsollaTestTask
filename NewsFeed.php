<?php


namespace NewsFeedModule;


interface INewsFeed
{
    function canAddNews(User $user): bool;
    function addNews(User $author, string $user): INews;

    function canAddCategories(User $user): bool;
    function addCategory(User $author, string $categoryName): Category;

    function getAllNews(): array;
    function getAllCategories(): array;
}