<?php

use App\Auth;
use App\Connection;
use App\Calendar\Events;
use App\Calendar\EventValidator;

Auth::check();
require '../src/bootstrap.php';
$pdo = Connection::getPDO();
$events = new Events($pdo);
$errors = [];
try {
  $event = $events->find($_GET['id'] ?? null);
} catch (\Exception $e) {
  e404();
} catch (\Error $e) {
  e404();
}

$data = [
  'name'        => $event->getName(),
  'date'        => $event->getStart()->format('Y-m-d'),
  'start'       => $event->getStart()->format('H:i'),
  'end'         => $event->getEnd()->format('H:i'),
  'description' => $event->getDescription()
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = $_POST;
  $validator = new EventValidator();
  $errors = $validator->validates($data);
  if (empty($errors)) {
    $events->hydrate($event, $data);
    $events->update($event);
    header('Location: /admin/calendrier/calendrier?success=1');
    exit();
  }
}


?>

<div class="container">

  <h1>Editer l'évènement
    <small><?= h($event->getName()); ?></small>
  </h1>

  <form action="" method="post" class="form">
    <?php render('calendar/form', ['data' => $data, 'errors' => $errors]); ?>
    <div class="form-group">
      <button class="btn btn-primary">Modifier l'évènement</button>
    </div>
  </form>
</div>



<form action="<?= $router->url('admin_calendrier_delete') ?>?id=<?= $_GET['id']; ?>" method="post" onsubmit="return confirm('Voulez vous vraiment supprimer cet événement ?')" style="display:inline">
  <button type="submit" class="btn btn-danger">Supprimer</button>
</form>