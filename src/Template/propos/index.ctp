<html>
<head><p>Steven Desroches<p>
<p>420-5b7 MO Applications internet.</p>
<p>Automne 2018, Collège Montmorency.</p>
<hr></head>
<body><hr>

<p>Le lien du coverage des test est <a href="http://localhost/GestionAthletes/webroot/coverage/index.html">http://localhost/GestionAthletes/webroot/coverage/index.html</a></p>
<br><br>
<p>dans un premier temps, en regardant le lien des tests, en regardant dans les controllers, puis dans le controlleur des utilisateurs,
il est possible de voir que les tests des méthodes de view, d'index, d'éditage et de d'ajout fonctionnent, mais pas la supression, mon test ne passe malheureusement pas
par le controlleur.</p>
<p>Dans le controlleur event, il est possible de voir les tests d'authentification</p>
<p>Le test de la méthode find se trouve dans la table User, du nom de testFindPublished.</p>
<p></p>
<p>Il est possible que pour les étapes suivantes il faut être connecté, le compte admin est le suivant:</p>
<p>email : admin@admin.admin</p>
<p>password : admin</p>
<p></p>
<p>Pour tester les listes liés, il faut aller dans la liste des Events
Puis il faut ajouter un nouveau event (ou éditer), puis en sélectionnant un event dans la liste (Marathon ou Sprint),
les éléments du sélecteur "Sous event type" change</p>
<p></p>
<p>Pour tester l'Autocomplete, il faut aller dans la liste des clubs et créer un nouveau club (ou éditer), puis taper une lettre dans la barre de location.</p>
<p>Moi aussi j'ai tricher puisque je n'ai pas utiliser une autre table pour les locations, j'ai simplement basé l'autocomplete sur le champ location de ma table club (comme dans l'exemple avec les voitures)</p>
<p></p>
<p>Pour l'affichage en vue Pdf, il faut aller dans l'index Athletes et cliquer sur PDF pour avoir la vue en Pdf</p>
<p></p>
<p>Pour ce qui concerne l'ajout et l'édition en monopage, il faut aller dans les genres, avec le compte administrateur, la liste des genres devrait être afficher</p>
<p>Sinon la route est localhost/gestionAthletes/genres</p>
<p>L'affichage se fait, mais il n'est pas possible d'ajouter ou d'éditage des éléments, mais sous la bd sqlite, la suppression est possible, ce qui n'est pas très utile.</p>
<p></p>
<p>Le lien du github est <a href="https://github.com/StevenDesroches/gestionAthletes">https://github.com/StevenDesroches/gestionAthletes</a></p>
<p>La database provient est <a href="http://www.databaseanswers.org/data_models/athletes_and_events/index.htm">http://www.databaseanswers.org/data_models/athletes_and_events/index.htm</a>
</p>

<?php echo $this->Html->image("db.png", ['alt' => "Actual Database Image"]); ?>

</body>
</html>