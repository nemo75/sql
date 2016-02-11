<?php

require '../views/header.php';
require '../vendor/autoload.php';
require '../lib/functions.php';
connect();
start();
getMessages();
require '../views/footer.php'; 

?>