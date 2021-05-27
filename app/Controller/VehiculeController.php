<?php

// Declaration du namespace
namespace App\Controller;

use App\Weblitzer\Controller;
use App\Model\VehiculeModel;
use App\Service\Validation;
use App\Service\Form;


// Creation de la classe
class VehiculeController extends Controller
{

    // Declaration des methodes
    public function index()
    {
        // Recupere toutes les donnees de la table
        $vehicules = VehiculeModel::all();
        //$this->debug($vehicules);
        // Envoi à la vue
        $this->render('app.vehicule.index', array(
            'vehicules' => $vehicules
        ));
    }


    // Methode qui verifie si le vehicule existe
    private function ifVehiculeExist($id)
    {
        // Recupere l'id
        $vehicule = VehiculeModel::findById($id);
        // si vide ou n'existe pas en BDD
        if (empty($vehicule)) {
            $this->Abort404();
        }
        return $vehicule;
    }

    // Methode pour modifier un vehicule
    public function edit($id)
    {
        $vehicule = $this->ifVehiculeExist($id);
        
        $errors = array();
        if (!empty($_POST['submitted'])) {
            $post = $this->cleanXss($_POST);
            $v = new Validation();
            $errors = $this->validationVehicule($errors, $v, $post);
            // Si pas d'erreur
            if ($v->IsValid($errors)) {
                // Modification en BDD grace VehiculeModel
                VehiculeModel::update($id, $post);
                // Redirection 
                $this->redirect('vehicule');
            }
        }
        // Utilisation de l'objet 'Form' pour recuperer les erreurs
        $form = new Form($errors);
        // Envoi à la vue 
        $this->render('app.vehicule.edit', array(
            'vehicule' => $vehicule,
            'form' => $form
        ));
    }

    // Methode pour supprimer un vehicule
    public function delete($id)
    {
        $vehicule = $this->ifVehiculeExist($id);
        // Suppression en BDD grace VehiculeModel
        VehiculeModel::delete($id);
        // Redirection
        $this->redirect('vehicule');
    }


    // Methode pour creer un nouveau vehicule
    public function new()
    {
        $errors = array();
        // Si le formulaire est soumis
        if (!empty($_POST['submitted'])) {
            // Faille XSS
            $post = $this->cleanXss($_POST);
            // Validation
            $v = new Validation();

            // Utilisation de la methode 'validationVehicule($errors,$v,$post)'
            $errors = $this->validationVehicule($errors, $v, $post);
            // Recherche des erreurs
            if ($v->IsValid($errors)) {
                // Insertion en BDD grace VehiculeModel
                VehiculeModel::insert($post);
                //Redirection 
                $this->redirect('vehicule');
            }
        }
        // Utilisation de l'objet 'Form' pour recuperer les erreurs
        $form = new Form($errors);
        // Envoi à la vue 
        $this->render('app.vehicule.new', array(
            'form' => $form
        ));
    }

    // Methode pour valider un vehicule
    private function validationVehicule($errors, $v, $post)
    {
        $errors['marque'] = $v->textValid($post['marque'], 'marque', 2, 255);
        $errors['modele'] = $v->textValid($post['modele'], 'modele', 2, 255);
        $errors['couleur'] = $v->textValid($post['couleur'], 'couleur', 2, 255);
        $errors['immatriculation'] = $v->textValid($post['immatriculation'], 'immatriculation', 2, 255);
        return $errors;
    }
}
