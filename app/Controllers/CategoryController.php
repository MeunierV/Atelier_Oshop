<?php

namespace App\Controllers;

// Si j'ai besoin du Model Category
 use App\Models\Category;
 

class CategoryController extends CoreController
{

    /**
     * Méthode s'occupant de la page d'accueil
     *
     * @return void
     */
    public function list()
    {

        // On appelle la méthode show() de l'objet courant
        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
        
        $categories = Category::findAll();

        $viewVars = [
            'categories' => $categories,
        ];
        
        $this->show('category/list', $viewVars);
    }



    public function add()
    {
        // On appelle la méthode show() de l'objet courant
        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
        $this->show('category/add');
    }


   

    public function addPost()
    {
        global $router;
        // étapes :
        // récupérer les infos qui sont en transit dans POST
        // (do you remember filter_input ?)
        // Verifier que rien n'est vide
        // apeller la methode INSERT du model category
        // Si l'insert a bien marché, redirection vers
        // l'affichage de la liste ? (header ?)

        // je récupère les donnés de mon formulaire
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $subtitle = filter_input(INPUT_POST, 'subtitle', FILTER_SANITIZE_STRING);
        $picture = filter_input(INPUT_POST, 'picture');

        // On va verifier qu'aucun des champs n'est vide
        $errorList = [];

        // et si un des champs est vide je vais ajouter un
        // message d'erreur a mon tableau $errorList
        if (empty($name)) {
            $errorList[] = 'Le nom est vide ';
        }

        if (empty($subtitle)) {
            $errorList[] = 'Le sous-titre est vide ';
        }

        if (empty($picture)) {
            $errorList[] = 'L\'URL d\'image est vide ';
        }


        // SI on a AUCUNE ERREUR
        // Donc on est tout bon !

        if (empty($errorList)) {

            // j'instancie un objet a partir de mon Modèle Category
            $category = new Category();

            // on met à jour les propriétés de l'instance
            $category->setName($name);
            $category->setSubtitle($subtitle);
            $category->setPicture($picture);

            if ($category->insert()) {
                // si $category->insert() nous retourne true
                // donc si tout s'est bien passé
                header('Location: ' . $router->generate('category-list'));
            // il est possible d'écrire l'adresse en "dur"
                // header('Location: /category/list');
            } else {
                // si $category->insert() nous retourne false
                // donc si il y a eu un pépin
                $errorList[] = 'La sauvegarde a échoué';
            }
        }

        // si on a eu des erreurs sur la route
        // on va transmettre la liste d'erreurs a ma vue add !
        if (!empty($errorList)) {
            $viewVars = [
                'errorList' => $errorList
            ];
            $this->show('category/add', $viewVars);
        }
    } // fin de addPost

    public function update($categoryId)
    {
        //? dump($params);
        $categoryModel = new Category();
        $category = $categoryModel->find($categoryId);
        $viewVars = [
           'id' => $categoryId,
          'category' => $category,
          //'categoryId' => $params // et tu peux AUSSi transmettre l'id a ta vue :) 
        ];
        $this->show('category/update', $viewVars);
    }




}
