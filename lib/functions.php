 <?php
function connect(){
	ORM::configure('mysql:host=localhost;dbname=crm');
	ORM::configure('username', 'root');
	ORM::configure('password', 'MOTDEPASSE');
	ORM::configure('error_mode', PDO::ERRMODE_WARNING);
	ORM::configure('return_result_sets', true);
}
function getUser(){
	$id = $_GET['id'];
	$person = ORM::for_table('users')->find_one($id);

	return $person;
}
function getMessages($id){
	$message = ORM::for_table('messages')->where('user_id', $id)->find_many();

	return $message;
}
function getPeople(){
	$people = ORM::for_table('users')->find_many();
	return $people;
}
function flash($msg, $state="succes"){
	$out = '<div class="ui message ' .$state.'">';
	$out .= $msg;
	$out .= '</div>';
	return $out;
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
			$fla = flash("Ajout reussie");

		} else {
			editUser($_POST);
			$fla = flash("Edition reussie");
		}
		$people = getPeople();
		require '../views/list.php';
		return;
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
	if(isset($_GET['page']) && $_GET['page'] === 'edit') {

		if(!isset($_GET['id'])){
			die('Nope, ou est ID ?');
		}

		$id = $_GET['id'];
		$editable = ORM::for_table('users')->find_one($id);
		return require '../views/edit.php';

	}
	if (isset($_GET['id'])) {
		$user = getUser();
		$message = getMessages($_GET['id']);
		require '../views/show.php';
	}
}
function dd($var){
	var_dump($var);
	die();
}