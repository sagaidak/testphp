<?php
/**
 * Created by PhpStorm.
 * User: arka
 * Date: 25.05.2016
 * Time: 18:26
 */
return array (
    'user/register' => 'user/register', // actionRegister in UserController
    'user/login' => 'user/login', // actionLogin in UserController
    'user/logout' => 'user/logout', // actionLogout in UserController

    'cabinet/edit' => 'cabinet/edit', // actionEdit in CabinetController
    'cabinet' => 'cabinet/index', // actionIndex in CabinetController

    'post/add' => 'post/add', // actionAdd in PostController
    'post/my' => 'post/my', // actionMy in PostController
    'post/show/([1-9]+)' => 'post/show/$1', // actionShow in PostController
    'post/update/([1-9]+)' => 'post/update/$1', // actionUpdate in PostController

    'comment/add/([1-9]+)' => 'comment/add/$1', // actionAdd in CommentController

    '' => 'site/index', // actionIndex in SiteController

);