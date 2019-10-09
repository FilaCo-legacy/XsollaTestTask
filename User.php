<?php


namespace NewsFeedModule;


interface IUser
{
    function getId(): int;
    function getNickName(): string;
    function getAccessRights(): int;
}