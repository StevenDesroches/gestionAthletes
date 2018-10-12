<html>
<head><p>Steven Desroches<p>
<p>420-5b7 MO Applications internet.</p>
<p>Automne 2018, Collège Montmorency.</p>
<hr></head>
<body><hr>
<p>Les visiteurs peuvent seulement regarder les éléments.<br>
Les super-utilisateurs peuvent faire des ajouts et supprimer ce qu'ils ont ajoutés mais ne peuvent pas ajouter
de nouveaux événement ou de nouveaux genres et ces options n'apparaissent pas dans le menu de gauche. <br>
Les admins peuvent tout faire et toute les options apparaissent dans le menu de gauche<p>
<br><br>
<p>Les étapes pour tester le bon fonctionnement de mon application:</p>
<p>Cliquez sur tout les menus de gauche disponible pour vérifier que chaque éléments amène au bon index de vue (liste d'éléments).</p>
<p> et tester les options add, delete (de n'importe quel table, les visiteurs n'ont pas le droit)</p>
<p>Changez de langue pour voir les options changer de langue (les éléments de la base de données de change pas de langue)</p>
<br>
<p>changez d'utilisateur pour un type 2 ("popo@popo.popo" et "popo" comme mot de passe)</p>
<p>avec un utilisateur de type 2, il est maintenant possible d'utiliser les options add et delete pour les athletes de l'utilisateur</p>
<br>
<p>changez d'utilisateur pour un type 3 ("admin@admin.admin" et "4Dm1N" comme mot de passe)</p>
<p>en comptant le nombre de "list" à gauche dans le menu, nous pouvons savoir qu'il y a plus de 5 tables dans la DB (6 pour les athletes)</p>
<p>L'admin à tout les droit, des options à gauche dans le menu sont disponibles comme "list files images" qui permet d'upload des images</p>
<p>les images ont une relation hasMany, (après avoir upload, il faut aller dans edit et ajouter un club à l'image)</p>
<p>une image peux avoir un club, mais un club peut avoir plusieurs images, en allant dans la liste des clubs et en regardant le club "Pat'molle", il est possible de voir trois relations hasMany</p>
<br>
<p>en haut à gauche, il y a l'email de l'utilisateur et son rang, en cliquant dessus, nous arrivons à l'affichage des informations de l'utilisateur en question.</p>
<p>pour terminer une session, il faut cliquer sur le bouton logout à gauche</p>
<p>sans aucun utilisateur, cliquer sur "visiteur" amène à l'index des users</p>
<br>
<p>pour tester la confirmation par mail, il faut faire un nouveaux compte en entrant une adresse</p>
<p>un message de confirmation est envoyer avec un lien et un code de confirmation (un Uuid fait avec uniqID de php)</p>
<p>sur la page qui s'ouvre, il faut mettre le code dans le champs, puis cliquer sur le bouton valider</p>
<p>une nouvelle page s'ouvre, il faut cliquer encore une fois sur le bouton submit, (le champs "active" est changer en 1)</p>
<p>un utilisateur à besoin d'avoir son "active" en 1 pour pouvoir faire des actions sur le site</p>
<p>cette page à un petit bug, l'affichage ne change pas et indique une erreur (mais elle fonctionne bel et bien)</p>
<br>
<p>La bd est sqlite n'est pas disponible</p>
</p>

<p>La database provient est <a href="http://www.databaseanswers.org/data_models/athletes_and_events/index.htm">Events and Athletes</a>
</p>

<?php echo $this->Html->image("db.png", ['alt' => "Actual Database Image"]); ?>

</body>
</html>