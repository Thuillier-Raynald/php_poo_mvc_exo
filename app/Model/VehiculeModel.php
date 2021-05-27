<?php

// Declaration du namespace
namespace App\Model;

// Declaration pour pouvoir utiliser certaines methodes venants d'autres objets
use App\App; 
use App\Weblitzer\Model; 

// Creation du VehiculeModel qui herite de App\Weblitzer\Model
class VehiculeModel extends Model
{
    // Declaration de la Table en BDD
    protected static $table = 'vehicule';

    // Methode pour inserer les donnees en BDD
    public static function insert($post)
    {
        // BDD   
        App::getDatabase()->prepareInsert(
            // Insertion des donnees sur la table avec 'self::getTable()' === 'vehicule'
            " INSERT INTO " . self::getTable() . " (marque, modele, couleur, immatriculation) VALUES (?,?,?,?) ",
                array($post['marque'], $post['modele'], $post['couleur'],$post['immatriculation'])
        );
    }

    // Methode pour Update les donnees en BDD
    public static function update($id,$post)
    {
        App::getDatabase()->prepareInsert(
            " UPDATE " . self::getTable() . " SET marque = ?,modele = ?, couleur = ?, immatriculation = ? WHERE id = ?",
            array($post['marque'], $post['modele'], $post['couleur'],$post['immatriculation'], $id)
        );
    }
}