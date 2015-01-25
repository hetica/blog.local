<h3>Supprimer un article</h3>
<form method="POST" action='index.php?page=deleteArticle<?php echo "&id=" . $id; ?>&del=true'>
<input type="submit" value="Supprimer" />
</form>

<form method="POST" action='index.php'>
<input type="submit" value="Annuler" />
</form>

<?php

echo '<p><strong>' . $titre . '</strong><br/>' . nl2br($contenu) . '</p>';