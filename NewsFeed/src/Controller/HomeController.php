<?php

namespace App\Controller;

use NewsFeedModule\Architecture\NewsFeedInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Flex\Response;

class HomeController extends AbstractController
{
    private $newsFeed;

    public function getNewsFeed():?NewsFeedInterface{
        return $this->newsFeed;
    }

    /**
     * @Route("home", name="home")
     * @param SessionInterface $session
     */
    public function index(SessionInterface $session)
    {
        $categories = $session->get("categories");


        $this->getNewsFeed()->getInteractionModule()->getNewsByCategories($categories);
    }
}
