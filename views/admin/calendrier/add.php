<?php
use App\Auth;
use App\Connection;
use App\Calendar\Event;
use App\Calendar\Events;
use App\Calendar\EventValidator;
require '../src/bootstrap.php';
Auth::check();
$data = [
    'date'  => $_GET['date'] ?? date('Y-m-d'),
    'start' => date('H:i'),
    'end'   => date('H:i')
];
$validator = new \App\Validator($data);
if (!$validator->validate('date', 'date')) {
    $data['date'] = date('Y-m-d');
}
$pdo = Connection::getPDO();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $validator = new EventValidator();
    $errors = $validator->validates($_POST);
    if (empty($errors)) {
        $events = new Events($pdo);
        $event = $events->hydrate(new Event(), $data);
        $events->create($event);
        header('Location: /admin/calendrier/calendrier?success=1');
        exit();
    }
}


?>

<div class="container">

    <?php if (!empty($errors)): ?>
      <div class="alert alert-danger">
        Merci de corriger vos erreurs
      </div>
    <?php endif; ?>

  <h1>Ajouter un évènement</h1>
  <form action="" method="post" class="form">
      <?php render('calendar/form', ['data' => $data, 'errors' => $errors]); ?>
    <div class="form-group">
      <button class="btn btn-primary">Ajouter l'évènement</button>
    </div>
  </form>
</div>


