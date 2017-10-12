<?php
require 'vendor/autoload.php';

use FJA\Request;

$arguments['user'] = ["avatar_url", "name", "followers", "following", "public_repos", "public_gists"];
$arguments['repos'] = ["limit" => "F-3", "show"];
$arguments['gists'] = ["limit" => "D-3", "show"];

echo serialize($arguments);

$user = new Request("Banb4n", serialize($arguments));

echo $user->snippetsLite();
?>

