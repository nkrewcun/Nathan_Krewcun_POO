<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th>Image</th>
        <th>Marque</th>
        <th>Modèle</th>
        <th>Actions</th>
    </tr>
    </thead>

    <tbody>
    <?php
    /**
     * @var $voitures array
     * @var $voiture Voiture
     */
    foreach ($voitures as $voiture) {
        ?>
        <tr>
            <td><?php echo $voiture->getImage() ? '<img src="uploads/images/' . $voiture->getImage() .'" alt="' . $voiture->getMarque() . ' ' . $voiture->getModele() . '">' : 'Pas d\'image' ?></td>
            <td><?php echo $voiture->getMarque(); ?></td>
            <td><?php echo $voiture->getModele(); ?></td>
            <td>
                <a href="index.php?controller=voiture&action=get&id=<?php echo $voiture->getId(); ?>" role="button"
                   class="btn btn-secondary">Détails</a>
                <a href="index.php?controller=voiture&action=edit&id=<?php echo $voiture->getId(); ?>" role="button"
                   class="btn btn-secondary">Modifier</a>
                <a href="index.php?controller=voiture&action=delete&id=<?php echo $voiture->getId(); ?>" role="button"
                   class="btn btn-secondary">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
