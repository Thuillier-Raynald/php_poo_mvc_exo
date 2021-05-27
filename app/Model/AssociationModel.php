<?php

// Declaration du namespace
namespace App\Model;

// Declaration pour pouvoir utiliser certaines methodes venants d'autres objets
use App\App;
use App\Weblitzer\Model;

// Creation du AssociationModel qui herite de App\Weblitzer\Model
class AssociationModel extends Model
{
    // Declaration de la Table en BDD
    protected static $table = 'association_vehicule_conducteur';

    public static function insert($vehicule_id, $conducteur_id)
    {
        App::getDatabase()->prepareInsert(
            "INSERT INTO " . self::getTable() . " (idvehicule,idconducteur) VALUES (?,?)",
            array($vehicule_id, $conducteur_id)
        );
    }

    public static function getAllInfos()
    {
        $tablevehicule = VehiculeModel::getTable();
        $tableconducteur = ConducteurModel::getTable();
        $sql = "SELECT b.id AS id, c.prenom AS prenom, 
                    c.nom AS nom, v.marque AS marque, 
                    v.modele AS model, v.couleur AS couleur, 
                    v.immatriculation AS immatriculation 
                    FROM " . self::getTable() . " AS b
                    LEFT JOIN $tablevehicule AS v
                    ON v.id = b.idvehicule
                    LEFT JOIN $tableconducteur AS c
                    ON c.id = b.idconducteur
                ";

        return App::getDatabase()->query($sql, get_called_class());
    }
}
