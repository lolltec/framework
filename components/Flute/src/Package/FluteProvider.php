<?php declare (strict_types = 1);

namespace Limoncello\Flute\Package;

use Limoncello\Contracts\Provider\ProvidesContainerConfiguratorsInterface;

/**
 * @package Limoncello\Flute
 */
class FluteProvider implements ProvidesContainerConfiguratorsInterface
{
    /**
     * @inheritdoc
     */
    public static function getContainerConfigurators(): array
    {
        return [
            FluteContainerConfigurator::class,
        ];
    }
}
