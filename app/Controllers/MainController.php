<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;

class MainController extends CoreController {

    /**
     * Méthode s'occupant de la page d'accueil
     *
     * @return void
     */
    public function home()
    {
        // On appelle la méthode show() de l'objet courant
        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
       
       // on récupère toutes les catégorie de la home
       // on récupère tous les produits de la home
       // on transmet ces infos a la vue


        //! ATTENTION DU NOUVEAU ! 
        // ICI Je viens appeller la methode findThreeCategory()
        // de ma classe Category
        //! SANS AVOIR A INSTANCIER UN NOUVEL OBJET (pas de new ...)
        // Ceci est possible grace au :: (opérateur de résolution de portée // Paamayim Nekudotayim)
        $threeCategoriesHome = Category::findThreeCategories();
        $threeProductsHome = Product::findThreeProducts();

        $viewVars = [
            'categories' => $threeCategoriesHome,
            'products' => $threeProductsHome,
        ];
        $this->show('main/home', $viewVars);
    }
}
