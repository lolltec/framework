<?php declare(strict_types=1);

namespace Limoncello\Validation\Rules\Generic;

/**
 * Copyright 2015-2020 info@neomerx.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

use Limoncello\Validation\Contracts\Execution\ContextInterface;
use Limoncello\Validation\Rules\ExecuteRule;

/**
 * @package Limoncello\Validation
 */
final class Value extends ExecuteRule
{
    /**
     * Property key.
     */
    private const PROPERTY_VALUE = self::PROPERTY_LAST + 1;

    /**
     * @param array $value
     */
    public function __construct($value)
    {
        parent::__construct([
            static::PROPERTY_VALUE => $value,
        ]);
    }

    /**
     * @param mixed            $value
     * @param ContextInterface $context
     * @param null             $primaryKeyValue
     *
     * @return array
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public static function execute($value, ContextInterface $context, $primaryKeyValue = null): array
    {
        $value = $context->getProperties()->getProperty(static::PROPERTY_VALUE);

        return static::createSuccessReply($value);
    }
}
