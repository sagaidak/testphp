<?php
/**
 * Created by PhpStorm.
 * User: arka
 * Date: 26.05.2016
 * Time: 7:00
 */
require_once ROOT . '/views/layouts/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <ul>
            <?php foreach ($myPosts as $myPost): ?>
                <li><a href="/post/update/<?=$myPost['id']?>"><?=$myPost['title']?></a>   <a href="/post/show/<?=$myPost['id']?>">show</a></li>
            <?php endforeach ?>
            </ul>
            <p><a href="/post/add"> Add a new Post</a></p>
        </div>
    </div>
</div>


<?php
require_once ROOT . '/views/layouts/footer.php';
?>
