<?php

require_once 'includes.php';

$voitureController = new VoitureController();
if (empty($_GET)) {
    $voitureController->getAll();
} else if ($_GET['controller'] === 'voiture') {
    if ($_GET['action'] === 'get' && isset($_GET['id'])) {
        $voitureController->get($_GET['id']);
    } else if ($_GET['action'] === 'add') {
        $voitureController->displayAddForm();
    } else if ($_GET['action'] === 'insert') {
        $voitureController->insert();
    } else if ($_GET['action'] === 'edit' && isset($_GET['id'])) {
        $voitureController->displayEditForm($_GET['id']);
    } else if ($_GET['action'] === 'update' && isset($_GET['id'])) {
        $voitureController->update($_GET['id']);
    } else if ($_GET['action'] === 'delete' && isset($_GET['id'])) {
        $voitureController->delete($_GET['id']);
    }

} else {
    throw new Exception('La page demandée n\'existe pas', 404);
}
