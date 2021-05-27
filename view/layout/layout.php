<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen - PHP POO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $view->asset('css/style.css'); ?>">
  </head>
  <body>

    <header>
      <nav>
          <ul>
              <li><a class="link" href="<?= $view->path('conducteur'); ?>">Conducteur</a></li>
              <li><a class="link" href="<?= $view->path('vehicule'); ?>">Vehicule</a></li>
              <li><a class="link" href="<?= $view->path('association'); ?>">Association</a></li>
          </ul>
      </nav>
    </header>

    <div class="container">
        <?= $content; ?>
        <hr>
       
    </div>

    <footer>
    <p>Développé par Raynald Thuillier - 2021</p> 
    </footer>

    <script src="<?= $view->asset('js/main.js'); ?>"></script>
  </body>
</html>