<?php

include_once "vendor/autoload.php";

$gen = new \StrannyiTip\PhpCodegen\CodeGenerator();

echo $gen->generate(12, \StrannyiTip\PhpCodegen\CodeGenerator::REPEAT_METHOD) . PHP_EOL;