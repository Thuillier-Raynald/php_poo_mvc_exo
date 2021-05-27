<?php

// Declaration du namespace
namespace App\Model;

// Declaration pour pouvoir utiliser certaines methodes venants d'autres objets
use App\App; 
use App\Weblitzer\Model; 

// Creation du ConducteurModel qui herite de App\Weblitzer\Model
class ConducteurModel extends Model
{
    // Declaration de la Table en BDD
    protected static $table = 'conducteur';

    // Methode pour inserer les donnees en BDD
    public static function insert($post)
    {
        // BDD   
        App::getDatabase()->prepareInsert(
            // Insertion des donnees sur la table avec 'self::getTable()' === 'conducteur'
            " INSERT INTO " . self::getTable() . " (prenom, nom) VALUES (?,?) ",
                array($post['prenom'], $post['nom'])
        );
    }

    // Methode pour Update les donnees en BDD
    public static function update($id,$post)
    {
        App::getDatabase()->prepareInsert(
            " UPDATE " . self::getTable() . " SET prenom = ?,nom = ? WHERE id = ?",
            array($post['prenom'],$post['nom'],$id)
        );
    }
}