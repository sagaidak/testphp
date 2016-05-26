<?php
/**
 * Created by PhpStorm.
 * User: arka
 * Date: 25.05.2016
 * Time: 19:29
 */
include_once ROOT . '/views/layouts/header.php';
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1>Cabinet</h1>

                <h3>Hello, <?=$user['name'];?> !</h3>
                <ul>
                    <li><a href="/post/my"> My Posts</a> </li>
                    <li><a href="/post/add"> Add a new Post</a> </li>
                </ul>
            </div>
        </div>
    </div>

</section>
<?php
include_once ROOT . '/views/layouts/footer.php';
?>
