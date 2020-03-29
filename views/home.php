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




use App\OpenWeather;
use App\Exceptions\APIExection;
//require_once 'class/OpenWeather.php';
$weather = new OpenWeather('9c49e45c49a67412656bfc9eaa8d2ecf');
$error = null;
try {
    $forecast = $weather->getForecast('Mbour,sn');
    $today = $weather->getToDay('Mbour,sn');
} catch (APIExection $e) {
    $error = "Erreurs relative à l'Api";
} catch (Exception $e) {
    $error = $e->getMessage();
}

?>



<!-- slider banner	 -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="info">
                <h1>SIDI BOUGOU VILLAGE</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="info">
                <h1>EN PLEINE NATURE</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="info">
                <h1>SIDI BAMBARA</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="row" style="padding-left: 30px; padding-right: 10px">
    <div class="col-md-10">
        <h1>Les derniers articles du blog</h1>
        <div class="row">
            <?php foreach ($posts as $post) : ?>
                <div class="col-md-3">
                    <?php require 'post/card.php'; ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="col-md-2">
        <h2>La Météo</h2>

       
        <script type='application/javascript' src='https://darksky.net/widget/default/14.422,-16.9637/uk12/fr.js?width=100%&height=350&title=La Météo a Sidi&textColor=333333&bgColor=4892d8&transparency=false&skyColor=undefined&fontFamily=Default&customFont=&units=uk&htColor=9f4b4b&ltColor=0b4543&displaySum=yes&displayHeader=yes'></script>
    </div>
</div>