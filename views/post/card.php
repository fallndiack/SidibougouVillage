<?php
$categories = [];
foreach ($post->getCategories() as $category) {
    $url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
    $categories[] = <<<HTML
<a href="{$url}">{$category->getName()}</a>
HTML;
}

/**
 * function array_map pour simplifier 
 */
//$categories = array_map(function($category) use ($router) {
//    $url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
//   return <<<HTML
//<a href="{$url}">{$category->getName()}</a>
//HTML;
//}, $post->getCategories());

?>

<style>
    img {
        height: 150px;
        width: 100%;
    }

    div [class^="col-"] {
        padding-left: 5px;
        padding-right: 5px;
    }

    .card {
        transition: 0.5s;
        
    }

    .card-title {
        font-size: 30px;
        transition: 1s;
       
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3);
    }

    .card-text {
        height: 80px;
    }

    .card::before,
    .card::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        transform: scale3d(0, 0, 1);
        transition: transform .3s ease-out 0s;
        background: rgba(255, 255, 255, 0.1);
        content: '';
        pointer-events: none;
    }

    .card::before {
        transform-origin: left top;
    }

    .card::after {
        transform-origin: right bottom;
    }

    .card:hover::before,
    .card:hover::after,
    .card:focus::before,
    .card:focus::after {
        transform: scale3d(1, 1, 1);
    }
</style>



<div class="card mb-3">
    <?php if ($post->getImage()) : ?>
        <img src="<?= $post->getImageURL('small') ?>" class="card-img-top">
    <?php endif ?>
    <div class="card-body">
        <h5 class="card-title"><?= htmlentities($post->getName()) ?></h5>
        <p class="text-muted">
            <?= $post->getCreatedAt()->format('d F Y') ?>
            <?php if (!empty($post->getCategories())) : ?>
                ::
                <?= implode(', ', $categories) ?>
            <?php endif ?>
        </p>
        <p><?= $post->getExcerpt() ?></p>
        <p>
            <a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>" class="btn btn-primary">Voir plus</a>
        </p>
    </div>
</div>






       
       
   

