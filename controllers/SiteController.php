<?php

/**
 * Created by PhpStorm.
 * User: arka
 * Date: 25.05.2016
 * Time: 18:30
 */
class SiteController
{
    public function actionIndex()
    {
        $allPosts = Post::getPosts();
        require_once ROOT . '/views/site/index.php';
        return true;
    }
}