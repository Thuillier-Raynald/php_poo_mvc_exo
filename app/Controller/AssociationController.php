<?php

// Declaration du namespace
namespace App\Controller;

use App\Model\ConducteurModel;
use App\Model\VehiculeModel;
use App\Weblitzer\Controller;
use App\Model\AssociationModel;
use App\Service\Validation;
use App\Service\Form;


// Creation de la classe
class AssociationController extends Controller
{

    // Declaration des methodes
    public function index()
    {
        // Recupere toutes les donnees de la table
        $associations = AssociationModel::all();
        // Envoi à la vue
        $this->render('app.association.index', array(
            'associations' => $associations
        ));
    }

    public function new()
    {
        $conducteurs = ConducteurModel::all();
        $vehicules = VehiculeModel::all();

        $errors = array();
        if (!empty($_POST['submitted'])) {
            $post = $this->cleanXss($_POST);
            $v = new Validation();
            // conducteur
            $conducteur_id = $post['conducteur'];
            $conducteur = ConducteurModel::findById($conducteur_id);
            if (empty($conducteur)) {
                $errors['conducteur'] = 'erreur !!!';
            }
            $this->debug($conducteur);
         
            // voiture
            $vehicule_id = $post['vehicule'];
            $vehicule = VehiculeModel::findById($vehicule_id);
            if (empty($vehicule)) {
                $errors['vehicule'] = 'erreur !!!';
            }
            if ($v->IsValid($errors)) {
                AssociationModel::insert($conducteur_id, $vehicule_id);
                //$this->redirect('association');
            }
            $this->debug($vehicule);
        }
        // Utilisation de l'objet 'Form' pour recuperer les erreurs
        $form = new Form($errors);
        // Envoi à la vue 
        $this->render('app.association.new', array(
            'form' => $form,
            'vehicules' => $vehicules,
            'conducteurs' => $conducteurs
        ));  
    }
}
