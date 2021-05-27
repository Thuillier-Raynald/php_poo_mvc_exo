<?php

// Declaration du namespace
namespace App\Controller;

use App\Weblitzer\Controller;
use App\Model\ConducteurModel;
use App\Service\Validation;
use App\Service\Form;


// Creation de la classe
class ConducteurController extends Controller
{

    // Declaration des methodes
    public function index()
    {
        // Recupere toutes les donnees de la table
        $conducteurs = ConducteurModel::all();
        //$this->debug($conducteurs);
        // Envoi à la vue
        $this->render('app.conducteur.index', array(
            'conducteurs' => $conducteurs
        ));
    }


    // Methode qui verifie si le conducteur existe
    private function ifConducteurExist($id)
    {
        // Recupere l'id
        $conducteur = ConducteurModel::findById($id);
        // si vide ou n'existe pas en BDD
        if (empty($conducteur)) {
            $this->Abort404();
        }
        return $conducteur;
    }

    // Methode pour modifier un conducteur
    public function edit($id)
    {
        $conducteur = $this->ifConducteurExist($id);
        
        $errors = array();
        if (!empty($_POST['submitted'])) {
            $post = $this->cleanXss($_POST);
            $v = new Validation();
            $errors = $this->validationConducteur($errors, $v, $post);
            // Si pas d'erreur
            if ($v->IsValid($errors)) {
                // Modification en BDD grace ConducteurModel
                ConducteurModel::update($id, $post);
                // Redirection 
                $this->redirect('conducteur');
            }
        }
        // Utilisation de l'objet 'Form' pour recuperer les erreurs
        $form = new Form($errors);
        // Envoi à la vue 
        $this->render('app.conducteur.edit', array(
            'conducteur' => $conducteur,
            'form' => $form
        ));
    }

    // Methode pour supprimer un conducteur
    public function delete($id)
    {
        $conducteur = $this->ifConducteurExist($id);
        // Suppression en BDD grace ConducteurModel
        ConducteurModel::delete($id);
        // Redirection
        $this->redirect('conducteur');
    }


    // Methode pour creer un nouveau conducteur
    public function new()
    {
        $errors = array();
        // Si le formulaire est soumis
        if (!empty($_POST['submitted'])) {
            // Faille XSS
            $post = $this->cleanXss($_POST);
            // Validation
            $v = new Validation();

            // Utilisation de la methode 'validationConducteur($errors,$v,$post)'
            $errors = $this->validationConducteur($errors, $v, $post);
            // Recherche des erreurs
            if ($v->IsValid($errors)) {
                // Insertion en BDD grace ConducteurModel
                ConducteurModel::insert($post);
                //Redirection 
                $this->redirect('conducteur');
            }
        }
        // Utilisation de l'objet 'Form' pour recuperer les erreurs
        $form = new Form($errors);
        // Envoi à la vue 
        $this->render('app.conducteur.new', array(
            'form' => $form
        ));
    }

    // Methode pour valider un conducteur
    private function validationConducteur($errors, $v, $post)
    {
        $errors['prenom'] = $v->textValid($post['prenom'], 'prenom', 2, 255);
        $errors['nom'] = $v->textValid($post['nom'], 'nom', 2, 255);
        return $errors;
    }
}
