<?php declare(strict_types=1);

namespace Limoncello\Validation\Rules;

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

use Limoncello\Validation\Blocks\ProcedureBlock;
use Limoncello\Validation\Contracts\Blocks\ExecutionBlockInterface;
use Limoncello\Validation\Contracts\Rules\ExecuteRuleInterface;

/**
 * @package Limoncello\Validation
 *
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
abstract class ExecuteRule extends BaseRule implements ExecuteRuleInterface
{
    /**
     * @var array
     */
    private $properties;

    /**
     * @var array $properties
     */
    public function __construct(array $properties = [])
    {
        $this->properties = $properties;
    }

    /**
     * @inheritdoc
     */
    public function toBlock(): ExecutionBlockInterface
    {
        return (new ProcedureBlock([static::class, 'execute']))->setProperties(
            $this->getStandardProperties() + $this->properties
        );
    }
}
