<div class="wrap">
    <table>
        <thead>
            <tr>
                <th>id vehicule</th>
                <th>marque</th>
                <th>modele</th>
                <th>couleur</th>
                <th>immatriculation</th>
                <th>modification</th>
                <th>suppression</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($vehicules as $vehicule) { ?>
                <tr>
                    <td><?= $vehicule->id; ?></td>
                    <td><?= $vehicule->marque; ?></td>
                    <td><?= $vehicule->modele; ?></td>
                    <td><?= $vehicule->couleur; ?></td>
                    <td><?= $vehicule->immatriculation; ?></td>
                    <td><a class="link" href="<?php echo $view->path('edit-vehicule', 
                    array($vehicule->id)); ?>"><i class="fas fa-edit"></i></a></td>
                    <td><a class="link" onclick="return confirm('Confirmer la suppression ?')" 
                    href="<?php echo $view->path('delete-vehicule', array($vehicule->id)); ?>">
                    <i class="fas fa-trash-alt"></i></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<button><a href="http://localhost/php_wampp/examenphppooraynaldthuillier/public/new-vehicule">
Ajouter un vehicule</a></button>