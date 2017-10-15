<?php

require 'src/Request.php';

use FJA\Request;

$arguments['user'] = ["login","avatar_url"];

if (isset($_GET['extends'])) {
$varExtend = TRUE;
}else {
$varExtend = FALSE;
}

$user = new Request("Banb4n", serialize($arguments));

print_r($user->test("user"));