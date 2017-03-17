<?php namespace Limoncello\Auth\Authorization\PolicyAdministration;

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

use Limoncello\Auth\Contracts\Authorization\PolicyAdministration\AdviceInterface;
use Limoncello\Auth\Contracts\Authorization\PolicyAdministration\MethodInterface;
use Limoncello\Auth\Contracts\Authorization\PolicyAdministration\ObligationInterface;
use Limoncello\Auth\Contracts\Authorization\PolicyAdministration\PolicyCombiningAlgorithmInterface;
use Limoncello\Auth\Contracts\Authorization\PolicyAdministration\PolicyInterface;
use Limoncello\Auth\Contracts\Authorization\PolicyAdministration\PolicySetInterface;
use Limoncello\Auth\Contracts\Authorization\PolicyAdministration\TargetInterface;

/**
 * @package Limoncello\Auth
 */
class PolicySet implements PolicySetInterface
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var TargetInterface
     */
    private $target;

    /**
     * @var PolicyInterface[]|PolicySetInterface[]
     */
    private $policiesAndSets;

    /**
     * @var PolicyCombiningAlgorithmInterface
     */
    private $combiningAlgorithm;

    /**
     * @var MethodInterface[]
     */
    private $obligations;

    /**
     * @var MethodInterface[]
     */
    private $advice;

    /**
     * @param PolicyInterface[]|PolicySetInterface[] $policiesAndSets
     * @param PolicyCombiningAlgorithmInterface      $combiningAlgorithm
     * @param null|string                            $name
     * @param TargetInterface                        $target
     * @param MethodInterface[]                      $obligations
     * @param MethodInterface[]                      $advice
     */
    public function __construct(
        array $policiesAndSets,
        PolicyCombiningAlgorithmInterface $combiningAlgorithm,
        $name = null,
        TargetInterface $target = null,
        array $obligations = [],
        array $advice = []
    ) {
        $this->setName($name)->setTarget($target)
            ->setPoliciesAndSets($policiesAndSets)->setCombiningAlgorithm($combiningAlgorithm)
            ->setObligations($obligations)->setAdvice($advice);
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        assert(is_string($name) === true || $name === null);

        $this->name = $name;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param TargetInterface|null $target
     *
     * @return $this
     */
    public function setTarget(TargetInterface $target = null)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPoliciesAndSets()
    {
        return $this->policiesAndSets;
    }

    /**
     * @param PolicyInterface[]|PolicySetInterface[] $policiesAndSets
     *
     * @return $this
     */
    public function setPoliciesAndSets($policiesAndSets)
    {
        $this->policiesAndSets = $policiesAndSets;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCombiningAlgorithm()
    {
        return $this->combiningAlgorithm;
    }

    /**
     * @param PolicyCombiningAlgorithmInterface $combiningAlgorithm
     *
     * @return $this
     */
    public function setCombiningAlgorithm(PolicyCombiningAlgorithmInterface $combiningAlgorithm)
    {
        $this->combiningAlgorithm = $combiningAlgorithm;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getObligations()
    {
        return $this->obligations;
    }

    /**
     * @param ObligationInterface[] $obligations
     *
     * @return $this
     */
    public function setObligations(array $obligations)
    {
        $this->obligations = $obligations;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getAdvice()
    {
        return $this->advice;
    }

    /**
     * @param AdviceInterface[] $advice
     *
     * @return $this
     */
    public function setAdvice($advice)
    {
        $this->advice = $advice;

        return $this;
    }
}