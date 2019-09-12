<?php

use MCTing\Design\AutoLoader;
use MCTing\Design\IoC\Container;
use MCTing\Design\IoC\User;

require "src/AutoLoader.php";

AutoLoader::register();

$cont = new Container();
//$cont->bind("user", User::class);

try {
    $cont->make(User::class)->run();
} catch (Exception $e) {
}