<?php
/**
 * @var $voiture Voiture
 */
$transmissions = ['Manuelle', 'Automatique'];
?>

<div class="form-group">
    <label for="isAutomatic">Transmission</label>
    <select name="isAutomatic" id="isAutomatic" class="form-control">
        <option value="default" <?php if (!isset($voiture)) {
            echo 'selected';
        } ?> hidden>Choisissez le type de transmission
        </option>
        <?php for ($i = 0; $i <= 1; $i++) { ?>
            <option value="<?php echo $i ?>"
                <?php if (isset($voiture)) {
                    if ($i === (int)$voiture->getIsAutomatic()) {
                        echo 'selected';
                    }
                } ?>>
                <?php echo $transmissions[$i]; ?>
            </option>
        <?php } ?>
    </select>
</div>
