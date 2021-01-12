
        <a href="<?= $router->generate('category-add')?>" class="btn btn-success float-right">Ajouter</a>
        <h2>Liste des catégories</h2>
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Sous-titre</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

            <?php foreach($categories as $categorie) : ?>
                <tr>
                    <th scope="row"><?=$categorie->getId();?></th>
                    <td><?=$categorie->getName();?></td>
                    <td><?=$categorie->getSubtitle();?></td>
                    <td class="text-right">
                        <a href="<?= $router->generate('category-updatepage', ['id' => $categorie->getId()])?>" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= $router->generate('category-delete', ['id' => $categorie->getId()])?>">Oui, je veux supprimer</a>
                                <a class="dropdown-item" href="#" data-toggle="dropdown">Oups !</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach;?>

                
            </tbody>
        </table>