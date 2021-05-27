<!-- Creation de la vue -->

<h1 style="font-weight: bold;font-size: 2em;">Ajouter un Véhicule</h1>

<form action="" method="post">
<!-- Utilisation des methodes de Form.php -->
    <?= $form->label('marque'); ?>
    <?= $form->input('marque'); ?>
    <?= $form->error('marque'); ?>

    <?= $form->label('modele'); ?>
    <?= $form->input('modele'); ?>
    <?= $form->error('modele'); ?>

    <?= $form->label('couleur'); ?>
    <?= $form->input('couleur'); ?>
    <?= $form->error('couleur'); ?>

    <?= $form->label('immatriculation'); ?>
    <?= $form->input('immatriculation'); ?>
    <?= $form->error('immatriculation'); ?>

    <?= $form->submit(); ?>
</form>