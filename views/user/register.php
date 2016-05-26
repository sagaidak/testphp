<?php
/**
 * Created by PhpStorm.
 * User: arka
 * Date: 25.05.2016
 * Time: 19:17
 */
include_once ROOT . '/views/layouts/header.php';
?>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php if ($result): ?>
                        <p>Вы зарегистрированы!</p>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="input-group">
                            <h2>Регистрация на сайте</h2>
                            <form action="#" method="post">
                                <input type="text" name="name" class="form-control" placeholder="Имя" value="<?php echo $name; ?>"/>
                                <input type="email" name="email" class="form-control" placeholder="E-mail" value="<?php echo $email; ?>"/>
                                <input type="password" name="password" class="form-control" placeholder="Пароль" value="<?php echo $password; ?>"/>
                                <input type="submit" name="submit" class="form-control" class="btn btn-default" value="Регистрация" />
                            </form>
                        </div>

                    <?php endif; ?>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section>

<?php
include_once ROOT . '/views/layouts/footer.php';
?>