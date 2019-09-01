<?php

use MCTing\Design\IoC\User;

require "autoload.php";

$a = make(User::class);
$a->run();
