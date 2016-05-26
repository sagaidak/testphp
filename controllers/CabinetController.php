<?php

/**
 * Created by PhpStorm.
 * User: arka
 * Date: 25.05.2016
 * Time: 19:30
 */
class CabinetController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        require_once ROOT . '/views/cabinet/index.php';
        return true;
    }

    public function actionEdit()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $errors = false;

            if (! User::checkName($name)) {
                $errors[] = 'Try another name';
            }
            if (! User::checkPassword($password)) {
                $errors[] = 'Try another password';
            }
            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }
        }

        require_once ROOT . '/views/cabinet/edit.php';
        return true;
    }
}