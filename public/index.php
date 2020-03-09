<?php

use App\Router;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
require '../vendor/autoload.php';
define('DEBUG_TIME', microtime(true));
define('UPLOAD_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'uploads');

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();



if (isset($_GET['page']) && $_GET['page'] === '1') {
//réécrire l'url sans le paramètre ?page
$uri = explode('?', $_SERVER['REQUEST_URI'])[0];
$get = $_GET;
unset($get['page']);
$query = http_build_query($get);
if(!empty($query)) {
    $uri =$uri . '?' . $query;
}
http_response_code(301);
header('Location: ' . $uri);
exit();
}

$router = new Router(dirname(__DIR__) . '/views');
$router
    ->get('/', '/home', 'home')
    ->get('/blog', 'post/index', 'post_archive')
    ->get('/calendrier', '/calendrier', 'calendrier')
    ->match('/livredor', '/livredor', 'livredor')
    ->get('/event', '/event', 'event')
    ->get('/blog/category/[*:slug]-[i:id]', 'category/show', 'category')
    ->get('/blog/[*:slug]-[i:id]', 'post/show', 'post')
    ->match('/login', 'auth/login', 'login')
    ->post('/logout', 'auth/logout', 'logout')
    //ADMIN
    //Gestion des articles  
    ->get('/admin', 'admin/post/index', 'admin_posts')
    ->match('/admin/post/[i:id]', 'admin/post/edit', 'admin_post')
    ->post('/admin/post/[i:id]/delete', 'admin/post/delete', 'admin_post_delete')
    ->match('/admin/post/new', 'admin/post/new', 'admin_post_new')
    //Gestion des catégories
    ->get('/admin/categories', 'admin/category/index', 'admin_categories')
    ->match('/admin/category/[i:id]', 'admin/category/edit', 'admin_category')
    ->post('/admin/category/[i:id]/delete', 'admin/category/delete', 'admin_category_delete')
    ->match('/admin/category/new', 'admin/category/new', 'admin_category_new')
     //Gestion des événementss
    ->match('/admin/calendrier/calendrier', 'admin/calendrier/calendrier', 'admin_calendrier')
    ->match('/admin/calendrier/edit', 'admin/calendrier/edit', 'admin_calendrier_edit')
    ->match('/admin/calendrier/add', 'admin/calendrier/add', 'admin_calendrier_add')
    ->post('/admin/calendrier/delete', 'admin/calendrier/delete', 'admin_calendrier_delete')

 
    ->run();
