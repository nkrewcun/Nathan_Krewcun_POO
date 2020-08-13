<?php
/**
 * @var $voiture Voiture
 */
$energies = ['Essence', 'Diesel', 'Électrique', 'Hybride'];
?>

<div class="form-group">
    <label for="energie">Énergie</label>
    <select name="energie" id="energie" class="form-control" required>
        <option value="" <?php if (!isset($voiture)) {
            echo 'selected';
        } ?> hidden>Choisissez le type d'énergie
        </option>
        <?php foreach ($energies as $energy) { ?>
            <option value="<?php echo $energy ?>"
                <?php if (isset($voiture)) {
                    if ($energy === $voiture->getEnergie()) {
                        echo 'selected';
                    }
                } ?>>
                <?php echo $energy ?>
            </option>
        <?php } ?>
    </select>
</div>
