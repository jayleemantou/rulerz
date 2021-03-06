<?php

declare(strict_types=1);

namespace RulerZ\Executor;

use RulerZ\Context\ExecutionContext;

/**
 * An executor executes a rule against a target.
 */
interface Executor
{
    /**
     * Apply the filters on a target using the given rule and parameters.
     *
     * @param mixed $target The target.
     * @param array $parameters The parameters used in the rule.
     * @param array<callable> $operators The available operators.
     * @param ExecutionContext $context The execution context.
     *
     * @return mixed
     */
    public function applyFilter($target, array $parameters, array $operators, ExecutionContext $context);

    /**
     * Filters a target using the given rule and parameters.
     *
     * @param mixed $target The target.
     * @param array $parameters The parameters used in the rule.
     * @param array<callable> $operators The available operators.
     * @param ExecutionContext $context The execution context.
     *
     * @return \IteratorAggregate
     */
    public function filter($target, array $parameters, array $operators, ExecutionContext $context);

    /**
     * Tells if a target satisfies the given rule and parameters.
     *
     * @param mixed $target The target.
     * @param array $parameters The parameters used in the rule.
     * @param array<callable> $operators The available operators.
     * @param ExecutionContext $context The execution context.
     *
     * @return bool
     */
    public function satisfies($target, array $parameters, array $operators, ExecutionContext $context): bool;
}
