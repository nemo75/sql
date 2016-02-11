
<h1>Add user</h1>
<form method='post' class='ui form' action='../public/index.php'>
	<input type="hidden" name='id' value="<?php echo $editable->id; ?>">
	<div class="field">
		<label for="nom">Nom</label>
		<input type="text" id="nom" name="nom" placeholder="Entrez un nom">
	</div>
	<div class="field">
		<label for="nom">Prenom</label>
		<input type="text" name="prenom" id="prenom" placeholder="Entrez un prénom">
	</div>
	<div class="field">
		<label for="naissance">Date</label>
		<input type="date" name="naissance" id="naissance" placeholder="Entrez une date de naissance : AAAA-MM-JJ">
	</div>
	<div class="field">
		<label for="nom">Telephone</label>
		<input type="text" name="tel" id="tel" placeholder="Entrez un numéro de téléphone">
	</div>
	<div class="field">
		<label for="adr">Adresse</label>
		<textarea name="adresse" id="adr" placeholder="Entrez votre adresse" rows="4" cols="50"></textarea>
	</div>
	<div>
		<button class='ui green button'>Modifier</button>
	</div>
</form>
