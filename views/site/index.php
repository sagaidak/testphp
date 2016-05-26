<?php
/**
 * Created by PhpStorm.
 * User: arka
 * Date: 25.05.2016
 * Time: 18:31
 */

require_once ROOT . '/views/layouts/header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div style="height:500px; overflow-y : scroll;">
                    <ul>
                        <?php foreach ($allPosts as $post): ?>
                            <li><a href="/post/show/<?=$post['id']?>"><?=$post['title']?></a> by <?=User::getUserById($post['user_id'])['name']?></li>
                            <p>
                            <?php
                            if (strlen($post['full'])>300)
                            {
                                $text = substr ($post['full'], 0,strpos ($post['full'], " ", 300)); echo $text . ' ...';
                            }
                            else echo $post['full'];
                            ?>
                            </p>


                            <a href="/post/show/<?=$post['id']?>">Read more</a><br><br>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php
require_once ROOT . '/views/layouts/footer.php';
?>