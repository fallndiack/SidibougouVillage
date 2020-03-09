<?php

use App\Connection;

use App\Model\Post;
use App\Table\PostTable;
use App\Table\CategoryTable;

$title = 'Le blog';
$pdo = Connection::getPDO();

$posts = $pdo->query("SELECT *
FROM post
ORDER BY created_at DESC
LIMIT 4")->fetchAll(PDO::FETCH_CLASS, Post::class);
(new CategoryTable($pdo))->hydratePosts($posts);

?>


<div class="jumbotron text-center">
    <h1>Agence lorem ipsum</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aut cumque dolore error expedita itaque iure iusto magni, molestiae numquam omnis provident quae repellat sint soluta tempora unde voluptate voluptatibus.</p>
</div>

<h1>Les derniers articles du blog</h1>
<div class="row">
    <?php foreach ($posts as $post) : ?>
        <div class="col-md-3">
            <?php require 'post/card.php'; ?>
        </div>
    <?php endforeach ?>
</div>