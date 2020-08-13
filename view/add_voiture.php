<?php
/**
 * @var $voiture Voiture
 * @var $errors array
 */
$title = 'Ajouter une recette';
include_once 'parts/head.php';
?>

    <div class="container">
        <h2>Ajouter une voiture : </h2>
        <a href="index.php" class="btn btn-secondary">Retour</a>
        <form method="post" action="index.php?controller=voiture&action=insert" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-group">
                    <label for="marque">Marque</label>
                    <input type="text" class="form-control" id="marque" name="marque"
                           value="<?php echo isset($voiture) ? $voiture->getMarque() : null; ?>" required/>
                </div>

                <div class="form-group">
                    <label for="modele">Modèle</label>
                    <input type="text" class="form-control" id="modele" name="modele"
                           value="<?php echo isset($voiture) ? $voiture->getModele() : null; ?>" required/>
                </div>

                <?php include_once 'parts/energy_select.php'; ?>

                <?php include_once 'parts/transmission_select.php'; ?>


                <div class="form-group">
                    <label for="image">Ajouter une image</label>
                    <input type="file" class="form-control-file" id="image" name="image"
                           accept="image/jpeg, image/png, image/gif">
                </div>
            </div>

            <input type="submit"/>
            <?php
            if (isset($errors)) {
                if (count($errors)) {
                    echo(' <h2>Erreurs lors de la soumission du formulaire : </h2>');
                    foreach ($errors as $error) {
                        echo('<div>' . $error . '</div>');
                    }
                }
            }
            ?>
        </form>
    </div>

<?php
include_once 'parts/foot.php';
