<?php
/**
 * Created by PhpStorm.
 * User: arka
 * Date: 26.05.2016
 * Time: 5:55
 */
require_once ROOT . '/views/layouts/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul>
                <h5><?=$post['title']?></h5>
                <p><?=$post['full']?></p>
                <p>By <?=User::getUserById($post['user_id'])['name']?></p>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-11 col-md-offset-1" id="comments">

            <?php if (isset($comments) && is_array($comments)): ?>
                <?php foreach ($comments as $comment): ?>
                    <h5><?=$comment['name']?> <small><?=$comment['email']?></small></h5>
                    <p><?=$comment['text']?></p>
                <?php endforeach ?>
            <?php endif ?>

        </div>
        <div class="errors"></div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-4 col-md-offset-1 padding-right">
            <div class="input-group">
                <p>Добавить комментарий</p>
                <form id="form-comment" action="" method="POST">
                    <input  id="name" type="text" name="name" class="form-control" placeholder="Name" value=""  />
                    <input id="email" type="email" name="email" class="form-control" placeholder="Email" value=""  />
                    <textarea id="text" rows="2" name="text" class="form-control" placeholder="Комментарий" value="" ></textarea>

                    <input id="add" postid="<?=$postId?>" type="submit" name="submit" class="form-control" class="btn btn-default" value="Добавить" />
                </form>
            </div>
        </div>
    </div>




</div>

<?php
require_once ROOT . '/views/layouts/footer.php';
?>
