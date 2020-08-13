<?php


class DbManager
{
    protected $pdo;
    private $host = 'localhost';
    private $dbName = 'voitures';
    private $user = 'root';
    private $password = '';

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName . ';charset=utf8', $this->user, $this->password);
// Cette ligne demandera à pdo de renvoyer les erreurs SQL si il y en a
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Erreur connexion à la base de données : ';
            var_dump($e);
            die();
        }
    }
}
