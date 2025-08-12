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

//generate code with fill generator
$generator->generate(7, CodeGenerator::FILL_METHOD);//5555555

//generate code with round generator
$generator->generate(4, CodeGenerator::ROUND_METHOD);//3000|5000|n000

//generate code with swing up generator
$generator->generate(4, CodeGenerator::SWING_UP_METHOD);//3435|5657|nn++

//generate code with swing down generator
$generator->generate(4, CodeGenerator::SWING_DOWN_METHOD);//3433|5655|nn--
```

## Using custom random generator

```php
namespace MyProject\Generator;

use StrannyiTip\PhpCodegen\Interfaces\RandomGeneratorInterface;

/**
 * My random generator.
 */
class MyRandomGenerator implements RandomGeneratorInterface
{
    /**
     * @inheritDoc
     */
    public function generate(int $length): int
    {
        $min = \str_repeat('1', $length);
        $max = \str_repeat('9', $length);

        return \mt_rand(intval($min), intval($max));
    }
}
```

```php
use StrannyiTip\PhpCodegen\CodeGenerator;
use MyProject\Generator\MyRandomGenerator;


$generator = new CodeGenerator();
$random_generator = new MyRandomGenerator();


$generator->setRandomGenerator($random_generator);
```

*As default using `StrannyiTip\PhpCodegen\Generator\SimpleRandomGenerator`*
