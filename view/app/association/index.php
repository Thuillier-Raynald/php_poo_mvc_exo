
<div class="wrap">
    <table>
        <thead>
            <tr>
                <th>id association</th>
                <th>conducteur</th>
                <th>vehicule</th>
                <th>modification</th>
                <th>suppression</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($associations as $association) { ?>
                <tr>
                    <td><?= $association->id; ?></td>
                    <td><?= $association->idconducteur; ?></td>
                    <td><?= $association->idvehicule; ?></td>
                    <td><a class="link" href="<?php echo $view->path('edit-association', array($association->id)); ?>"><i class="fas fa-edit"></i></a></td>
                    <td><a class="link" onclick="return confirm('Confirmer la suppression ?')" href="<?php echo $view->path('delete-association', array($association->id)); ?>"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<button><a href="http://localhost/php_wampp/examenphppooraynaldthuillier/public/new-association">Ajouter une association</a></button>
