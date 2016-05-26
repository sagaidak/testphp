<?php
/**
 * Created by PhpStorm.
 * User: arka
 * Date: 25.05.2016
 * Time: 19:16
 */
include_once ROOT . '/views/layouts/header.php';
?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?=$error;?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="input-group">
                        <h2>Login</h2>
                        <form action="#" method="POST">
                            <input type="email" class="form-control" name="email" placeholder="E-mail">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <input type="submit" class="form-control" name="submit" class="btn btn-default" value="Submit">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php
include_once ROOT . '/views/layouts/footer.php';
?>