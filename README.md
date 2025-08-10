# php-codegen
PHP number-code generator

## [![codeception](https://github.com/strannyi-tip/php-codegen/actions/workflows/php.yml/badge.svg)](https://github.com/strannyi-tip/php-codegen/actions/workflows/php.yml)

## How to use

```php
//import generator
use StrannyiTip\PhpCodegen\CodeGenerator;
//create generator instance
$generator = new CodeGenerator();

//generate code with default generator
//as default using CodeGenerator::SIMPLE_METHOD
//5 - code length
$generator->generate(5);//27341
//generate code with mirror generator
$generator->generate(6, CodeGenerator::MIRROR_METHOD);//195591
//generate code with repeat generator
$generator->generate(5, CodeGenerator::REPEAT_METHOD);//22922
//generate code with random generator
$generator->generate(5, CodeGenerator::RANDOM_METHOD);
```
