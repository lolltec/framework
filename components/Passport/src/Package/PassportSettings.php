<?php namespace Limoncello\Passport\Package;

/**
 * Copyright 2015-2017 info@neomerx.com
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

use Limoncello\Contracts\Settings\SettingsInterface;

/**
 * @package Limoncello\Passport
 */
abstract class PassportSettings implements SettingsInterface
{
    /** Config key */
    const KEY_ENABLE_LOGS = 0;

    /** Config key */
    const KEY_APPROVAL_URI_STRING = self::KEY_ENABLE_LOGS + 1;

    /** Config key */
    const KEY_ERROR_URI_STRING = self::KEY_APPROVAL_URI_STRING + 1;

    /** Config key */
    const KEY_DEFAULT_CLIENT_ID = self::KEY_ERROR_URI_STRING + 1;

    /** Config key */
    const KEY_CODE_EXPIRATION_TIME_IN_SECONDS = self::KEY_DEFAULT_CLIENT_ID + 1;

    /** Config key */
    const KEY_TOKEN_EXPIRATION_TIME_IN_SECONDS = self::KEY_CODE_EXPIRATION_TIME_IN_SECONDS + 1;

    /** Config key */
    const KEY_RENEW_REFRESH_VALUE_ON_TOKEN_REFRESH = self::KEY_TOKEN_EXPIRATION_TIME_IN_SECONDS + 1;

    /** Config key */
    const KEY_USER_TABLE_NAME = self::KEY_RENEW_REFRESH_VALUE_ON_TOKEN_REFRESH + 1;

    /** Config key */
    const KEY_USER_PRIMARY_KEY_NAME = self::KEY_USER_TABLE_NAME + 1;

    /** Config key */
    const KEY_USER_CREDENTIALS_VALIDATOR = self::KEY_USER_PRIMARY_KEY_NAME + 1;

    /** Config key */
    const KEY_LAST = self::KEY_USER_CREDENTIALS_VALIDATOR + 1;

    /**
     * @return string
     */
    abstract protected function getApprovalUri(): string;

    /**
     * @return string
     */
    abstract protected function getErrorUri(): string;

    /**
     * @return string
     */
    abstract protected function getDefaultClientId(): string;

    /**
     * @return string
     */
    abstract protected function getUserTableName(): string;

    /**
     * @return string
     */
    abstract protected function getUserPrimaryKeyName(): string;

    /**
     * Should return static callable to user credentials validator (login and password).
     *
     * Examples ['SomeNamespace\ClassName', 'staticMethodName'] or 'SomeNamespace\ClassName::staticMethodName'
     *
     * Method signature
     *
     * public static function validateUser(string $userName, string $password): ?int
     *
     * which returns either user ID (int) or null if user not found/invalid credentials.
     *
     * @return callable
     */
    abstract protected function getUserCredentialsValidator(): callable;

    /**
     * @inheritdoc
     */
    public function get(): array
    {
        // TODO add check that validator is valid callable (static with proper in/out signature).
        return [
            static::KEY_ENABLE_LOGS                          => false,
            static::KEY_APPROVAL_URI_STRING                  => $this->getApprovalUri(),
            static::KEY_ERROR_URI_STRING                     => $this->getErrorUri(),
            static::KEY_DEFAULT_CLIENT_ID                    => $this->getDefaultClientId(),
            static::KEY_CODE_EXPIRATION_TIME_IN_SECONDS      => 10 * 60,
            static::KEY_TOKEN_EXPIRATION_TIME_IN_SECONDS     => 60 * 60,
            static::KEY_RENEW_REFRESH_VALUE_ON_TOKEN_REFRESH => true,
            static::KEY_USER_TABLE_NAME                      => $this->getUserTableName(),
            static::KEY_USER_PRIMARY_KEY_NAME                => $this->getUserPrimaryKeyName(),
            static::KEY_USER_CREDENTIALS_VALIDATOR           => $this->getUserCredentialsValidator(),
        ];
    }
}