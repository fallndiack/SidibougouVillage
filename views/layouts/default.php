<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= isset($title) ? e($title) : 'Sidi Bougou village' ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/calendar.css">
    <link rel="stylesheet" href="/css/style.css">



</head>

<body class="d-flex flex-column h-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="<?= $router->url('home') ?>" class="navbar-brand">Sidi Bougou Village</a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="<?= $router->url('post_archive') ?>" class="nav-link">Blog</a>
            </li>
            <li class="nav-item">
                <a href="<?= $router->url('livredor') ?>" class="nav-link">Livre d'or</a>
            </li>
            <li class="nav-item">
                <a href="<?= $router->url('calendrier') ?>" class="nav-link">Evenements à venir</a>
            </li>

        </ul>
    </nav>

    <div class="container mt-4">

        <?= $content ?>

    </div>

    <footer class="bg-light py-4 footer mt-auto">

        <div class="row">
            <div class="col-md-12">
                <footer class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 m-b-30">
                                <div class="footer-title m-t-5 m-b-20 p-b-8">
                                    About us
                                </div>
                                <p class="white-text">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500 text of the printing.
                                </p>
                            </div>
                            <div class="col-md-3 m-b-30">
                                <div class="footer-title m-t-5 m-b-20 p-b-8">
                                    Latest themes
                                </div>
                                <div class="footer-links">
                                    <a href="#">
                                        Appointment
                                    </a>
                                    <a href="#">
                                        Health center
                                    </a>
                                    <a href="#">
                                        Quality
                                    </a>
                                    <a href="#">
                                        Wallstreet
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 m-b-30">
                                <div class="footer-title m-t-5 m-b-20 p-b-8">
                                    Quick Links
                                </div>
                                <div class="footer-links">
                                    <a href="#">
                                        Blog
                                    </a>
                                    <a href="#">
                                        FAQ
                                    </a>
                                    <a href="#">
                                        Terms & conditions
                                    </a>
                                    <a href="#">
                                        Privacy policy
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 m-b-30">
                                <div class="footer-title m-t-5 m-b-20 p-b-8">
                                    Support
                                </div>
                                <div class="footer-links">
                                    <a href="#">
                                        Affiliate
                                    </a>
                                    <a href="#">
                                        Login
                                    </a>
                                    <a href="#">
                                        All theme package
                                    </a>
                                    <a href="#">
                                        Support forum
                                    </a>
                                </div>

                                <div class="footer-social-links m-t-30">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-youtube" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <div class="footer-bottom">
                    Copyright © 2017, All Rights Reserved
                </div>
            </div>
        </div>
        <?php if (defined('DEBUG_TIME')) : ?>
            Page généréé en <?= round(1000 * (microtime(true) - DEBUG_TIME)) ?> ms
        <?PHP endif ?>


    </footer>

</body>

</html>