<!-- Creation de la vue -->

<h1 style="font-weight: bold;font-size: 2em;">Modifier un Véhicule</h1>

<form action="" method="post">
<!-- Utilisation des methodes de Form.php -->
    <?= $form->label('marque'); ?>
    <?= $form->input('marque', $vehicule->marque); ?>
    <?= $form->error('marque'); ?>

    <?= $form->label('modele'); ?>
    <?= $form->input('modele', $vehicule->modele); ?>
    <?= $form->error('modele'); ?>

    <?= $form->label('couleur'); ?>
    <?= $form->input('couleur', $vehicule->couleur); ?>
    <?= $form->error('couleur'); ?>

    <?= $form->label('immatriculation'); ?>
    <?= $form->input('immatriculation', $vehicule->immatriculation); ?>
    <?= $form->error('immatriculation'); ?>

    <?= $form->submit(); ?>
</form>