# Etapes 

Objectif -> Modifier une categorie 


- On fabrique la route (dynamique)
- On fabrique la methode liée à la route
- On a pré-rempli le formulaire de la vue /category/add.tpl.php
- On a modifié notre vue add.tpl.php pour qu'elle affiche 
Ajouter ou modifier selon le contexte ET qu'elle change
l'action du formulaire.
- Pour éviter des erreurs lorsque nous ajoutons une catégorie
je me place dans la methode add() du CategoryController
et j'instancie un nouvel objet $category vide 
- On fabriqué la route POST 
- On fabrique la methode liée à cette dernière route
- Et DANS cette methode, je vais executer une methode
  "update" du Modèle Category
- Je fabrique donc cette methode update dans le modèle 
Category (et c'est dans cette methode que je vais trouver
ma requette SQL)