<?php namespace Limoncello\Validation\Validator;

/**
 * Copyright 2015-2016 info@neomerx.com (www.neomerx.com)
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

use DateTime;
use Limoncello\Validation\Contracts\MessageCodes;
use Limoncello\Validation\Contracts\RuleInterface;
use Limoncello\Validation\Rules\CallableRule;
use Limoncello\Validation\Rules\InValues;
use Limoncello\Validation\Rules\IsDateTimeFormat;

/**
 * @package Limoncello\Validation
 */
trait Types
{
    /**
     * @return RuleInterface
     */
    protected static function isString()
    {
        return new CallableRule('is_string', MessageCodes::IS_STRING);
    }

    /**
     * @return RuleInterface
     */
    protected static function isBool()
    {
        return new CallableRule('is_bool', MessageCodes::IS_BOOL);
    }

    /**
     * @return RuleInterface
     */
    protected static function isInt()
    {
        return new CallableRule('is_int', MessageCodes::IS_INT);
    }

    /**
     * @return RuleInterface
     */
    protected static function isFloat()
    {
        return new CallableRule('is_float', MessageCodes::IS_FLOAT);
    }

    /**
     * @return RuleInterface
     */
    protected static function isNumeric()
    {
        return new CallableRule('is_numeric', MessageCodes::IS_NUMERIC);
    }

    /**
     * @return RuleInterface
     */
    protected static function isDateTime()
    {
        return new CallableRule(function ($value) {
            return $value instanceof DateTime;
        }, MessageCodes::IS_DATE_TIME);
    }

    /**
     * @param string $format
     *
     * @return RuleInterface
     */
    protected static function isDateTimeFormat($format = DateTime::W3C)
    {
        return new IsDateTimeFormat($format);
    }

    /**
     * @return RuleInterface
     */
    protected static function isArray()
    {
        return new CallableRule('is_array', MessageCodes::IS_ARRAY);
    }

    /**
     * @param array $values
     * @param bool  $isStrict
     *
     * @return RuleInterface
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    protected static function inValues(array $values, $isStrict = true)
    {
        return new InValues($values, $isStrict);
    }
}