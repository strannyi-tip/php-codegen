<?php

include_once "vendor/autoload.php";

$gen = new \StrannyiTip\PhpCodegen\CodeGenerator();

echo $gen->generate(5) . PHP_EOL;