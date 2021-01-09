<div class="container my-4">
        <a href="<?= $router->generate('category-list') ?>" class="btn btn-success float-right">Retour</a>
        <h2>Editer la catégorie <?= $viewVars['category']->getName(); ?></h2>
        <?php dump($viewVars['category']); ?>
        
        <form action="" method="POST" class="mt-5">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" placeholder="Nom de la catégorie" value="<?= $viewVars['category']->getName(); ?>">
            </div>
            <div class="form-group">
                <label for="subtitle">Sous-titre</label>
                <input type="text" class="form-control" id="subtitle" placeholder="Sous-titre" aria-describedby="subtitleHelpBlock" value="<?= $viewVars['category']->getSubtitle(); ?>">
                <small id="subtitleHelpBlock" class="form-text text-muted">
                    Sera affiché sur la page d'accueil comme bouton devant l'image
                </small>
            </div>
            <div class="form-group">
                <label for="picture">Image</label>
                <input type="text" class="form-control" id="picture" placeholder="image jpg, gif, svg, png" aria-describedby="pictureHelpBlock" value="<?= $viewVars['category']->getPicture(); ?>">
                <small id="pictureHelpBlock" class="form-text text-muted">
                    URL relative d'une image (jpg, gif, svg ou png) fournie sur <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
                </small>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
            
        </form>
    </div>