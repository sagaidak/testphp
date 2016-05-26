<?php

/**
 * Created by PhpStorm.
 * User: arka
 * Date: 25.05.2016
 * Time: 19:04
 */
class UserController
{
    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';

        $result = false;

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (! User::checkName($name)) {
                $errors[] = 'Name should be 2 or more characters';
            }
            if (! User::checkEmail($email)) {
                $errors[] = 'Email is invalid';
            }
            if (! User::checkPassword($password)) {
                $errors[] = 'Password should be 4 or more characters';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'This email is already registered';
            }
            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }
        }

        require_once ROOT . '/views/user/register.php';
        return true;
    }
    public function actionLogin()
    {
        $email ='';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (! User::checkEmail($email)) {
                $errors[] = 'Invalid Email';
            }
            if (! User::checkPassword($password)) {
                $errors[] = 'Invalid Password (password needs to be more then 6 characters)';
            }

            $userId = User::checkUserData($email, $password);
            if ($userId == false) {
                $errors[] = 'Invalid email or password';
            } else {
                User::auth($userId);

                header('Location: /cabinet/');
            }
        }

        require_once ROOT . '/views/user/login.php';
        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /");
    }
}