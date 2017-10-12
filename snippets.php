<?php
require 'vendor/autoload.php';

use FJA\Request;

$arguments['user'] = ["avatar_url", "html_url", "name", "following_url", "public_repos", "public_gists"];
$arguments['repos'] = ["limit" => "F-3"];
$arguments['gists'] = ["limit" => "D-3"];

$lol = new Request("Cerynna", $arguments);

echo $lol->helloworld();

