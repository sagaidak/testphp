<?php

/**
 * Created by PhpStorm.
 * User: arka
 * Date: 26.05.2016
 * Time: 5:52
 */
class PostController
{
    public function actionAdd()
    {
        $userId = User::checkLogged();
        $status = 1;
        $title = '';
        $full = '';
        $result = false;

        if (isset($_POST['submit'])) {
            if (! isset($_POST['status'])) $status = 0;
            $title = $_POST['title'];
            $full = $_POST['full'];
            $errors = false;

            if ($errors == false) {
                $result = Post::addPost($userId, $status, $title, $full);
            }
        }
        require_once ROOT . '/views/post/add.php';
        return true;
    }

    public function actionMy()
    {
        $userId = User::checkLogged();
        $myPosts = Post::getPostsByUserId($userId);

        require_once ROOT . '/views/post/my.php';
        return true;
    }

    public function actionShow($id)
    {
        $post = Post::getPostById($id);
        $comments = Comment::getCommentsByPostId($id);
        $postId = $id;

        require_once ROOT . '/views/post/show.php';
        return true;
    }

    public function actionUpdate($id)
    {
        $userId = User::checkLogged();
        $post = Post::getPostById($id);
        $result = false;
        if ($post['user_id'] == $userId) {
            $title = $post['title'];
            $status = $post['status'];
            $full = $post['full'];
        } else {
            header('Location: /');
        }

        if (isset($_POST['submit'])) {
            if (isset($_POST['status'])) $status = $_POST['status'];
            $title = $_POST['title'];
            $full = $_POST['full'];
            $errors = false;

            if ($errors == false) {
                $result = Post::updatePost($id, $status, $title, $full);
            }
        }
        if (isset($_POST['delete'])) {
            $result = Post::deletePost($id);
        }
        require_once ROOT . '/views/post/update.php';
        return true;
    }
}