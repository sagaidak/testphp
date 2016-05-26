<?php
/**
 * Created by PhpStorm.
 * User: arka
 * Date: 26.05.2016
 * Time: 5:55
 */
require_once ROOT . '/views/layouts/header.php';
?>
<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 padding-right">
            <?php if ($result): ?>
                <p>Post added.</p>
            <?php else: ?>

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="input-group">
                    <h2>Добавить пост</h2>
                    <form action="#" method="post">
                        <input type="text" name="title" class="form-control" placeholder="title" value="<?=$title?>" required />

                        <textarea rows="10" name="full" class="form-control" placeholder="Полный текст" value=""/><?=$full?></textarea>
                        <p>Status: </p>
                        <input type="checkbox" name="status"  value="1" <?php if($status==1)echo 'checked';?> />
                        <input type="submit" name="submit" class="form-control" class="btn btn-default" value="Добавить" />
                    </form>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>



<?php
require_once ROOT . '/views/layouts/footer.php';
?>
