<?php

namespace App\Controllers;

// Si j'ai besoin du Model Category
 use App\Models\Product;

class ProductController extends CoreController {

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
        $products = Product::findAll();
        $viewVars = [
            'products' => $products,
        ];
        
        $this->show('product/list', $viewVars );
    }



    public function add()
    {
        // On appelle la méthode show() de l'objet courant
        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
        $this->show('product/add');
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

        // https://www.php.net/manual/fr/filter.filters.sanitize.php
        $name = filter_input(INPUT_POST, 'name',  FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description',  FILTER_SANITIZE_STRING);
        $picture = filter_input(INPUT_POST, 'picture', FILTER_VALIDATE_URL);
        //! TODO On a un pépin avec le prix
        //! qui nous est arrondi ! 
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $rate = filter_input(INPUT_POST, 'rate', FILTER_VALIDATE_INT);
        $status = filter_input(INPUT_POST, 'status', FILTER_VALIDATE_INT);
        $brand_id = filter_input(INPUT_POST, 'brand_id', FILTER_VALIDATE_INT);
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);



        // On va verifier qu'aucun des champs n'est vide
        $errorList = [];

        // et si un des champs est vide je vais ajouter un 
        // message d'erreur a mon tableau $errorList
        if(empty($name)){
            $errorList[] = 'Le nom est vide ';
        }

        if(empty($description)){
            $errorList[] = 'La description est vide ';
        }

        if(empty($picture)){
            $errorList[] = 'L\'URL d\'image est vide ';
        }

        if($price === false) {
            $errorList[] = 'Le prix est invalide';
        }

        if($rate === false) {
            $errorList[] = 'La note est invalide';
        }

        if($status === false) {
            $errorList[] = 'Le status est invalide';
        }

        if ($brand_id === false) {
            $errorList[] = 'La marque est invalide';
        }
        if ($category_id === false) {
            $errorList[] = 'La catégorie est invalide';
        }
        if ($type_id === false) {
            $errorList[] = 'Le type est invalide';
        }

        


        // SI on a AUCUNE ERREUR
        // Donc on est tout bon ! 

        if(empty($errorList)){

            // j'instancie un objet a partir de mon Modèle Category
            $product = new Product();

            // on met à jour les propriétés de l'instance
            $product->setName($name);
            $product->setDescription($description);
            $product->setPicture($picture);
            $product->setPrice($price);
            $product->setRate($rate);
            $product->setStatus($status);
            $product->setBrandId($brand_id);
            $product->setCategoryId($category_id);
            $product->setTypeId($type_id);

            if($product->insert()){
                // si $category->insert() nous retourne true
                // donc si tout s'est bien passé
                header('Location: ' . $router->generate('product-list'));
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
        if(!empty($errorList)){
            $viewVars = [
                'errorList' => $errorList
            ];
            $this->show('product/add', $viewVars);
        }

    } // fin de addPost

}
