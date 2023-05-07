<?php

require_once __DIR__.'/boot.php';

$_SESSION['user_id'] = null;
session_unset(); 
session_destroy();
header("Location: index.php");
exit();


