<?php

namespace App\Controllers;

// Si j'ai besoin du Model Category
 use App\Models\Category;

class CategoryController extends CoreController {

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
        
        
        //! ATTENTION ! 
        // etant donné que nous utilisons la même vue
        // pour ajouter et modifier,
        // nous avons placé des "$category->getName()", "$category->getSubtitle()", ...etc. dans notre vue
        // Cela nous génere donc une erreur, si je veux ajouter une category 
        // en effet la variable $category n'existait pas, et c'est pour cela
        // qu'on instancie un nouvel objet $category VIDE !
        // ça, c'est de la magouille gourmand craquant !
        $category = new Category();

        $this->show('category/add', ['category' => $category]);
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
        $name = filter_input(INPUT_POST, 'name',  FILTER_SANITIZE_STRING);
        $subtitle = filter_input(INPUT_POST, 'subtitle',  FILTER_SANITIZE_STRING);
        $picture = filter_input(INPUT_POST, 'picture');
        // On va verifier qu'aucun des champs n'est vide
        $errorList = [];
        // et si un des champs est vide je vais ajouter un 
        // message d'erreur a mon tableau $errorList
        if(empty($name)){
            $errorList[] = 'Le nom est vide ';
        }
        if(empty($subtitle)){
            $errorList[] = 'Le sous-titre est vide ';
        }
        if(empty($picture)){
            $errorList[] = 'L\'URL d\'image est vide ';
        }
        // SI on a AUCUNE ERREUR
        // Donc on est tout bon ! 
        if(empty($errorList)){
            // j'instancie un objet a partir de mon Modèle Category
            $category = new Category();
            // on met à jour les propriétés de l'instance
            $category->setName($name);
            $category->setSubtitle($subtitle);
            $category->setPicture($picture);
            if($category->save()){
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
        if(!empty($errorList)){
            $viewVars = [
                'errorList' => $errorList
            ];
            $this->show('category/add', $viewVars);
        }

    } // fin de addPost


    public function updatePage($categoryId){
       //! ATTENTION 
       // Altodispatcher va apeller la methode updatePage
       // en lui donnant en argument l'id !
       
        // récupérer les informations de la categorie numero: $categoryId
        $category = Category::find($categoryId);
        
        $this->show('category/add', ['category' => $category]);
    }


    //Methode qui va nous permettre de traiter les informations
    // du formulaire dans le cas d'un UPDATE
    public function update($categoryId){
        global $router;
        // dump('Mikabuche');die();
        // 1/ récupérer les informations du formulaire
        $name = filter_input(INPUT_POST, 'name',  FILTER_SANITIZE_STRING);
        $subtitle = filter_input(INPUT_POST, 'subtitle',  FILTER_SANITIZE_STRING);
        $picture = filter_input(INPUT_POST, 'picture');
        // 2/ récupérer les informations de la categorie
        // concernée (avant modification)
        // (sous la forme d'un objet)
        $category = Category::find($categoryId);
        // 3/ Mettre a jour l'objet avec les nouvelles infos 
        // (l'objet ET PAS LA BDD (Pas encore...))
        $category->setName($name);
        $category->setSubtitle($subtitle);
        $category->setPicture($picture);
        //dump($category);die();
        // 4/ On met a jour la BDD
        //! ATTENTION ICI j'appelle la methode update 
        //! du MODEL Category !!!!
        //! on se retrouve donc avec deux methode qui 
        //! s'appellent update : 
        //! La methode dans laquelle on se situe
        //!! qui est appelée lorsque je valide le formulaire
        //! de modification
        //! et la deuxieme que j'appele ci dessous 
        //! et qui est dans le MODEL Category
        if($category->save()){
            // SI TOUT A BIEN MARCHE
            // 5/ Si tout se passe bien -> on redidire
            $url = $router->generate('category-list');
            header('Location: ' .$url);
        } else {
            // SI ON A EU UN PEPIN,
            // SI $category->update() nous a renvoyé false
            //message d'erreur
            // + revenir sur modifier la categorie
        }


        // 5bis / Sinon message d'erreur




    }


    public function delete($categoryId){
        global $router;
        // On instancie un objet avec lequel nous 
        // allons récupérer les infos de la categorie voulue
        $categoryModel = new Category();
        $category = $categoryModel->find($categoryId);

        if($category->delete()){
            $url = $router->generate('category-list');
            header('Location: ' . $url);
        }



    }


}
