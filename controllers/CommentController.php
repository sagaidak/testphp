<?php

/**
 * Created by PhpStorm.
 * User: arka
 * Date: 26.05.2016
 * Time: 9:25
 */
class CommentController
{
    public function actionAdd($postId)
    {

        $name = '';
        $email = '';
        $text = '';

        if (isset($_REQUEST)) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $text = $_POST['text'];
            $errors = false;

            if (! User::checkName($name)) {
                $errors[] = 'Name must be more than 2 characters';
            }
            if (! User::checkEmail($email)) {
                $errors[] = 'Invalid email';
            }
            if (! Comment::checkText($text)) {
                $errors[] = 'Too short comment';
            }
            if ($errors == false) {
                Comment::add($postId, $name, $email, $text);
            } else {
                foreach ($errors as $error) {
                    echo '<p>' . $error . '</p>';
                }
            }

        }
        return true;
    }
}