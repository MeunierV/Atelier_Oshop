<?php

session_start();
// C'est la révolution, on voit une nouvelle façon de stoquer des données coté serveur
// Pour qu'une page ai acces au contenu de SESSION
//! IL FAUT IMPERATIVEMENT FAIRE un :
// session_start(); tout en haut de mon code ! 

$_SESSION['UneEntree'] = "un contenu !";


var_dump($_SESSION);

?>

<a href="test.php">On passe a une autre page</a>
<a href="test2.php">On passe a une autre page</a>