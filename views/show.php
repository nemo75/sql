<h1><?php echo ucfirst($user->nom) ?> <?php echo ucfirst($user->prenom) ?></h1>
<p>Téléphone : <?php echo $user->tel ?></p>
<p>Date de naissance : <?php echo $user->naissance ?></p>
<p>Adresse : <?php echo $user->adresse ?></p>

<a href="?page=edit&id=<?php echo $_GET['id']; ?>"><button class='ui green button'>Modifier user</button></a>
