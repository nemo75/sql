<h1><?php echo ucfirst($user->nom) ?> <?php echo ucfirst($user->prenom) ?></h1>
<p>Téléphone : <?php echo $user->tel ?></p>
<p>Date de naissance : <?php echo $user->naissance ?></p>
<p>Adresse : <?php echo $user->adresse ?></p>


<a href="?page=edit&id=<?php echo $_GET['id'] ?>"><button class='ui green button'>Modifier user</button></a>
<form action="index.php">
	<input type="hidden" name="_method" value="delete">
	<input type="hidden" name="id" value="<?php $_GET['id']; ?>">
	<button class="ui red button">SUPPRIMER</button>
</form>
	
<?php foreach ($message as $msg) : ?>
<div class="ui segment"><?php echo $msg->content; ?></div>
<?php endforeach; ?>
