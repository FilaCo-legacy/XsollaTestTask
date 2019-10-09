<?php


namespace NewsFeedModule;


final class NewsFeedFactory
{
    function getNewsFeed() : NewsFeed{
        static $newsFeed = null;

        if ($newsFeed === null){

        }

        return $newsFeed;
    }
}