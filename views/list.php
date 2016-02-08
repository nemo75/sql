<ul>
<?php foreach ($people as $p) :?>
	<li>
		<a href="?id= <?php echo $p->id; ?> "><?php echo ucfirst($p->prenom) ?> <?php echo ucfirst($p->nom) ?></a></li>
<?php endforeach?>
</ul>
<a href="../views/add.php"><button>Add new user</button></a>