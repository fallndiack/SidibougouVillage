<?php

use App\Auth;
use App\Connection;
use App\Calendar\Events;


Auth::check();

$pdo = Connection::getPDO();
$events = new Events($pdo);
 $event = $events->find($_GET['id']);
   
$events->delete($event);

header('Location: /admin/calendrier/calendrier?delete=1');
?>


<h1>Suppression de l'événement</h1>