<?php


namespace NewsFeedModule;


interface IAddNewsModule
{
    function canAddNews(IUser $user): bool;
    function addNews(IUser $author, string $user): void;
}