 <?php
function connect(){
	ORM::configure('mysql:host=localhost;dbname=fake');
	ORM::configure('username', 'root');
	ORM::configure('password', 'root');
	ORM::configure('error_mode', PDO::ERRMODE_WARNING);
	ORM::configure('return_result_sets', true);
}

function getUser(){
	$id = $_GET['id'];
	$person = ORM::for_table('users')->find_one($id);

	return $person;
}
function getPeople(){
	$people = ORM::for_table('users')->find_many();
	return $people;
}
function addUser(){
	$newUser = ORM::for_table('users')->create();

	$newUser->prenom = $_POST['prenom'];
	$newUser->nom = $_POST['nom'];
	$newUser->tel = $_POST['tel'];
	$newUser->naissance = $_POST['naissance'];

	$newUser->save();
}
function start(){
	if (!empty($_POST['nom'])){
		addUser();
		$people = getPeople();
		require '../views/list.php';
	} elseif (!isset($_GET['id']) ) {
		$people = getPeople();
		require '../views/list.php';
	} else {
		$user = getUser();
		require '../views/show.php';
	}
}