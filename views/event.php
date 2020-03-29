<?php

use App\Connection;
use App\Calendar\Events;

require '../src/bootstrap.php';
$pdo = Connection::getPDO();
$events = new Events($pdo);
if (!isset($_GET['id'])) {
  header('location: /404.php');
}
try {
  $event = $events->find($_GET['id']);
} catch (\Exception $e) {
  e404();
}

?>

<style>
  .main_nav {
    display: none;
  }
</style>

<h1><?= h($event->getName()); ?></h1>

<ul>
  <li>Date: <?= $event->getStart()->format('d/m/Y'); ?></li>
  <li>Heure de démarrage: <?= $event->getStart()->format('H:i'); ?></li>
  <li>Heure de fin: <?= $event->getEnd()->format('H:i'); ?></li>
  <li>
    Description:<br>
    <?= h($event->getDescription()); ?>
  </li>
</ul>