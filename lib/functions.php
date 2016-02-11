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
function addUser($data){
	$newUser = ORM::for_table('users')->create();

	$newUser->prenom = $data['prenom'];
	$newUser->nom = $data['nom'];
	$newUser->tel = $data['tel'];
	$newUser->naissance = $data['naissance'];
	$newUser->adresse = $data['adresse'];

	$newUser->save();
}
function editUser($data){
	$user = ORM::for_table('users')->find_one($data['id']);

	$user->prenom = $data['prenom'];
	$user->nom = $data['nom'];
	$user->tel = $data['tel'];
	$user->naissance = $data['naissance'];
	$user->adresse = $data['adresse'];

	$user->save();
}
function start(){

	if(!empty($_POST)) {
		if(!isset($_POST['id'])) {
			addUser($_POST);
		} else {
			editUser($_POST);
		}
		$people = getPeople();
		return require '../views/list.php';
	}
	if(!isset($_GET['id']) && !isset($_GET['page'])) {
		$people = getPeople();
		return require '../views/list.php';
	} 
	if(isset($_GET['page']) && $_GET['page'] === 'add') {
		return require '../views/add.php';
	} 
	if (isset($_GET['page']) && $_GET['page'] === 'list') {
		$people = getPeople();
		return require '../views/list.php';
	}
	if (isset($_GET['id'])) {
		$user = getUser();
		require '../views/show.php';
	}
	if(isset($_GET['page']) && $_GET['page'] === 'edit') {

		if(!isset($_GET['id'])){
			die('Nope, ou est ID ?');
		}

		$id = $_GET['id'];
		$editable = ORM::for_table('users')->find_one($id);
		return require '../views/edit.php';

	}
}
