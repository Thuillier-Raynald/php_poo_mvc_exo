<!-- Creation de la vue -->

<h1 style="font-weight: bold;font-size: 2em;">Ajouter une Association</h1>

<form action="" method="post">
<!-- Utilisation des methodes de Form.php -->
    <?= $form->label('vehicule'); ?>
    <?= $form->input('vehicule'); ?>
    <?= $form->error('vehicule'); ?>

    <?= $form->label('conducteur'); ?>
    <?= $form->input('conducteur'); ?>
    <?= $form->error('conducteur'); ?>

    <?= $form->submit(); ?>
</form>