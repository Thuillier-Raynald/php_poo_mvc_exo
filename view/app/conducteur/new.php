
<!-- Creation de la vue -->

<h1 style="font-weight: bold;font-size: 2em;">Ajouter un conducteur</h1>

<form action="" method="post">
<!-- Utilisation des methodes de Form.php -->
    <?= $form->label('prenom'); ?>
    <?= $form->input('prenom'); ?>
    <?= $form->error('prenom'); ?>

    <?= $form->label('nom'); ?>
    <?= $form->input('nom'); ?>
    <?= $form->error('nom'); ?>

    <?= $form->submit(); ?>
</form>