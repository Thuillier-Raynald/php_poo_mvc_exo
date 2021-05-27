
<div class="wrap">
    <table>
        <thead>
            <tr>
                <th>id conducteur</th>
                <th>prenom</th>
                <th>nom</th>
                <th>modification</th>
                <th>suppression</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($conducteurs as $conducteur) { ?>
                <tr>
                    <td><?= $conducteur->id; ?></td>
                    <td><?= $conducteur->prenom; ?></td>
                    <td><?= $conducteur->nom; ?></td>
                    <td><a class="link" href="<?php echo $view->path('edit-conducteur', array($conducteur->id)); ?>"><i class="fas fa-edit"></i></a></td>
                    <td><a class="link" onclick="return confirm('Confirmer la suppression ?')" href="<?php echo $view->path('delete-conducteur', array($conducteur->id)); ?>"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<button><a href="http://localhost/php_wampp/examenphppooraynaldthuillier/public/new-conducteur">Ajouter un Conducteur</a></button>
