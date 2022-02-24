<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Set\ValueObject\LevelSetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::PATHS, [
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);

    $parameters->set(Option::SKIP, [
        // waits for phpstan to use php-parser 4.13
        \Rector\DeadCode\Rector\If_\RemoveDeadInstanceOfRector::class,
    ]);
    $services = $containerConfigurator->services();

    $services->set(\Rector\Php55\Rector\String_\StringClassNameToClassConstantRector::class)
             ->configure([
                 'Symfony\*',
             ]);
    // Define what rule sets will be applied
    $containerConfigurator->import(LevelSetList::UP_TO_PHP_80);
    $containerConfigurator->import(\Rector\Set\ValueObject\SetList::CODE_QUALITY);
    $containerConfigurator->import(\Rector\Set\ValueObject\SetList::DEAD_CODE);
    $containerConfigurator->import(\Rector\Symfony\Set\SymfonySetList::SYMFONY_60);

};
