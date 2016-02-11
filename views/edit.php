
<h1>Edit user</h1>
<form method='post' class='ui form' action='index.php'>
	<input type="hidden" name='id' value="<?php echo $editable->id; ?>">
	<div class="field">
		<label for="nom">Nom</label>
		<input type="text" id="nom" name="nom" value="<?php echo $editable->nom; ?>">
	</div>
	<div class="field">
		<label for="nom">Prenom</label>
		<input type="text" name="prenom" id="prenom" value="<?php echo $editable->prenom; ?>">
	</div>
	<div class="field">
		<label for="nom">Date</label>
		<input type="date" name="naissance" id="naissance" value="<?php echo $editable->naissance; ?>">
	</div>
	<div class="field">
		<label for="nom">Tel</label>
		<input type="text" name="tel" id="tel" value="<?php echo $editable->tel; ?>">
	</div>
	<div class="field">
		<label for="adr">Adresse</label>
		<textarea name="adresse" id="adr" placeholder="Entrez votre adresse" rows="4" cols="50"><?php echo $editable->adresse; ?></textarea>
	</div>
	<div>
		<button class='ui green button'>Valider</button>
	</div>
</form>