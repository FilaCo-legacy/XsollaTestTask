<?php


namespace NewsFeedModule;


interface News
{
    function getId(): int;
    function getDateAdded(): \DateTimeInterface;
    function getText(): string;

    function getCategories(): array;
    function getAuthor(): User;
    function getLikedUsers(): array;

    function bindCategory(Category $category): void;
}