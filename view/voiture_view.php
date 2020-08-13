<?php
/**
 * @var $voiture Voiture
 */
$title = $voiture->getMarque() . ' ' . $voiture->getModele();
include_once 'parts/head.php';
?>
    <div class="card mb-3">
        <?php if ($voiture->getImage()) {
            echo '<img src="uploads/images/' . $voiture->getImage() . '" alt="' . $voiture->getMarque() . ' ' . $voiture->getModele() . '">';
        }
        ?>
        <div class="card-body">
            <h5 class="card-title display-4"><?php echo $voiture->getMarque() . ' ' . $voiture->getModele(); ?></h5>
            <p class="card-text">Énergie : <strong><?php echo $voiture->getEnergie(); ?></strong></p>
            <p class="card-text mb-4">Transmission : <strong><?php echo $voiture->getIsAutomatic() ? 'Automatique' : 'Manuelle'; ?></strong>
            <div class="actionButtons">
                <div class="leftButtons">
                    <a href="index.php" class="btn btn-secondary">Retour</a>
                </div>
                <div class="rightButtons">
                    <a href="index.php?controller=voiture&action=edit&id=<?php echo $voiture->getId(); ?>" role="button"
                       class="btn btn-secondary">Modifier</a>
                    <a href="index.php?controller=voiture&action=delete&id=<?php echo $voiture->getId(); ?>"
                       role="button"
                       class="btn btn-secondary">Supprimer</a>
                </div>
            </div>
        </div>
    </div>

<?php
include_once 'parts/foot.php';
