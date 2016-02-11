<ul>
<?php foreach ($people as $p) :?>
	<li>
		<a href="?id= <?php echo $p->id; ?> "><?php echo ucfirst($p->prenom) ?> <?php echo ucfirst($p->nom) ?></a>
		<a href="?page=edit&id=<?php echo $p->id; ?>">[Edit]</a>
	</li>
<?php endforeach; ?>
</ul>
<a href=?page=add><button class='ui green button'>Add user</button></a>